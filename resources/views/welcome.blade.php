<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>

   {{$url}}
   <table>
      <thead>
         <th>Nombre</th>
      </thead>
      <tbody>
         @foreach($listado as $pi)
         <tr>
            <td>{{$pi->id_categoria}}</td>
            <td>{{$pi->nombre_categoria}}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
</body>
</html>