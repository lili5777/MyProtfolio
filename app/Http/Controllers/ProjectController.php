<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        try {
            $projects = Project::all();
            return view('admin.project.index', compact('projects'));
        } catch (\Exception $e) {
            Log::error('Error fetching projects: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to fetch projects. Please try again.');
        }
    }

    public function upload(Request $request)
    {
        try {
            $request->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();

                $allowedExtensions = ['jpeg', 'png', 'jpg', 'gif', 'webp'];
                if (!in_array(strtolower($extension), $allowedExtensions)) {
                    return response()->json([
                        'error' => [
                            'message' => 'Invalid file type. Only jpeg, png, jpg, gif, and webp are allowed.'
                        ]
                    ], 400);
                }

                $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
                $request->file('upload')->move(public_path('assets/imgs/ckeditor'), $fileName);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('assets/imgs/ckeditor/' . $fileName);
                $msg = 'Image uploaded successfully';

                return response("<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>")
                    ->header('Content-Type', 'text/html');
            }

            return response()->json(['error' => ['message' => 'No file was uploaded.']], 400);
        } catch (\Exception $e) {
            Log::error('CKEditor upload error: ' . $e->getMessage());
            return response()->json([
                'error' => [
                    'message' => 'Failed to upload image. Please try again.'
                ]
            ], 500);
        }
    }

    public function create()
    {
        try {
            return view('admin.project.create');
        } catch (\Exception $e) {
            Log::error('Error loading project create form: ' . $e->getMessage());
            return redirect()->route('projects.index')->with('error', 'Failed to load create form. Please try again.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:projects,name',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=100,min_height=100',
                'desc' => 'required|string|max:500',
                'isi' => 'required|string',
                'link' => 'nullable|url|max:255',
            ], [
                'name.required' => 'Project name is required.',
                'name.unique' => 'A project with this name already exists.',
                'photo.required' => 'A project photo is required.',
                'photo.image' => 'The file must be an image.',
                'photo.mimes' => 'Only jpeg, png, jpg, gif, and webp images are allowed.',
                'photo.max' => 'The image must not be larger than 2MB.',
                'photo.dimensions' => 'The image must be at least 100x100 pixels.',
                'desc.required' => 'A short description is required.',
                'isi.required' => 'Project content is required.',
                'link.url' => 'Please enter a valid URL.',
            ]);

            // Handle file upload
            $imageName = null;
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = 'project_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs'), $imageName);

                if (!file_exists(public_path('assets/imgs/' . $imageName))) {
                    throw new \Exception('Failed to save the uploaded image.');
                }
            }

            Project::create([
                'name' => $validated['name'],
                'photo' => 'assets/imgs/' . $imageName,
                'desc' => $validated['desc'],
                'isi' => $validated['isi'],
                'link' => $validated['link'] ?? null,
            ]);

            return redirect()->route('projects.index')
                ->with('success', 'Project created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error creating project: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to create project. ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Project $project)
    {
        try {
            return view('admin.project.show', compact('project'));
        } catch (\Exception $e) {
            Log::error('Error showing project: ' . $e->getMessage());
            return redirect()->route('projects.index')
                ->with('error', 'Failed to display project. Please try again.');
        }
    }

    public function edit(Project $project)
    {
        try {
            return view('admin.project.edit', compact('project'));
        } catch (\Exception $e) {
            Log::error('Error loading project edit form: ' . $e->getMessage());
            return redirect()->route('projects.index')
                ->with('error', 'Failed to load edit form. Please try again.');
        }
    }

    public function update(Request $request, Project $project)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:projects,name,' . $project->id,
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=100,min_height=100',
                'desc' => 'required|string|max:500',
                'isi' => 'required|string',
                'link' => 'nullable|url|max:255',
            ], [
                'name.required' => 'Project name is required.',
                'name.unique' => 'A project with this name already exists.',
                'photo.image' => 'The file must be an image.',
                'photo.mimes' => 'Only jpeg, png, jpg, gif, and webp images are allowed.',
                'photo.max' => 'The image must not be larger than 2MB.',
                'photo.dimensions' => 'The image must be at least 100x100 pixels.',
                'desc.required' => 'A short description is required.',
                'isi.required' => 'Project content is required.',
                'link.url' => 'Please enter a valid URL.',
            ]);

            $data = [
                'name' => $validated['name'],
                'desc' => $validated['desc'],
                'isi' => $validated['isi'],
                'link' => $validated['link'] ?? null,
            ];

            if ($request->hasFile('photo')) {
                // Delete old photo if exists
                if ($project->photo && file_exists(public_path($project->photo))) {
                    unlink(public_path($project->photo));
                }

                $image = $request->file('photo');
                $imageName = 'project_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs'), $imageName);
                $data['photo'] = 'assets/imgs/' . $imageName;
            }

            $project->update($data);

            return redirect()->route('projects.index')
                ->with('success', 'Project updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating project: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update project. ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Project $project)
    {
        try {
            // Delete photo if exists
            if ($project->photo && file_exists(public_path($project->photo))) {
                unlink(public_path($project->photo));
            }

            $project->delete();

            return redirect()->route('projects.index')
                ->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting project: ' . $e->getMessage());
            return redirect()->route('projects.index')
                ->with('error', 'Failed to delete project. Please try again.');
        }
    }

    public function detailproject($id){
        $project=Project::findOrFail($id);
        return view('projekshow',compact('project'));
    }
}
