<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
</head>
<body style="font-size: 24px">
    <center><h1>Welcome user</h1></center>
    <ul style="">
        <li><u>Home</u></li>
        <li><a href={{ route('manufacturers') }}>Manufacturers</a></li>
        <li><a href={{ route('models') }}>Models</a></li>
        <li><a href={{ route('vehicles') }}>Vehicles</a></li>
    </ul>
</body>
</html>
