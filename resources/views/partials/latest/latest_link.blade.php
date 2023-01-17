@php
    $trademark = $trademark ?? false;
    $currUri = request()->getUri();
@endphp

<a
@if (request()->query->get($param_name))
    href="{{ preg_replace('/&' . $entities_name. '=[^&]*/', '&'  . $entities_name . '=1', preg_replace('/&' . $param_name. '=[^&]*/', '&'  . $param_name . '=' . $link_resource, $currUri)) . '#' . $entities_name }}">
@else
    href="{{ preg_replace('/&' . $entities_name. '=[^&]*/', '&'  . $entities_name . '=1', request()->getUri() . (request()->query->count() ? '&' : '?') . $param_name . '=' . $link_resource) . '#' . $entities_name }}">
@endif
{{ $value}}
@if ($trademark)
    &trade;
@endif
</a>
