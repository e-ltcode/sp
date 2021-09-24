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
    <form action="{{$action}}" method="post" class="make_ajax" >
        
        <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="quiz_title" class="control-label">quiz title</label>
                        <input type='text' name="quiz_title" id="quiz_title" class="form-control" required=""  value="{{@$row['quiz_title']}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type='text' name="price" id="price" class="form-control" required=""  value="{{@$row['price']}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Quiz Image</label>
                        <input type='file' name="image" id="image" class="form-control" required="" value="{{@$row['image']}}" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="quiz_description" class="control-label">quiz description</label>
                        <textarea name="quiz_description" id="quiz_description" class="form-control" required="">{{@$row['quiz_description']}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info m-btn m-btn--icon" id="add_oh_period"><span><i class="la la-check"></i><span>{{ @$button_text }}</span></span></button>
            <button type="button" class="btn btn-secondary m-btn m-btn--icon" data-dismiss="modal"><span>Close</span></button>
        </div>
    </form>
</div> 