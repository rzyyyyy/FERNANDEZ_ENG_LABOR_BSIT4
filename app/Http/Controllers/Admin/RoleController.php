<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // List all roles
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        // Save new role
    }

    public function edit($id)
    {
        return view('admin.roles.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Update role
    }

    public function destroy($id)
    {
        // Delete role
    }
}
