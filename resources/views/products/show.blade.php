@extends('dashboard')

@section('content')
<div class="text-white">
  <div class="flex space-x-4 mb-5">
    <a href="{{ route('products.index') }}" class="bg-blue-800 px-4 py-2 rounded-md text-center hover:bg-blue-700">
      Indietro
    </a>
    <a href="{{ route('products.edit', $product['id']) }}" class="bg-blue-800 px-4 py-2 rounded-md text-center hover:bg-blue-700">
      Modifica
    </a>
  </div>

  <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-20">
    <div class="md:flex">
      <div class="md:shrink-0">
        <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ $product->cover_image }}" alt="{{ $product->name }}">
      </div>
      
      <div class="p-8">
        <h1 class="text-lg font-medium text-black">{{ $product->name }}</h1>
        <p class="mt-2 text-gray-500">{{ $product->description }}</p>
        <p class="mt-4 text-xl font-bold text-indigo-600">{{ $product->price }} €</p>
        
        <div class="flex items-center mt-4">
          <span class="text-gray-600 mr-2">👍</span> 
          <p class="text-gray-600">{{ $product->likes }} Likes</p>
        </div>
        
        <p class="mt-2 text-sm text-gray-400">Pubblicato: {{ $product->published ? 'Sì' : 'No' }}</p>
        <p class="mt-2 text-sm text-gray-400 mb-4">Creato il: {{ $product->created_at }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
