<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        {{$alumno->grupo->ciclo->nombre}}
        {{$alumno->grupo->nombre}}
        {{$alumno->nombres}} {{$alumno->apellidoP}} {{$alumno->apellidoM}}
        {{$alumno->curp}} 
</body>
</html>