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
                @if(!@$selected_question)
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="">Question ID</label>
                        <select class="form-control" id="question_id" name="question_id">
                           @foreach($questions as $k => $v)
                           <option @if(@$row['question_id'] == $v['id']) selected="" @endif data-key="{{$k}}" value="{{$v['id']}}">{{$v['title']}}</option>
                           @endforeach
                       </select>
                   </div>
               </div>
               @else
               <input type="hidden" name="question_id" value="{{ @$selected_question }}">
               @endif
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title" class="control-label">title</label>
                    <input type='text' name="title" id="title" class="form-control" required=""  value="{{@$row['title']}}" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="is_correct" class="control-label">
                        <input type="checkbox" name="is_correct" value="1" @if(@$row['is_correct']) checked="" @endif>
                    Is Correct</label>
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