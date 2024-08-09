@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold">Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location', $user->address) }}" class="form-input mt-1 block w-full">
            </div>
            <div class="mb-4">
                <label for="balance" class="block text-gray-700">Balance</label>
                <input type="number" id="balance" name="balance" value="{{ old('balance', $user->balance) }}" class="form-input mt-1 block w-full" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
