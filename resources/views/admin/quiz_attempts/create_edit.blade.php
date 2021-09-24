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
                        <label for="quiz_id" class="control-label">Quiz id</label>
                        <select name="quiz_id" id="quiz_id" class="form-control">
                            @foreach($quiz as $k => $v)
                            <option @if(@$row['quiz_id'] == $v['id']) selected="" @endif value="{{ $v['id'] }}">{{ $v['quiz_title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="course_id" class="control-label">course id</label>
                        <select name="course_id" id="course_id" class="form-control">
                            @foreach($courses as $k => $v)
                            <option @if(@$row['course_id'] == $v['id']) selected="" @endif value="{{ $v['id'] }}">{{ $v['course_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="std_id" class="control-label">std id</label>
                        <select name="std_id" id="std_id" class="form-control">
                            @foreach($students as $k => $v)
                            <option @if(@$row['std_id'] == $v['id']) selected="" @endif value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quiz_result" class="control-label">quiz result</label>
                        <input type='text' name="quiz_result" id="quiz_result" class="form-control" required=""  value="{{@$row['quiz_result']}}" />
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