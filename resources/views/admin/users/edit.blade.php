<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf @method('PUT')
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="border rounded p-2 w-full">
            </div>
            <div class="mt-2">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="border rounded p-2 w-full">
            </div>
            <div class="mt-2">
                <label>Role</label>
                <select name="role" class="border rounded p-2 w-full">
                    <option value="user" @if($user->role==='user') selected @endif>User</option>
                    <option value="admin" @if($user->role==='admin') selected @endif>Admin</option>
                </select>
            </div>
            <div class="mt-4">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Update User</button>
            </div>
        </form>

        <hr class="my-6">

        <form method="POST" action="{{ route('admin.users.updatePassword', $user->id) }}">
            @csrf
            <div>
                <label>New Password</label>
                <input type="password" name="password" class="border rounded p-2 w-full">
            </div>
            <div class="mt-2">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="border rounded p-2 w-full">
            </div>
            <div class="mt-4">
                <button class="bg-green-600 text-white px-4 py-2 rounded">Change Password</button>
            </div>
        </form>
    </div>
</x-app-layout>
