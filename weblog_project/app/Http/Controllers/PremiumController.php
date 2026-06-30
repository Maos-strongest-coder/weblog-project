<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumController extends Controller
{
    public function show()
    {
        return view('auth.premium');
    }



    public function toggle()
    {
        $user = Auth::user();

        $user->is_premium = !$user->is_premium;
        $user->save();

        return redirect()->back();
    }
}
