<nav class="flex navbar-expand-md justify-between bg-white text-black w-screen">
        <div class="px-5 xl:px-12 py-6 flex w-full items-center">
          <a class="text-3xl font-bold font-heading" href="{{route ('home')}}">
            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
            MusicPro
          </a>
          <!-- Nav Links -->
          <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading">
            <li><a class="hover:text-blue-400 mx-2" href="{{route('home')}}">Home</a></li>
            <li><a class="hover:text-blue-400 mx-2" href="{{route('shop_')}}">Productos</a></li>
          </ul>
          {{-- buscador --}}
          <form method="GET">
            <div class="relative text-gray-600 focus-within:text-white">
              <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                  <svg fill="none" stroke="currentColor " stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6  bg-blue"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
              </span>
              <input type="search" name="q" class="py-2 text-sm text-white bg-white rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
            </div>
          </form>
          <!-- Header Icons -->
          <div class="hidden xl:flex items-center space-x-5">
            
            {{-- carrito --}}
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle"
                 href="#" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false"
              >
                  <span class="badge badge-pill badge-dark">
                      <i class="fa fa-shopping-cart"></i> {{ \CartCliente::getTotalQuantity()}}
                  </span>
              </a>
    
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                  <ul class="list-group" style="margin: 20px;">
                      @include('carritoCliente.cart-drop')
                  </ul>
    
              </div>
          </li>
            <!-- Iniciar sesion / Registrarse      -->
            <a class="flex items-center hover:text-blue-400" href="{{route ('login')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
            
          </div>
        </div>
        <!-- Responsive navbar -->
        <a class="xl:hidden flex mr-6 items-center" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="flex absolute -mt-5 ml-4">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
            </span>
          </span>
        </a>
        <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>
</nav>
