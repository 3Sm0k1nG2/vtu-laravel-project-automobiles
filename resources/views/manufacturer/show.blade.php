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

    <center><h1>Manufacturer</h1></center>
    <a href="{{ route('manufacturer.index') }}">Go back</a>

    <ul>
        <li> Name: {{ $manufacturer->name }} </li>
        <li> Founded Year: {{ $manufacturer->founded_year }} </li>
        <li> Id: {{ $manufacturer->id }} </li>
        <li> Created At: {{ $manufacturer->created_at }} </li>
        <li> Updated At: {{ $manufacturer->updated_at }} </li>
    </ul>

</body>
</html>
