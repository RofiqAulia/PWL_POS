<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // Remove
        $removeToken = JWTAuth::invalidate(JWTAUth::getToken());
        if ($removeToken){
            // return response
            return response()->json([
                'status' => true,  
                'message'=> "Logged out successfully", 
            ]);
        }
    }
}
