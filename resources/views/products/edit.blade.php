@extends('dashboard')

@section('content')
<div class="container mx-auto p-8">
    <!-- Se ci sono errori, li stampa -->
    @if ($errors->any())
    <div class="error-container mb-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Errore:</strong>
            <ul class="mt-2">
                <!-- Utilizza error->all per stampare tutti gli errori -->
                @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <h1 class="text-2xl font-bold mb-6 text-white">Modifica Prodotto</h1>

    <form action="{{ route('products.update', $product['id']) }}" method="POST"  class="space-y-4 text-white">
        @csrf
        @method('PUT')

        <div class="flex flex-col text-black">
            <label for="name" class="text-sm font-semibold text-white">Nome</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
        </div>

        <div class="flex flex-col text-black">
            <label for="description" class="text-sm font-semibold text-white">Descrizione</label>
            <input type="text" name="description" id="description" value="{{ $product->description }}" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
        </div>

        <div class="flex flex-col text-black">
            <label for="price" class="text-sm font-semibold text-white">Prezzo</label>
            <input type="float" name="price" id="price" value="{{ $product->price }}" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
        </div>

        <div class="flex flex-col text-black">
            <label for="cover_image" class="text-sm font-semibold text-white">Immagine di Copertina</label>
            {{-- <input type="file" name="cover_image" id="cover_image" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200"> --}}
            <input type="text" name="cover_image" id="cover_image" value="{{ $product->cover_image }}" class="mt-1 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-200">
        </div>

        <div class="flex items-center text-black">
            <input type="hidden" name="published" value="0"> 
            <input type="checkbox" name="published" id="published" value="1" {{ $product->published ? 'checked' : '' }} class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring focus:ring-blue-200">
            <label for="published" class="text-sm font-semibold text-white">Pubblicato</label>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200">Salva</button>
    </form>
</div>
@endsection
