@extends('layout.config')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment {{$message}}</title>
</head>
<body>
    <div class="card px-5 text-danger">
        <h1>
            Your Payment : {{$message}}<br>
            {{$success_message}}
        </h1>
    </div>
    
    <button class="px-5 ml-5"><a href="{{url('/')}}">Back</a></button>
</body>
</html>