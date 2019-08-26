<select class="form-control" onchange="if(this.options[this.selectedIndex].value!='')
{window.location=this.options[this.selectedIndex].value}
else{this.options[selectedIndex=0];}">

    @foreach($langs as $lang)
        <option
            value="/lang/{{ $lang->locale }}"
            @if($lang->locale == config('app.locale'))
            selected="selected"
            @endif
        >
            {{ $lang->locale }}
        </option>
    @endforeach
</select>

