@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1><strong>Log in</strong></h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
