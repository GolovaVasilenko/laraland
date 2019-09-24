<div class="modal fade" id="modal-collection" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Collection</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('section.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idName">ID Section</label>
                        <input id="idName" class="form-control" type="text" name="idName" />
                    </div>
                    <div class="form-group">
                        <label for="className">CSS Class Section</label>
                        <input id="className" class="form-control" type="text" name="className" />
                    </div>
                    <div class="form-group">
                        <label for="className">Section for Page</label>
                        <select id="className" class="form-control" name="className">
                            @foreach($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->translate->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="type" value="collection" />
                    <input type="hidden" name="lang" value="{{ App::getLocale() }}" />
                    <div class="form-group">
                        <label for="title">Title Collection</label>
                        <input id="title" class="form-control" type="text" name="data[title]" />
                    </div>
                    <div class="form-group">
                        <label for="desc">Description Collection</label>
                        <input id="desc" class="form-control" type="text" name="data[description]" />
                    </div>
                    <div class="form-group">
                        <label for="link">Link Collection</label>
                        <input id="link" class="form-control" type="text" name="data[link]" />
                    </div>
                    <div class="form-group">
                        <label>Background color:</label>
                        <input name="data[bgColor]" type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="customFile">Gallery:</label>
                        <div class="custom-file">
                            <input type="file" name="data[gallery][]" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <input type="submit" value="Send" />
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
