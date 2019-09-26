    @csrf
    @isset($section->id)
    <input type="hidden" name="id" value="{{ $section->id }}" />
    @endisset
    <div class="form-group">
        <label for="idName">ID Section</label>
        <input id="idName" class="form-control" type="text" name="idName" @isset($section->idName) value="{{ $section->idName }}" @endisset />
    </div>
    <div class="form-group">
        <label for="className">CSS Class Section</label>
        <input id="className" class="form-control" type="text" name="className" @isset($section->className) value="{{ $section->className }}" @endisset />
    </div>
    <div class="form-group">
        <label for="className">Section for Page</label>
        <select id="className" class="form-control" name="page_id">
            @foreach($pages as $page)
            <option value="{{ $page->id }}" @isset($section->page_id) @if($page->id == $section->page_id) selected @endif @endisset>{{ $page->translate->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Type Form</label>
        <input type="text" class="form-control" name="type" @isset($section->type) value="{{ $section->type }}" @endisset />
    </div>
        <input type="hidden" name="lang" value="{{ App::getLocale() }}" />
    <div class="form-group">
        <label for="title">Title Collection</label>
        <input id="title" class="form-control" type="text" name="data[title]" @isset($section->translate->data['title']) value="{{ $section->translate->data['title'] }}" @endisset />
    </div>
    <div class="form-group">
        <label for="desc">Description Collection</label>
        <textarea id="desc" class="form-control" name="data[description]" >
            @isset($section->translate->data['description']) {{ $section->translate->data['description'] }} @endisset
        </textarea>
    </div>
    <div class="form-group">
        <label for="link">Link Collection</label>
        <input id="link" class="form-control" type="text" name="data[link]" @isset($section->translate->data['link']) value="{{ $section->translate->data['link'] }}" @endisset />
    </div>
    <div class="form-group">
        <label>Background color:</label>
        <input name="data[bgColor]" type="text" class="form-control colorpicker-field colorpicker-element" @isset($section->translate->data['bgColor']) value="{{ $section->translate->data['bgColor'] }}" @endisset data-colorpicker-id="1" data-original-title="" title="">
    </div>
    <hr>
    @isset($media)

    @else
    <div class="form-group">
        <label for="customFile">Gallery:</label>
        <div class="custom-file">
            <input type="file" name="images[gallery][]" multiple class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>
    @endisset
    <input type="submit" value="Send" />
