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

    <center><h1>Vehicle</h1></center>
    <a href="{{ route('vehicle.index') }}">Go back</a>

    <ul>
        <li>Model: 
            <a href="{{ route('model.show', $vehicle->model->id) }}">
                {{ $vehicle->model->name }}
            </a>
        </li>
        <li>Production Year: {{ $vehicle->production_year }}</li>
        <li>Kilometer Age: {{ $vehicle->kilometer_age }}</li>
        <li>Manufacturer: 
            <a href="{{ route('manufacturer.show', $vehicle->model->manufacturer->id) }}">
                {{ $vehicle->model->manufacturer->name }}
            </a>
        </li>
        <li>Id: {{ $vehicle->id }}</li>
        <li>Created At: {{ $vehicle->created_at }}</li>
        <li>Updated At: {{ $vehicle->updated_at }}</li>
    </ul>

</body>
</html>
