@if($models)
<div id="models" class="latest">
    @include('partials.latest.latest_pagination_header', [
        'paginator' => $models,
        'item_group_name' => 'Models'
    ])
    @foreach ($models as $model)
    <div class="item">
        <div class="img-container img-container-shadow">
            <img src="{{ $model->image }}" width="128" alt="{{ $model->name . '\'s ' . ($imageName ?? 'image') }}">
        </div>
        <ul>
            <li>
                @include('partials.latest.latest_link', [
                    'param_name' => 'mod_man',
                    'link_resource' => $model->manufacturer_id,
                    'value' => $model->manufacturer->name,
                    'trademark' => true,
                ])
            </li>
            <li>{{ $model->name}}</li>
        </ul>
    </div>  
    @endforeach
</div>
@endif
