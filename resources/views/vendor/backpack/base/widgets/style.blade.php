@php
    $widget['rel'] = $widget['rel'] ?? 'stylesheet';

    $href = asset($widget['href'] ?? $widget['content'] ?? $widget['path']);
    $attributes = collect($widget)->except(['name', 'section', 'type', 'stack', 'href', 'content', 'path'])
@endphp

@push($widget['stack'] ?? 'after_styles')
    <link href="{{ $href }}" type="text/css"
        @foreach($attributes as $key => $value)
        {{ $key }}{!! $value === true || $value === '' ? '' : "=\"$value\"" !!}
        @endforeach
    />
@endpush
