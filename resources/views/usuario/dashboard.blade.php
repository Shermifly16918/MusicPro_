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
</head>
<body>
     <div class="flex flex-wrap place-items-center h-screen">
        <section class="relative mx-auto">
            <!-- navbar -->
            @include('carritoUsuario.navbar')
            <main class="py-4">
                @yield('content')
            </main>

    <div id="main-content" class="h-full w-4/5 bg-gray-50 relative overflow-y-auto lg:ml-20">
         <div class="grid grid-cols-1 xl:gap-4 my-4">
            <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
               <div class="flex items-center justify-between mb-4">
                  <h3 class="text-xl font-bold leading-none text-gray-900">Datos personales</h3>
               </div>
               <div class="flex flex-col mt-15">
                <div class="overflow-x-auto rounded-lg">
                   <div class="align-middle inline-block max-w-full">
                      <div class="shadow overflow-hidden sm:rounded-lg">
                         <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                               <tr>
                                  <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     Id
                                  </th>
                                  <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     Usuario
                                  </th>
                                  <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuario
                                 </th>
                                 <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuario
                                 </th>
                                 <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuario
                                 </th>
                                  <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     Nombres
                                  </th>
                                  <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                     Action
                                  </th>
                               </tr>
                            </thead>
                            <tbody class="bg-white">
                               
                               <tr>
                                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$data->usuario}}
                                  </td>
                                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$data->usuario}}
                                  </td>
                                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                    {{$data->usuario}}
                                  </td>
                                  <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                     <a href="cerrarSesion">LogOut</a>
                                  </td>
                               </tr>
                               
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
             </div>
            </div>
        </div>
        </section>

        
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
    </body>
</html>