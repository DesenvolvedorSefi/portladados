<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function edit()
        {
            $user = Auth::user();
            return view('auth.edit', compact('user'));
        }

        public function update(Request $request)
        {
            $user = Auth::user();
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|confirmed|min:8'
            ]);
        
            $data = $request->only(['name', 'email']);
        
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
        
            $user->update($data);
            return redirect()->to('/')->with('success', 'Dados atualizados com sucesso');
        }
        

}
