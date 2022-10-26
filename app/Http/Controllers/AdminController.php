<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function($q) {
            $q->where('name', 'admin');
        })->get();

        // dd($users->toArray());
        return view('admin.admin', compact('users'));
    }
}
