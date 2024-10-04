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
        $users = User::all();
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
        $validateInfo = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:4',
            'type' => 'required|string|in:student, teacher',
        ]);

        User::create([
            'name' => $validateInfo['name'],
            'email' => $validateInfo['email'],
            'password' => bcrypt($validateInfo['password']),
            'type'=> $validateInfo['type'],
        ]);
        return redirect()->route('users.index')->with('success','User added successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    // Atualiza os campos do usuário
    $user->name = $validateInfo['name'];
    $user->email = $validateInfo['email'];
    if ($request->filled('password')) {
        $user->password = bcrypt($validateInfo['password']); 
    }
    $user->type = $validateInfo['type'];
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
