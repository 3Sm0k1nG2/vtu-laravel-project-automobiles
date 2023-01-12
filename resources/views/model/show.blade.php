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

    <center><h1>Model</h1></center>
    <a href="{{ route('model.index') }}">Go back</a>

    <ul>
        <li>Name: {{ $model->name }}</li>
        <li>Manufacturer:
            <a href="{{ route('manufacturer.show', $model->manufacturer->id) }}">
                {{ $model->manufacturer->name }}
            </a>
        </li>
        <li>Id: {{ $model->id }}</li>
        <li>Created At: {{ $model->created_at }}</li>
        <li>Updated At: {{ $model->updated_at }}</li>
    </ul>

</body>
</html>
