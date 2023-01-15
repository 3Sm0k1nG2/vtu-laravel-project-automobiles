<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}"></link>
</head>
<body style="font-size: 24px">
    <nav>
        <a href="{{ route('index') }}">Home</a>
        <a href="{{ route('manufacturer.index') }}">Manufacturers</a>
        <a href="{{ route('model.index') }}">Models</a>
        <a href="{{ route('vehicle.index') }}">Vehicles</a>
    </nav>

    <center><h1>Vehicles</h1></center>

    @if($vehicles)
        <ul>
            @foreach ($vehicles as $vehicle)
                <li>
                    <a href="{{ route('vehicle.show', $vehicle->id) }}">
                        {{ $vehicle->model->name }}({{ $vehicle->production_year }}) {{ $vehicle->kilometer_age }}km
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <div class="pagination">
        {{ $vehicles->links() }}
    </div>
</body>
</html>
