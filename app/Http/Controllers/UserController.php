<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validateWithBag('details',[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        $result = $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($result) {
            return redirect()->route('users.edit', auth()->user()->id)->with('success-details', 'Your details have been updated.');
        } else {
            return redirect()->route('users.edit', auth()->user()->id)->withErrors('Your details fail to update.', 'details');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePw(Request $request, User $user)
    {
        $request->validateWithBag('pw', [
            'currentpass' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        if (!Hash::check($request->currentpass, $user->password)) {
            return redirect()->route('users.edit', auth()->user()->id)->withErrors('Your current password is incorrect.', 'pw');
        }
        
        $result = $user->update([
            'password' => bcrypt($request->password)
        ]);

        if ($result) {
            return redirect()->route('users.edit', auth()->user()->id)->with('success-pw', 'Your password have been updated.');
        } else {
            return redirect()->route('users.edit', auth()->user()->id)->withErrors('Your password fail to update.', 'pw');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        return view('users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
