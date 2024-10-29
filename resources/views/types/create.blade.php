@extends('dashboard')

@section('content')
<!-- form di creazione type -->
<h1 class="text-2xl font-bold  p-5 text-white">Create Type</h1>
<form class="text-white  pl-5 pb-5" action="{{ route('types.store') }}" method="POST">
  @csrf
  @method('POST')
  <input class="bg-gray-800 rounded-md pl-2" type="text" name="title" placeholder="Title">
  <button class="bg-green-800 px-4 py-2 rounded-md text-center hover:bg-green-700" type="submit">Create</button>
</form>
@endsection
