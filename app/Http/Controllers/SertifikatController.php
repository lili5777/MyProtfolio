<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikats = Sertifikat::orderBy('terbit', 'desc')->get();
        return view('admin.sertifikat.index', compact('sertifikats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png|max:5120', // 5MB max
            'nama' => 'required|max:100',
            'company' => 'required|max:100',
            'terbit' => 'required|date'
        ], [
            'foto.required' => 'Foto sertifikat harus diisi',
            'foto.mimes' => 'Foto hanya boleh berformat JPG, JPEG atau PNG',
            'foto.max' => 'Ukuran foto maksimal 5MB',
            'nama.required' => 'Nama sertifikat harus diisi',
            'nama.max' => 'Nama maksimal 100 karakter',
            'company.required' => 'Nama perusahaan harus diisi',
            'company.max' => 'Nama perusahaan maksimal 100 karakter',
            'terbit.required' => 'Tanggal terbit harus diisi',
            'terbit.date' => 'Format tanggal tidak valid'
        ]);

        // Handle file upload to public folder
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Create directory if doesn't exist
            $destinationPath = public_path('/assets/serti');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move file to public directory
            $file->move($destinationPath, $fileName);

            // Save to database
            $sertifikat = new Sertifikat();
            $sertifikat->foto = $fileName;
            $sertifikat->nama = $validated['nama'];
            $sertifikat->company = $validated['company'];
            $sertifikat->terbit = $validated['terbit'];
            $sertifikat->save();
        }

        return redirect()->route('sertifikat.index')->with('success', 'Berhasil menambahkan sertifikat');
    }

    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $imagePath = public_path('/assets/serti/' . $sertifikat->foto);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $sertifikat->delete();

        return redirect()->route('sertifikat.index')->with('success', 'Berhasil menghapus sertifikat');
    }

    public function edit($id)
    {

        $sertifikat = Sertifikat::findOrFail($id);
        return response()->json($sertifikat);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:5120', // 5MB max
            'nama' => 'required|max:50',
            'company' => 'required|max:50',
            'terbit' => 'required|date'
        ], [
            'foto.mimes' => 'Foto hanya boleh berformat JPG, JPEG atau PNG',
            'foto.max' => 'Ukuran foto maksimal 5MB',
            'nama.required' => 'Nama sertifikat harus diisi',
            'nama.max' => 'Nama maksimal 50 karakter',
            'company.required' => 'Nama perusahaan harus diisi',
            'company.max' => 'Nama perusahaan maksimal 50 karakter',
            'terbit.required' => 'Tanggal terbit harus diisi',
            'terbit.date' => 'Format tanggal tidak valid'
        ]);

        $sertifikat = Sertifikat::findOrFail($id);

        // Handle file upload if new foto is provided
        if ($request->hasFile('foto')) {
            // Delete old image if exists
            $oldImage = public_path('/assets/serti/' . $sertifikat->foto);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/assets/serti');
            $file->move($destinationPath, $fileName);

            $sertifikat->foto = $fileName;
        }

        $sertifikat->nama = $validated['nama'];
        $sertifikat->company = $validated['company'];
        $sertifikat->terbit = $validated['terbit'];
        $sertifikat->save();

        return redirect()->route('sertifikat.index')->with('success', 'Berhasil mengupdate sertifikat');
    }
}
