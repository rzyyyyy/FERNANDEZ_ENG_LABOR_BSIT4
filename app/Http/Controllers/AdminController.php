<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalPosts = Post::count();

        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalPosts'));
    }
}
