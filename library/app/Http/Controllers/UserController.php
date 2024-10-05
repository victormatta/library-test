<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(4);
        // dd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required',
            'type' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success','User added successfully!');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $validateInfo = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id, 
        'password'=> 'nullable|string|min:4', 
        'type' => 'required|string|in:student,teacher',
    ]);

    $user = User::findOrFail($id);

    $user->setName($validateInfo['name']);
    $user->setEmail($validateInfo['email']);
    if ($request->filled('password')) {
        $user->setPassword(bcrypt($validateInfo['password'])); 
    }
    $user->setType($validateInfo['type']);
    $user->save(); 

    return redirect()->route('users.index')->with('success', 'User updated successfully!'); // Redireciona após a atualização
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User removed successfully!');
    }
}
