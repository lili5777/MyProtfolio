<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    //

    public function index()
    {
        $user = User::first();
        return view('admin.profil.index', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'about' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB
        ]);

        // Update data dasar
        $user->name = $validatedData['name'];
        $user->job = $validatedData['job'];
        $user->about = $validatedData['about'];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && File::exists(public_path('assets/img/' . $user->photo))) {
                File::delete(public_path('assets/img/' . $user->photo));
            }

            // Generate nama file unik
            $photoName = 'profile_' . Str::slug($user->name) . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();

            // Pindahkan file ke folder public/assets/img
            $request->file('photo')->move(public_path('assets/img'), $photoName);
            $user->photo = $photoName;
        }

        // Handle document upload
        if ($request->hasFile('document')) {
            // Hapus dokumen lama jika ada
            if ($user->document && File::exists(public_path('assets/doc/' . $user->document))) {
                File::delete(public_path('assets/doc/' . $user->document));
            }

            // Generate nama file unik
            $docName = 'cv_' . Str::slug($user->name) . '_' . time() . '.' . $request->file('document')->getClientOriginalExtension();

            // Pindahkan file ke folder public/assets/doc
            $request->file('document')->move(public_path('assets/doc'), $docName);
            $user->document = $docName;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }
}
