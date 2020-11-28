<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home' , ['posts' => Post::where('status', 'published')->orderBy('id', 'desc')->Paginate(9)]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getDashboard()
    {
        return view('user.dashboard');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function getSearch(Request $request)
    {
        $key = $request->input('keyword');
        $posts = Post::search($key)->latest()->get();
        return view('user.search', ['posts' => $posts]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getProfile()
    {
        return view('user.profile');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function postProfile(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $this->validate($request , ['password' => ['required', 'string', 'min:8', 'confirmed']]);

            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('dashboard')->with('warning' , 'Profile Successfully Edited');
    }




}
