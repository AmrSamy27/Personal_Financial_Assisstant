<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Blog;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index',['users'=>User::all()],['blogs'=>Blog::all()]);
    }
    public function store(ContactRequest $request)
    {
        //dd($request->email);
        Mail::to('dynamomarwan@gmail.com')->send(new ContactFormMail($request));
        return redirect('home');

    }
}
