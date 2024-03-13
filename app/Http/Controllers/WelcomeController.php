<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\View;
class WelcomeController extends Controller
{
 	public function hello() {
	     return view('blog.hello', ['name' => 'Andi']);
 	}
}
