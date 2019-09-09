<ol class="dd-list">
    @foreach($items as $i)
        <li class="dd-item" data-id="{{ $i['id'] }}">
            <div class="dd-handle">{{ $i['label'] }}</div>
            @if(isset($i['children']))
                <ol class="dd-list">
                    @foreach($i['children'] as $children)
                        <li class="dd-item" data-id="{{ $children['id'] }}">
                            <div class="dd-handle">{{ $children['label'] }}</div>
                        </li>
                    @endforeach
                </ol>
            @endif
        </li>
    @endforeach
</ol>
