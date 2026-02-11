<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        $viewData = [
            'title' => 'Profilo',
        ];
        $user = User::find(Auth::id());
        return view('profile.profile', compact('viewData', 'user'));
    }

    public function verify() {
        $viewData = [
            'title' => 'Verifica',
        ];
        $user = User::find(Auth::id());
        return view('profile.verify', compact('viewData', 'user'));
    }

    public function password() {
        $viewData = [
            'title' => 'Cambia Password',
        ];
        $user = User::find(Auth::id());
        return view('profile.password', compact('viewData', 'user'));
    }
}
