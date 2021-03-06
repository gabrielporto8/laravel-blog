<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PagesController extends Controller
{
    public function index() {

        if(Auth::check()) {
            $user_id = Auth::id();
            $user = User::find($user_id);
            return view('home')->with('posts', $user->posts);
        } else {
            $title = 'Welcome to Laravel!';
            return view('pages.index')->with('title', $title);
        }
    }

    public function about() {
        $title = 'About us!';
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Those are our services!',
            'services' => ['PHP', 'NodeJS', 'Python']
        );
        return view('pages.services')->with($data);
    }
}
