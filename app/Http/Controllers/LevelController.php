<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function index() {
        DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?,?,?)', ['cus','pelnggan', now()]);
        return 'insert data baru berhasil';
    }

   
}
