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
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type='text' name="name" id="name" class="form-control" required="" value="{{@$row['name']}}" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type='email' name="email" id="email" class="form-control" required="" value="{{@$row['email']}}"  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <input type='text' name="phone" id="phone" class="form-control" value="{{@$row['phone']}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type='password' name="password" id="password" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password" class="control-label">Image</label>
                        <input type='file' name="image" id="image" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role" class="control-label">Role</label>
                        <select name="role" class="form-control" required="">
                            <option value="" selected="" disabled="">Select Role</option>
                            @foreach(config('constants.role') as $key => $val)
                            <option value="{{$key}}" @if($key == @$row['role']) selected @endif>{{$val}}</option>
                            @endforeach
                        </select>
                        {{-- <input type='number' name="student_number" id="student_number" class="form-control" /> --}}
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