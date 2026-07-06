@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1><strong>Log in</strong></h1>

    @include('partials.errors')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block">Username</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border p-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Password</label>
            <input type="password" name="password" class="border p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2">Log in</button>
    </form>
@endsection
