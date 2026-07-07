@extends('layouts.app')

@section('title', 'Premium')

@section('content')

<h1 class="text-2xl font-bold mb-6 text-gray-800">Premium</h1>



<form method="POST" action="{{ route('premium.toggle') }}" >
    @csrf
<button type="submit" class="bg-yellow-600 text-white px-4 py-2">Toggle Premium</button>
</form>

@endsection