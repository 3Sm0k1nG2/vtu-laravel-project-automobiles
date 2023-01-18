@php
    $base_query_params = request()->query->all();
    $base_query_params[$entities_name] = 1;
    $entities_name_strsub_first_3 = substr($entities_name, 0, 3);

    $additional_uri = '';

    foreach ($base_query_params as $key => $value) {
        if($key === $entities_name){
            continue;
        }

        if($entities_name_strsub_first_3 === substr($key, 0, 3)){
            unset($base_query_params[$key]);
            continue;
        }

        $additional_uri = $additional_uri . '&' . $key . '=' . $value;
    }

    $base_url = url('/') 
    . '/?manufacturers=' . ($base_query_params['manufacturers'] ?? 1)
    . '&models=' . ($base_query_params['models'] ?? 1)
    . '&vehicles=' . ($base_query_params['vehicles'] ?? 1)
    . $additional_uri
    . '#' . $entities_name;
@endphp

<div class="controls">
    <h6>Latests {{ $item_group_name }}
        (
        @if ($paginator->currentPage() > $paginator->lastPage())
            {{ $paginator->total() }}
        @else
            {{ $paginator->count() + $paginator->perPage() * ($paginator->currentPage() - 1) }}
        @endif
        /
        {{ $paginator->total() }}
        )
    </h6>
    <div class="close">
        <a href="{{ $base_url }}">
            <img src="{{ 'images\close.png' }}" class="img-close">
        </a>
    </div>
    @if ($paginator->lastPage() > 1)
        <ul class="pagination">
            <li class="{{ $paginator->currentPage() <= 1 ? 'disabled' : '' }}">
                <a href="{{ ($paginator->url($paginator->currentPage() - 1)) . '#' . strtolower($item_group_name)}}">
                    <img src="{{ 'images\left-arrow.png' }}">
                </a>
            </li>
            <li class="{{ $paginator->currentPage() >= $paginator->lastPage() ? 'disabled' : '' }}">
                <a href="{{ ($paginator->url($paginator->currentPage() + 1)) . '#' .  strtolower($item_group_name)}}">
                    <img src="{{ 'images\left-arrow.png' }}" class="img-rotate-right">
                </a>
            </li>
        </ul>
    @endif
</div>
