<style type="text/css">
    .form-check-input{
        width: 30px;
        height: 20px;
    }
</style>
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="control-label">title</label>
                        <textarea name="title" class="editor">
                            {{ @$row['title'] }}
                        </textarea>
                        {{-- <input type='text' name="title" id="title" class="form-control" required=""  value="{{@$row['title']}}" /> --}}
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="type" class="control-label">type</label>
                        <select name="type" id="type" class="form-control">
                            @foreach(config('constants.question_types') as $type)
                            <option @if(@$row['type'] == $type) selected="" @endif value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type" class="control-label">Learn More URL</label>
                        <input type="text" name="learn_more_url" value="{{ @$row['learn_more_url'] }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type" class="control-label">Question Image</label>
                        <input type="file" name="question_image" class="form-control">
                    </div>
                </div>

                @if(!@$selected_quiz)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="course_id" class="control-label">Quiz</label>
                        <select name="quiz_id" id="quiz_id" class="form-control">
                            @foreach($quiz as $k => $v)
                            <option @if(@$row['quiz_id'] == $v['id']) selected="" @endif value="{{ $v['id'] }}">{{ $v['quiz_title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                <input type="hidden" name="quiz_id" value="{{ $selected_quiz }}">
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="answer_explaination">Explaination</label>
                        <textarea name="answer_explaination" class="editor">
                            {{ @$row['answer_explaination'] }}
                        </textarea>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Answer (A)</label>

                        @php($i = (@$row['answers'][0])?@$row['answers'][0]['id']:1)
                        {{-- <textarea name="answers[{{ $i }}]" class="editor">
                           {{ @$row['answers'][0]['title'] }}
                        </textarea> --}}

                        
                        <input type="text" name="answers[{{ $i }}]" value="{{ @$row['answers'][0]['title'] }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Correct </label><br>
                        <input type="checkbox" name="is_correct[]" @if(@$row['answers'][0]['is_correct'] == 1) checked="" @endif value="{{ $i }}" class="form-check-input">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Answer (B)</label>
                        @php($i = (@$row['answers'][1])?@$row['answers'][1]['id']:2)
                        <input type="text" name="answers[{{ $i }}]"  value="{{ @$row['answers'][1]['title'] }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Correct </label><br>
                        <input type="checkbox" name="is_correct[]" @if(@$row['answers'][1]['is_correct'] == 1) checked="" @endif value="{{ $i }}" class="form-check-input">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Answer (C)</label>
                        @php($i = (@$row['answers'][2])?@$row['answers'][2]['id']:3)
                        <input type="text" name="answers[{{ $i }}]" value="{{ @$row['answers'][2]['title'] }}"  class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Correct </label><br>
                        <input type="checkbox" name="is_correct[]" @if(@$row['answers'][2]['is_correct'] == 1) checked="" @endif value="{{ $i }}" class="form-check-input">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group">
                        <label>Answer (D)</label>
                        @php($i = (@$row['answers'][3])?@$row['answers'][3]['id']:4)
                        <input type="text" name="answers[{{ $i }}]" value="{{ @$row['answers'][3]['title'] }}"  class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Correct </label><br>
                        <input type="checkbox" name="is_correct[]" @if(@$row['answers'][3]['is_correct'] == 1) checked="" @endif value="{{ $i }}" class="form-check-input">
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
<script>
    all_editors = document.querySelectorAll('.editor')

  for (i = 0; i < all_editors.length; ++i) {
  ClassicEditor
  .create( all_editors[i] , {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'CodeBlock','Code' ],
    heading: {
      options: [
      { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
      { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
      { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
      ]
    }
  } )
  .catch( error => {
    console.log( error );
  } );
  }
</script>

