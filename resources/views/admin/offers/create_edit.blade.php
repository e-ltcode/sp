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
                        <label for="offer_title" class="control-label">Offer Title</label>
                        <input type='text' name="quiz_title" id="offer_title" class="form-control" required=""
                            value="{{ @$offers ['quiz_title'] }}" />
                    </div>
                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type='number' name="price" id="price" class="form-control" required=""
                            value="{{ @$offers['price'] }}" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Quiz Image</label>
                        <input type='file' name="image" id="image" class="form-control" accept="image/*" required=""
                            value="{{@$row['image']}}" />
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