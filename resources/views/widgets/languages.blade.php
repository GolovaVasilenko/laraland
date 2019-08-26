<select class="form-control" onchange="if(this.options[this.selectedIndex].value!=''){window.location=this.options[this.selectedIndex].value}else{this.options[selectedIndex=0];}">
    @foreach($langs as $lang)
        <option>
            locale == config('app.locale')) {echo 'selected';} ?> value="/lang/{{ $lang->locale }}">{{ $lang->name }}
        </option>
    @endforeach
</select>
