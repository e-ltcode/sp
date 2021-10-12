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
                    <label for="email" class="control-label">Email</label>
                    <input type='text' name="email" id="email" class="form-control" required=""  value="{{@$row['email']}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" class="control-label">Password <small>(must be 8 characters)</small></label>
                    <input type='password' name="password" id="password" class="form-control" required="" />
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation" class="control-label">Confirm Password</label>
                    <input type='password' name="password_confirmation" id="password_confirmation" class="form-control" required=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-info m-btn m-btn--icon" id="add_oh_period"><span><i class="la la-check"></i><span>Submit</span></span></button>
        <button type="button" class="btn btn-secondary m-btn m-btn--icon" data-dismiss="modal"><span>Close</span></button>
    </div>
</form>
</div> 

