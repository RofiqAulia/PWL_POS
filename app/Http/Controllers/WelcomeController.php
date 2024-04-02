<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\View;
use PhpParser\Node\Expr\Cast\Object_;

class WelcomeController extends Controller
{
		public function index()
		{
			$breadcrumb = (Object) [
				'title' => 'Selamat Datang',
				'list'  => ['Home', 'Welcome']
			];

			$activeMenu = 'dashboard';

			return view('welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
		}
}
