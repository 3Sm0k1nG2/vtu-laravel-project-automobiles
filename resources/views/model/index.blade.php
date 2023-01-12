<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body style="font-size: 24px">
    <nav>
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('manufacturer.index') }}">Manufacturers</a>
        <a href="{{ route('model.index') }}">Models</a>
        <a href="{{ route('vehicle.index') }}">Vehicles</a>
    </nav>

    <center><h1>Models</h1></center>

    @if ($models)
        <ul>
            @foreach ($models as $model)
                <li> 
                    <a href="{{ route('model.show', $model->id) }}">
                        {{ $model->name }}({{ $model->manufacturer->name }})
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>
