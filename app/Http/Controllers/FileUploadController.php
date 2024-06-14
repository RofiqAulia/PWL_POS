<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class FileUploadController extends Controller
// {
//     //
//     public function fileUpload(){
//         return view('file-upload');
//     }

//     public function prosesFileUpload(Request $request)
//     {
        
//         $request->validate([
//             'berkas' => 'required|file|image|max:5000', // Validate file upload
//             'nama_gambar' => 'required', // Validate nama_gambar field
//         ]);

        
//         $extfile = $request->berkas->getClientOriginalExtension();
//         $namafile = time() . $request->input('nama_gambar') . '.' . $extfile;

        
//         $path = $request->berkas->storeAs('public/image-uploaded', $namafile);

        
//         $imageUrl = asset('storage/image-uploaded/' . $namafile);

//         $namaFile = $request->nama_gambar . "." . $extfile;

        
//         return view('uploaded-image', ['imageUrl' => $imageUrl, 'nama_file' => $namaFile]);
//     }
// }
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedFile;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = UploadedFile::all();
        return view('file-upload.index', compact('files'));
    }

    public function create()
    {
        return view('file-upload.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:5000',
            'nama_gambar' => 'required',
        ]);

        $extfile = $request->berkas->getClientOriginalExtension();
        $namafile = time() . '_' . $request->input('nama_gambar') . '.' . $extfile;
        $path = $request->berkas->storeAs('public/image-uploaded', $namafile);
        $imageUrl = asset('storage/image-uploaded/' . $namafile);

        $file = new UploadedFile();
        $file->name = $request->input('nama_gambar');
        $file->path = $imageUrl;
        $file->save();

        return redirect()->route('file-upload.index');
    }

    public function show($id)
    {
        $file = UploadedFile::findOrFail($id);
        return view('file-upload.show', compact('file'));
    }

    public function edit($id)
    {
        $file = UploadedFile::findOrFail($id);
        return view('file-upload.edit', compact('file'));
    }

    public function update(Request $request, $id)
    {
        $file = UploadedFile::findOrFail($id);
        $request->validate([
            'nama_gambar' => 'required',
        ]);

        if ($request->hasFile('berkas')) {
            $request->validate([
                'berkas' => 'file|image|max:5000',
            ]);

            $extfile = $request->berkas->getClientOriginalExtension();
            $namafile = time() . '_' . $request->input('nama_gambar') . '.' . $extfile;
            $path = $request->berkas->storeAs('public/image-uploaded', $namafile);
            $imageUrl = asset('storage/image-uploaded/' . $namafile);
            $file->path = $imageUrl;
        }

        $file->name = $request->input('nama_gambar');
        $file->save();

        return redirect()->route('file-upload.index');
    }

    public function destroy($id)
    {
        $file = UploadedFile::findOrFail($id);
        $file->delete();
        return redirect()->route('file-upload.index');
    }
}

