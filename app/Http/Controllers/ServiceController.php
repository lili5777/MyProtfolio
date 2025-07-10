<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|mimes:svg,png|max:2048', // 2MB max
            'name' => 'required|max:20',
            'desc' => 'required|max:250'
        ], [
            'icon.required' => 'Icon harus diisi',
            'icon.mimes' => 'Icon hanya boleh berformat SVG atau PNG',
            'icon.max' => 'Ukuran icon maksimal 2MB',
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama Maximal harus 20 karakter',
            'desc.required' => 'Deskripsi harus diisi',
            'desc.max' => 'Deskripsi maksimal 250 karakter'
        ]);

        // Handle file upload to public folder
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Create directory if doesn't exist
            $destinationPath = public_path('/assets/imgs');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move file to public directory
            $file->move($destinationPath, $fileName);

            // Save to database
            $service = new Service();
            $service->icon = $fileName;
            $service->name = $validated['name'];
            $service->desc = $validated['desc'];
            $service->save();
        }

        return redirect()->route('service.index')->with('success', 'Berhasil menambahkan service');
    }

    public function hapus($id)
    {
        $service = Service::findOrFail($id);
        $imagePath = public_path('/assets/imgs/' . $service->icon);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Berhasil menghapus service');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'icon' => 'nullable|mimes:svg,png|max:2048', // 2MB max
            'name' => 'required|max:20',
            'desc' => 'required|max:250'
        ], [
            'icon.mimes' => 'Icon hanya boleh berformat SVG atau PNG',
            'icon.max' => 'Ukuran icon maksimal 2MB',
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama Maximal harus 20 karakter',
            'desc.required' => 'Deskripsi harus diisi',
            'desc.max' => 'Deskripsi maksimal 250 karakter'
        ]);

        $service = Service::findOrFail($id);

        // Handle file upload if new icon is provided
        if ($request->hasFile('icon')) {
            // Delete old image if exists
            $oldImage = public_path('/assets/imgs/' . $service->icon);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/assets/imgs');
            $file->move($destinationPath, $fileName);

            $service->icon = $fileName;
        }

        $service->name = $validated['name'];
        $service->desc = $validated['desc'];
        $service->save();

        return redirect()->route('service.index')->with('success', 'Berhasil mengupdate service');
    }
}
