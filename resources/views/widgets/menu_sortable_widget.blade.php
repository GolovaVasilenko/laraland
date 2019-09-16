<ol class="dd-list">
<!--
    @foreach($items as $i)
        <li class="dd-item" data-id="{{ $i['id'] }}">
            <div class="dd-handle">{{ $i['label'] }}</div>
            @if(!empty($i['children']))
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
    -->

    @php
    function buildMenu($items, $parent = 0)
    {
        foreach ($items as $i) {
            if (!empty($i['children'])) {
    @endphp
            <li class="dd-item" data-id="{{ $i['id'] }}">
                <div class="dd-handle">{{ $i['label'] }}</div>
                <ol class="dd-list">
                    <!--li class="dd-item" data-id="{{ $i['id'] }}">
                        <div class="dd-handle">{{ $i['label'] }}</div>
                    </li-->

                    @php buildMenu($i['children'], $i['id']); @endphp
                </ol>
            </li>
     @php
         } else {
     @endphp
            <li class="dd-item" data-id="{{ $i['id'] }}">
                <div class="dd-handle">{{ $i['label'] }}
                </div>
                <a href="{{ route('menu.item.edit', ['id' => $i['id']]) }}" class="bg-info btn-xs item-edit-link">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('menu.item.delete', ['id' => $i['id']]) }}" class="remove-item-js bg-danger btn-xs item-delete-link">
                    <i class="fa fa-trash"></i>
                </a>
            </li>
     @php
            }
        }
    }

    buildMenu($items);
    @endphp
</ol>
