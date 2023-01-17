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
            <li>
                @include('partials.latest.latest_link', [
                    'param_name' => 'veh_man',
                    'link_resource' => $vehicle->manufacturer_id,
                    'value' => $vehicle->manufacturer->name,
                    'trademark' => true,
                ])
            </li>
            <li>
                @include('partials.latest.latest_link', [
                    'param_name' => 'veh_mod',
                    'link_resource' => $vehicle->model_id,
                    'value' => $vehicle->model->name,
                ])
            </li>
            <li>
                Produced in 
                @include('partials.latest.latest_link', [
                    'param_name' => 'veh_year',
                    'link_resource' => $vehicle->production_year,
                    'value' => $vehicle->production_year,
                ])
            </li>
            <li>{{ $vehicle->kilometer_age }} km</li>
        </ul>
    </div>  
    @endforeach
</div>
@endif
