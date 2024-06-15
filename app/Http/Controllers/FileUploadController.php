<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah File Upload',
            'list' => ['Home', 'File Upload', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah File Upload Baru'
        ];

        $activeMenu = 'fileUpload';

        return view('fileUpload', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);
        $breadcrumb = (object)[
            'title' => 'Show File Upload',
            'list' => ['Home', 'File Upload', 'Show']
        ];

        $page = (object)[
            'title' => 'Show File Upload Baru'
        ];

        $activeMenu = 'fileUpload';
        $namaFile = $request->input('filename') . '.' . $request->berkas->getClientOriginalExtension();

        $path = $request->berkas->move('berkas', $namaFile);
        $path = str_replace("\\", "//", $path);

        $path = asset('berkas/' . $namaFile);
        return view('show-image', [
            'fileName' => $namaFile,
            'path' => $path,
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);


        // $path = $request->berkas->store('upload');
        // $path = $request->berkas->storeAs('public',$namaFile);
        // echo $request->berkas->getClientOriginalName()."lolos validasi";

        // dump($request->berkas);
        // dump($request->file('file'));
        // return "Pemrosesan file upload di sini";

        // if($request->hasFile('berkas'))
        // {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension(); 
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".
        //         $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType(); 
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".
        //         $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }
        // else
        // {
        //     echo "Tidak ada berkas yang diupload";
        // }
    }
}
