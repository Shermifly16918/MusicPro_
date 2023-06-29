
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
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
          @include('carritoCliente.navbar')
          <main class="py-4">
              @yield('content')
          </main>
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

          {{-- categorias --}}

          <div class="p-1 flex flex-wrap items-center justify-center">
    
            <div class="flex-shrink-0 m-6 relative overflow-hidden bg-orange-500 rounded-lg max-w-xs shadow-lg">
              <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
              </svg>
              <div class="relative pt-10 px-10 flex items-center justify-center">
                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                <img class="relative w-40" src="{{ asset('images/guitarra.png') }}" alt="">
              </div>
              <div class="relative text-white px-6 pb-6 mt-6">
                <span class="block font-semibold text-xl">Intrumentos</span>
                <div class="flex justify-between">
                  <span class="block font-semibold text-xl"></span>
                  <a href="#" class="block bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center"><button type="submit">Ver mas</button></a>
                </div>
              </div>
            </div>
            <div class="flex-shrink-0 m-6 relative overflow-hidden bg-teal-500 rounded-lg max-w-xs shadow-lg">
              <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
              </svg>
              <div class="relative pt-10 px-10 flex items-center justify-center">
                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                <img class="relative w-40" src="{{ asset('images/estuche_guitarra.png') }}" alt="">
              </div>
              <div class="relative text-white px-6 pb-6 mt-6">
                <span class="block font-semibold text-xl">Accesorios</span>
                <div class="flex justify-between">
                  <span class="block font-semibold text-xl"></span>
                  <a href="#" class="block bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center"><button type="submit">Ver mas</button></a>
                </div>
              </div>
            </div>
            <div class="flex-shrink-0 m-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg">
              <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
              </svg>
              <div class="relative pt-10 px-10 flex items-center justify-center">
                <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                <img class="relative w-40" src="{{ asset('images/parlante.png') }}" alt="">
              </div>
              <div class="relative text-white px-6 pb-6 mt-6">
                <span class="block font-semibold text-xl">Parlantes</span>
                <div class="flex justify-between">
                  <span class="block font-semibold text-xl"></span>
                  <a href="#" class="block bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center"><button type="submit">Ver mas</button></a>
                </div>
              </div>
            </div>
            
          </div>


          <section class="bg-white">
            <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
                <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                    <div class="px-5 py-2">
                        <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                            Sobre nosotros
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                            Productos
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                            Equipo
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                            Contactanos
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                            Terminos y condiciones
                        </a>
                    </div>
                </nav>
                <p class="mt-8 text-base leading-6 text-center text-gray-400">
                    © 2023 MusicPro. All rights reserved.
                </p>
            </div>
        </section>
          
        </section>

        
      </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>