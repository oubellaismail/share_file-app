<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validator = request()->validate([
            'name' => ['required','max:20'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //role_id 1 => user 
        $validator['role_id'] = 1;

        $validator['password'] = Hash::make($validator['password']);
        $user = User::create($validator);
        auth()->login($user);
        return redirect()->intended(route('home'));
    }

 
    public function show(User $tag)
    {
        //
    }


    public function edit(User $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(){
        return view('user.login');
    }

    public function auth(){
        $form_fields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($form_fields)) {
            request()->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['error' => 'Invalid password or email']);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerate();

        return redirect(route('home')) -> with('success', 'User logged out successfully !');
    }
}
