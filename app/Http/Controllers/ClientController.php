<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function($q) {
            $q->where('name', 'client');
        })->get();

        // dd($users->toArray());
        return view('client.client', compact('users'));
    }

    public function create()
    {        
        if (!Auth::user()->can('client_create')) return view('spatie_exception.unauthorized');
        return view('client.create');     
    }

    public function store(Request $request) 
    {    
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:4,max:20',
            'confirm_password' => 'required|same:password'
        ]);

        $userData = $request->only(['name','email','password']);
        $userData['password'] = bcrypt($userData['password']);

        try {
            DB::beginTransaction();
            $createdUser = User::create($userData);
            $createdUser->assignRole(['client']);
            DB::commit();
            return redirect()->route('client.read')->with('success','User Successfully Created');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('client.create')->with('error','Something error when creating data');
        }
    }

    public function edit(User $id)
    {
        $user = $id;
        if (!Auth::user()->can('client_update') || Auth::id() != $user->id) return view('spatie_exception.unauthorized');

        return view('client.edit', compact('user'));   
    }

    public function update(Request $request, User $id)
    {
        $user = $id;
        if (!Auth::user()->can('client_update') || Auth::id() != $user->id) return view('spatie_exception.unauthorized');

        $request->validate([
            'name' => 'required|min:3|max:20',
            'password' => 'required|min:4,max:20',
            'confirm_password' => 'required|same:password'
        ]);

        try {
            DB::beginTransaction();
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();
            return redirect()->route('client.read')->with('success','User Successfully Created');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('client.edit')->with('error','Something error when creating data');
        }
 
    }
}
