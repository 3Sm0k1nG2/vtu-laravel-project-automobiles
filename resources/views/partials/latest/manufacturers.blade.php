@if($manufacturers)
<div id="manufacturers" class="latest">
    @include('partials.latest.latest_pagination_header', [
        'paginator' => $manufacturers,
        'item_group_name' => 'Manufacturer'
    ])
    @foreach ($manufacturers as $manufacturer)
    <div class="item">
        <div class="img-container">
            <img src="{{ $manufacturer->image }}" width="128" alt="{{ $manufacturer->name . '\'s ' . ($imageName ?? 'image') }}">
        </div>
        <ul>
            <li>{{ $manufacturer->name }}&trade;</li>
            <li>
                @include('partials.latest.latest_link', [
                    'param_name' => 'man_year',
                    'link_resource' => $manufacturer->founded_year,
                    'value' => $manufacturer->founded_year,
                ])
            </li>
        </ul>
    </div>  
    @endforeach
</div>
@endif
