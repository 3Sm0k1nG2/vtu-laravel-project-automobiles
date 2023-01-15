<div class="control">
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
