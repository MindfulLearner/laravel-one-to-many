@extends('dashboard')

@section('content')
  <div class="text-white p-5">
      <h1 class="font-semibold text-xl">Products</h1>
  </div>
  <div>
    @foreach ($products as $product)
      <div class="bg-gray-700 text-white p-5 rounded-md mx-auto w-full max-w-4xl mb-5 shadow-lg">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold">{{ $product->name }}</h2>
          <div class="flex gap-2">
            <a href="{{ route('products.show', $product['id']) }}" class="bg-green-800 px-4 py-2 rounded-md text-center hover:bg-green-700">
              Info
            </a>
            <a href="{{ route('products.edit', $product['id']) }}" class="bg-blue-800 px-4 py-2 rounded-md text-center hover:bg-blue-700">
              Edit
            </a>
            <form action="{{ route('products.destroy', $product['id']) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-800 px-4 py-2 rounded-md text-center hover:bg-red-700 deleteButton">
                Delete
              </button>
            </form>
          </div>
        </div>
            
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
          <div class="bg-gray-800 p-4 rounded-lg">
            <p class="font-medium mb-2">Descrizione:</p>
            <p class="text-gray-300">{{ $product->description }}</p>
          </div>

          <div class="bg-gray-800 p-4 rounded-lg">
            <p class="font-medium mb-2">Prezzo:</p>
            <div class="text-gray-300 flex items-center space-x-2">
              <span>$ {{ $product->price }}</span>
              <img src="/icone/price-icon.png" alt="coin" class="w-5 h-5">
            </div>
          </div>

          <div class="bg-gray-800 p-4 rounded-lg">
            <p class="font-medium mb-2">Likes:</p>
            <div class="text-gray-300 flex items-center space-x-2">
              <span>{{ $product->likes }}</span>
              <img src="/icone/thumb-icon.png" alt="like" class="w-5 h-5">
            </div>
          </div>

          <div class="bg-gray-800 p-4 rounded-lg flex justify-between">
            <div>
              <p class="font-medium mb-2">Status:</p>
              <p class="text-gray-300">{{ $product->published ? 'Published' : 'Not Published' }}</p>
            </div>
            <div>
              <p class="font-medium mb-2">Data Creazione:</p>
              <p class="text-gray-300">{{ $product->created_at }}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
      <script>
        // logica conferma cancellazione
        document.querySelectorAll(".deleteButton").forEach(function(button) {
            button.addEventListener("click", function(event) {
                if (!confirm("Sei sicuro di voler cancellare questo comic?")) {
                    event.preventDefault();
                    //manda a url di cancellazione
                    // esce solo se si clicca cancel
                }
            });
        });
    </script>
  </div>
@endsection
