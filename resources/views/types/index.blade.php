@extends('dashboard')

@section('content')

<div class="text-white p-5">

  <div class="flex justify-between items-center">
    <h2 class="text-2xl font-bold mb-4">Tipi di Progetti</h2>

    <div class="flex gap-2">
      <a href="{{ route('types.create') }}" class="bg-green-800 px-4 py-2 rounded-md text-center hover:bg-green-700">
        Create
      </a>
      <a href="{{ route('types.create') }}" class="bg-red-800 px-4 py-2 rounded-md text-center hover:bg-red-700">
        Delete
      </a>
    </div>
  </div>
  
  <div class="">
    @foreach ($types as $type)
      <div class="bg-gray-800 rounded-lg p-4 shadow-lg hover:bg-gray-700 transition duration-300">
        <div class="flex items-center justify-between">
          <h3 class="text-lg font-semibold">
            {{ $type->title }}
          </h3>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
