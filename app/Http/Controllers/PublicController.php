<?php

namespace App\Http\Controllers;

use App\Mail\CareerRequestMail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    public function home() 
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('home', compact('articles'));
    }

    public function careers () 
    {
        return view('careers');
    }

    public function careersSubmit (Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = $request->role; 
        $email = $request->email; 
        $message = $request->message;

        Mail::to('admin@gmail.com')->send(new CareerRequestMail(compact('role', 'email', 'message')));

        switch ($role) {
            case 'admin':
                $user->is_admin = null;
                break;
            case 'revisor':
                    $user->is_revisor = null;
                    break;    
            case 'writer':
                    $user->is_writer = null;
                    break;
        }

        $user->update();

        return redirect(route('home'))->with('message','Grazie per averci contattato!');
    }
}
