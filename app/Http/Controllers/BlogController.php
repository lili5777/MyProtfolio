<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        try {
            $blogs = Blog::latest()->paginate(10); // Tambahkan paginate()
            return view('admin.blog.index', compact('blogs'));
        } catch (\Exception $e) {
            Log::error('Error mengambil data blog: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengambil data blog. Silakan coba lagi.');
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
                            'message' => 'Jenis file tidak valid. Hanya jpeg, png, jpg, gif, dan webp yang diperbolehkan.'
                        ]
                    ], 400);
                }

                $fileName = Str::slug($fileName) . '_' . time() . '.' . $extension;
                $request->file('upload')->move(public_path('assets/imgs/ckeditor'), $fileName);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('assets/imgs/ckeditor/' . $fileName);
                $msg = 'Gambar berhasil diunggah';

                return response("<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>")
                    ->header('Content-Type', 'text/html');
            }

            return response()->json(['error' => ['message' => 'Tidak ada file yang diunggah.']], 400);
        } catch (\Exception $e) {
            Log::error('Error upload CKEditor: ' . $e->getMessage());
            return response()->json([
                'error' => [
                    'message' => 'Gagal mengunggah gambar. Silakan coba lagi.'
                ]
            ], 500);
        }
    }

    public function create()
    {
        try {
            return view('admin.blog.create');
        } catch (\Exception $e) {
            Log::error('Error menampilkan form buat blog: ' . $e->getMessage());
            return redirect()->route('blogs.index')->with('error', 'Gagal memuat form. Silakan coba lagi.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255|unique:blogs,judul',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=100,min_height=100',
                'penulis' => 'required|string|max:255',
                'isi' => 'required|string',
            ], [
                'judul.required' => 'Judul blog wajib diisi.',
                'judul.unique' => 'Blog dengan judul ini sudah ada.',
                'foto.required' => 'Foto utama wajib diunggah.',
                'foto.image' => 'File harus berupa gambar.',
                'foto.mimes' => 'Hanya gambar jpeg, png, jpg, gif, dan webp yang diperbolehkan.',
                'foto.max' => 'Ukuran gambar maksimal 2MB.',
                'foto.dimensions' => 'Gambar minimal berukuran 100x100 piksel.',
                'penulis.required' => 'Nama penulis wajib diisi.',
                'isi.required' => 'Konten blog wajib diisi.',
            ]);

            // Handle file upload
            $imageName = null;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/blog'), $imageName);

                if (!file_exists(public_path('assets/imgs/blog/' . $imageName))) {
                    throw new \Exception('Gagal menyimpan gambar yang diunggah.');
                }
            }

            Blog::create([
                'judul' => $validated['judul'],
                'foto' => 'assets/imgs/blog/' . $imageName,
                'penulis' => $validated['penulis'],
                'isi' => $validated['isi'],
                'view' => 0,
                'like' => 0,
            ]);

            return redirect()->route('blogs.index')
                ->with('success', 'Blog berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error membuat blog: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal membuat blog. ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Blog $blog)
    {
        try {
            // Tambah view count
            $blog->increment('view');

            return view('admin.blog.show', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Error menampilkan blog: ' . $e->getMessage());
            return redirect()->route('blogs.index')
                ->with('error', 'Gagal menampilkan blog. Silakan coba lagi.');
        }
    }

    public function showuser(Blog $blog)
    {
        try {
            // Tambah view count
            $blog->increment('view');

            return view('blogshow', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Error menampilkan blog: ' . $e->getMessage());
            return redirect('/')
                ->with('error', 'Gagal menampilkan blog. Silakan coba lagi.');
        }
    }

    public function edit(Blog $blog)
    {
        try {
            return view('admin.blog.edit', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Error menampilkan form edit blog: ' . $e->getMessage());
            return redirect()->route('blogs.index')
                ->with('error', 'Gagal memuat form edit. Silakan coba lagi.');
        }
    }

    public function update(Request $request, Blog $blog)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255|unique:blogs,judul,' . $blog->id,
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048|dimensions:min_width=100,min_height=100',
                'penulis' => 'required|string|max:255',
                'isi' => 'required|string',
            ], [
                'judul.required' => 'Judul blog wajib diisi.',
                'judul.unique' => 'Blog dengan judul ini sudah ada.',
                'foto.image' => 'File harus berupa gambar.',
                'foto.mimes' => 'Hanya gambar jpeg, png, jpg, gif, dan webp yang diperbolehkan.',
                'foto.max' => 'Ukuran gambar maksimal 2MB.',
                'foto.dimensions' => 'Gambar minimal berukuran 100x100 piksel.',
                'penulis.required' => 'Nama penulis wajib diisi.',
                'isi.required' => 'Konten blog wajib diisi.',
            ]);

            $data = [
                'judul' => $validated['judul'],
                'penulis' => $validated['penulis'],
                'isi' => $validated['isi'],
            ];

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($blog->foto && file_exists(public_path($blog->foto))) {
                    unlink(public_path($blog->foto));
                }

                $image = $request->file('foto');
                $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/imgs/blog'), $imageName);
                $data['foto'] = 'assets/imgs/blog/' . $imageName;
            }

            $blog->update($data);

            return redirect()->route('blogs.index')
                ->with('success', 'Blog berhasil diperbarui.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error memperbarui blog: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal memperbarui blog. ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            // Hapus foto jika ada
            if ($blog->foto && file_exists(public_path($blog->foto))) {
                unlink(public_path($blog->foto));
            }

            // Hapus semua komentar terkait
            $blog->komentars()->delete();

            $blog->delete();

            return redirect()->route('blogs.index')
                ->with('success', 'Blog berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error menghapus blog: ' . $e->getMessage());
            return redirect()->route('blogs.index')
                ->with('error', 'Gagal menghapus blog. Silakan coba lagi.');
        }
    }

    public function komentar(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'komentar' => 'required|string|max:1000',
            ]);

            BlogKomentar::create([
                'blog_id' => $id,
                'komentar' => $validated['komentar'],
            ]);

            return redirect()->back()
                ->with('success', 'Komentar berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error menambahkan komentar: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal menambahkan komentar. Silakan coba lagi.');
        }
    }

    public function like($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->increment('like');

            return response()->json([
                'success' => true,
                'like_count' => $blog->like
            ]);
        } catch (\Exception $e) {
            Log::error('Error like blog: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyukai blog'
            ], 500);
        }
    }
}
