@props(['column', 'label'])

<a href="{{ request()->fullUrlWithQuery(['sort' => request('sort') == $column ? '-'.$column : $column]) }}"
   class="sort-link d-flex align-items-center">
    <span class="sub-text">{{ $label }}</span>
    @if(request('sort') == $column)
        <em class="icon ni ni-sort-up-fill"></em>
    @elseif(request('sort') == '-'.$column)
        <em class="icon ni ni-sort-down-fill"></em>
    @else
        <em class="icon ni ni-sort-fill"></em>
    @endif
</a>
