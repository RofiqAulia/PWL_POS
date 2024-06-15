<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormUploadController extends Controller
{
    public function formUpload() {
        return view('formUpload');
    }

    public function uploadFile(Request $request) {
        $request->validate([
            'nama' => 'bail|required|string|min:5',
            'gambar' => 'bail|required|file|mimes:png,jpg,jpeg,svg,webp|max:50000'
        ]);

        $size = $request->gambar->getSize();
        $namaFile = $request->nama . '.' . $request->gambar->getClientOriginalExtension();
        $path = $request->gambar->move('gambar', $namaFile);
        $path = str_replace("\\","/",$path);

        return view('showFile', [
            'oldName' => $request->gambar->getClientOriginalName(), 
            'newName' => $namaFile, 
            'extension' => $request->gambar->getClientOriginalExtension(),
            'size' => $size,
            'path' => $path, 
        ]);
    }
}
