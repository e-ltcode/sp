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
                        <label for="">User id:</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $k => $v)
                            <option @if(@$row['user_id']==$v['id']) selected="" @endif data-key="{{$k}}"
                                value="{{$v['id']}}">{{$v['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">Name</label>
                        <input type='text' name="f_name" id="f_name" class="form-control" required=""
                            value="{{ Auth::user()->name }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required=""
                            value="{{ Auth::user()->email }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">City</label>
                        <input type="text" name="city" id="city" class="form-control" required="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">State</label>
                        <input type="text" name="state" id="state" class="form-control" required="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">Zip</label>
                        <input type="text" name="zip" id="zip" class="form-control" required="" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="amount" class="control-label">amount</label>
                        <input type='text' name="amount" id="amount" class="form-control" required=""
                            value="{{@$row['amount']}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount" class="control-label">discount</label>
                        <input type='text' name="discount" id="discount" class="form-control" required=""
                            value="{{@$row['discount']}}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Payment Type:</label>
                        <select class="form-control" id="payment_type" name="payment_type">
                            @foreach($payment_types as $k => $v)
                            <option data-key="{{$k}}" value="{{$v}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info m-btn m-btn--icon" id="add_oh_period"><span>
                    <i class="fas fa-check"></i>
                    <span>{{ @$button_text }}</span></span></button>
            <button type="button" class="btn btn-secondary m-btn m-btn--icon"
                data-dismiss="modal"><span>Close</span></button>
        </div>
    </form>
</div>