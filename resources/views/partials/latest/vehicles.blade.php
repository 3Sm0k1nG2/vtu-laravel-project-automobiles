@if($vehicles)
<div id="vehicles" class="latest">
    @include('partials.latest.latest_pagination_header', [
        'paginator' => $vehicles,
        'item_group_name' => 'Vehicles'
    ])
    @foreach ($vehicles as $vehicle)
    <div class="item">
        <div class="img-container img-container-shadow">
            <img src="{{ $vehicle->model->image }}" alt="{{ $vehicle->model->name . '\'s ' . ($imageName ?? 'image') }}">
        </div>
        <ul>
            <li>{{ $vehicle->manufacturer->name }}&trade;</li>
            <li>{{ $vehicle->model->name }}</li>
            <li>Produced in {{ $vehicle->production_year }}</li>
            <li>{{ $vehicle->kilometer_age }} km</li>
        </ul>
    </div>  
    @endforeach
</div>
@endif
