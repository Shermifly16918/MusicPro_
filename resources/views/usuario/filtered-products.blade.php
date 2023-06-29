@extends('layoutsUsuario.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container" style="margin-top: 80px">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Productos</h4>
                    </div>
                </div>
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    @foreach ($categories as $category)
                        <a href="{{ route('filterProducts', $category->id) }}" class="block font-medium text-black dark:text-gray-300 hover:bg-purple-300">{{ $category->nombre_categoria }}</a>
                    @endforeach
                </div>
                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                    <div class="flex items-center">
                        <p class="text-gray-500 dark:text-gray-300">FILTRAR</p>
                        <select class="font-medium text-gray-700 bg-transparent dark:text-gray-500 focus:outline-none">
                            <option value="#">Mas Frecuentes</option>
                            <option value="#">Precios Bajos</option>
                            <option value="#">Precios Altos</option>
                        </select>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="row">
                        <h2 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{ $selectedCategory->nombre_categoria }}</h2>
                        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @foreach ($products as $product)
                            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                                <img class="object-cover w-full rounded-md h-72 xl:h-80" src="{{ $product->image_path }}" alt="{{ $product->name }}">
                                <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{ $product->name }}</h4>
                                <p class="text-blue-500">${{ $product->price }}</p>
                                <!-- Resto del código para mostrar los detalles del producto -->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $product->name }}" id="name" name="name">
                                    <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                    <input type="hidden" value="{{ $product->image_path }}" id="img" name="img">
                                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="card-footer" style="background-color: white;">
                                          <div class="row">
                                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-black rounded-md hover:bg-purple-700 focus:outline-none focus:bg-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                                </svg>
                                                <span class="mx-1">AÑADIR AL CARRITO</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection