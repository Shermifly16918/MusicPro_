<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script>
      var cont=0;
      function loopSlider(){
        var xx= setInterval(function(){
              switch(cont)
              {
              case 0:{
                  $("#slider-1").fadeOut(400);
                  $("#slider-2").delay(400).fadeIn(400);
                  $("#sButton1").removeClass("bg-purple-800");
                  $("#sButton2").addClass("bg-purple-800");
              cont=1;
              
              break;
              }
              case 1:
              {
                  $("#slider-2").fadeOut(400);
                  $("#slider-1").delay(400).fadeIn(400);
                  $("#sButton2").removeClass("bg-purple-800");
                  $("#sButton1").addClass("bg-purple-800");
              cont=0;
              
              break;
              }
              }},8000);
      }
      function reinitLoop(time){
      clearInterval(xx);
      setTimeout(loopSlider(),time);
      }
      function sliderButton1(){
          $("#slider-2").fadeOut(400);
          $("#slider-1").delay(400).fadeIn(400);
          $("#sButton2").removeClass("bg-purple-800");
          $("#sButton1").addClass("bg-purple-800");
          reinitLoop(4000);
          cont=0
          }
          function sliderButton2(){
          $("#slider-1").fadeOut(400);
          $("#slider-2").delay(400).fadeIn(400);
          $("#sButton1").removeClass("bg-purple-800");
          $("#sButton2").addClass("bg-purple-800");
          reinitLoop(4000);
          cont=1
          }
          $(window).ready(function(){
              $("#slider-2").hide();
              $("#sButton1").addClass("bg-purple-800");
              loopSlider();
          });
    </script>
</head>
<body>
    <div class="flex flex-wrap place-items-center h-screen">
        <section class="relative mx-auto">
            <!-- navbar -->
          <nav class="flex justify-between bg-white text-black w-screen">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
              <a class="text-3xl font-bold font-heading" href="{{route ('home')}}">
                <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                MusicPro
              </a>
              <!-- Nav Links -->
              <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading">
                <li><a class="hover:text-blue-400 mx-2" href="{{route('home')}}">Home</a></li>
                <li><a class="hover:text-blue-400 mx-2" href="#">Productos</a></li>
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
                <a class="flex items-center hover:text-blue-400" href="{{route ('compra')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                  <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-red-800 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-red-800">
                      </span>
                    </span>
                </a>
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

          <div class="sliderAx h-auto">
            <div id="slider-1" class="container mx-auto">
              <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
                <div class="md:w-1/2">
                  <p class="font-bold text-sm uppercase">Services</p>
                  <p class="text-3xl font-bold">Hello world</p>
                  <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
                  <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
                </div>  
              </div> <!-- container -->
            <br>
            </div>
      
            <div id="slider-2" class="container mx-auto">
              <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">
              
              <p class="font-bold text-sm uppercase">Services</p>
              <p class="text-3xl font-bold">Hello world</p>
              <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
              <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
                    
              </div> <!-- container -->
              <br>
            </div>
          </div>
          <div  class="flex justify-between w-12 mx-auto pb-2">
            <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 " ></button>
            <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
          </div>
          
        </section>
      </div>
</body>
</html>