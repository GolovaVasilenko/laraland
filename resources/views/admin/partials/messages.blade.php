@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(\Session::has('flash_message'))
    <div class="alert alert-info">
        {{ \Session::get('flash_message') }}
    </div>
@endif
