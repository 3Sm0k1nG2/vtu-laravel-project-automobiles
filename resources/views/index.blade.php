@php
    $paginators_current_page = [
        'manufacturers' => $manufacturers->currentPage(),
        'models' => $models->currentPage(),
        'vehicles' => $vehicles->currentPage(),
    ];

    $manufacturers->appends($paginators_current_page)->links();
    $models->appends($paginators_current_page)->links();
    $vehicles->appends($paginators_current_page)->links();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Automobiles</title>
    <link rel="icon" href="{{ url('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"></link>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('partials.header')
    <main>
        <h1>My Automobiles</h1>

        <section id="latests">
            @include('partials.latest.manufacturers')
            @include('partials.latest.models')
            @include('partials.latest.vehicles')
        </section>
    </main>
    @include('partials.footer')
</body>
</html>
