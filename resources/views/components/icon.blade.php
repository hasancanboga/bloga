@props(['name'])

@if ($name === 'down-arrow')
    <svg {{ $attributes(['class' => 'transform -rotate-90']) }} style="right: 5px;" width="22" height="22" viewBox="0 0 22 22">
        <g fill="none" fill-rule="evenodd" data-darkreader-inline-fill="" style="--darkreader-inline-fill:none;">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z" data-darkreader-inline-stroke="" style="--darkreader-inline-stroke:#e8e6e3;"></path>
            <path fill="#ccc" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#d3cfc9;"></path>
        </g>
    </svg>
@endif
