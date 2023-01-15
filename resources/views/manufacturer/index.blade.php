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

    <center><h1>Manufacturers</h1></center>

    @if ($manufacturers)
        <ul>
            @foreach ($manufacturers as $manufacturer)
                <li>
                    <a href="{{ route('manufacturer.show', $manufacturer->id) }}">
                        {{ $manufacturer->name }}({{ $manufacturer->founded_year }})
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No manufacturers found.</h2>
    @endif

    <div class='pagination'>
        {{ $manufacturers->links() }}
    </div>

</body>
</html>
