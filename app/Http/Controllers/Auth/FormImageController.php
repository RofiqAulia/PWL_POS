<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormImageController extends Controller
{
    public function imgUpload() {
        $breadcrumb = (object)[
            'title' => 'Upload Image ',
            'list' => ['Home', 'Upload Image', 'Upload']
        ];

        $page = (object)[
            'title' => 'Upload New Image'
        ];

        $activeMenu = 'imageUpload';

        return view('imageUpload', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function prosesImgUpload(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'gambar' => 'required|file|mimes:png,jpg,jpeg,svg|max:4000'
        ]);

        $breadcrumb = (object)[
            'title' => 'Show Image',
            'list' => ['Home', 'Show Image', 'Show']
        ];

        $page = (object)[
            'title' => 'Detail Show Image'
        ];

        $activeMenu = 'imageUpload';

        $namaFile = $request->nama . '.' . $request->gambar->getClientOriginalExtension();
        $path = $request->gambar->move('gambar', $namaFile);
        $path = str_replace("\\", "/", $path);
        $path = asset('gambar/' . $namaFile);

        return view('showImage', [
            'oldName' => $request->gambar->getClientOriginalName(),
            'newName' => $namaFile,
            'path' => $path,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
}
