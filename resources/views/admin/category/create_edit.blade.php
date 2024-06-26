<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            {{@$page_title}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
                ×
            </span>
        </button>
    </div>
    <form action="{{$action}}" method="post" class="make_ajax">

        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="control-label">title</label>
                        <input type='text' name="title" id="title" class="form-control" required=""
                            value="{{@$row['title']}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="parent_category_id" class="control-label">Parent Category</label>
                        <select name="parent_category_id" id="parent_category_id" class="form-control">
                            <option value="">Please Select Category</option>
                            @foreach($categories as $k => $v)
                            <option @if(@$row['parent_category_id']==$v['id']) selected="" @endif
                                value="{{ $v['id'] }}">{{ $v['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="category_description" class="control-label">category description</label>
                        <textarea name="category_description" id="category_description" class="form-control"
                            required="">{{@$row['category_description']}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info m-btn m-btn--icon" id="add_oh_period"><span><i
                        class="fas fa-check"></i><span>{{ @$button_text }}</span></span></button>
            <button type="button" class="btn btn-secondary m-btn m-btn--icon"
                data-dismiss="modal"><span>Close</span></button>
        </div>
    </form>
</div>