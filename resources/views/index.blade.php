@php
    $paginators_current_page = [
        'manufacturers' => $manufacturers->currentPage(),
        'models' => $models->currentPage(),
        'vehicles' => $vehicles->currentPage(),
        'man_year' => request()->query->get('man_year'),
        'mod_man' => request()->query->get('mod_man'),
        'veh_man' => request()->query->get('veh_man'),
        'veh_mod' => request()->query->get('veh_mod'),
        'veh_year' => request()->query->get('veh_year'),
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
            @include('partials.latest.manufacturers', [
                'entities_name' => 'manufacturers'
            ])
            @include('partials.latest.models', [
                'entities_name' => 'models'
            ])
            @include('partials.latest.vehicles', [
                'entities_name' => 'vehicles'
            ])
        </section>
    </main>
    @include('partials.footer')
</body>
</html>
