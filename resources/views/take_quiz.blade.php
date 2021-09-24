@extends('layouts.header')
@section('content')
<div class="quiz-top-area text-center" style="padding: 5px 0px;background-color:#9d43ac">
  <h1 style="color: white;">{{ $quiz['quiz_title'] }}</h1>
</div>
<form action="{{ url('marketplace') }}" method="get">
  <div class="response">
    <div class="wizard-forms clearfix position-relative" style="background-image: url({{ asset('assets/images/qbg.jpg') }});">
      <div class="quiz-title text-center" style="margin: 0 auto;max-width: 800px; text-align: center!important;">
        <p id="question_title" style="color: #151515;font-size: 24px;font-weight: 500;">{{ $quiz['questions'][0]['title'] }}</p>
      </div>
      <div class="quiz-option-selector clearfix">
        <ul class="row">
          <input type="hidden" class="question_id" value="{{ $quiz['questions'][0]['id'] }}">
          <input type="hidden" class="quiz_id" value="{{ $quiz['id'] }}">
          <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
            <label class="start-quiz-item adjust" style="box-sizing: border-box;">
              <div class="row">
                <div class="col-3 cntr">
                  <input id="" type="radio" name="quiz[]" value="{{ $quiz['questions'][0]['answers'][0]['id'] }}" class="exp-option-box answer_input">
                  <span class="exp-number text-uppercase">A</span>
                </div>
                <div class="col-9 cntr2">
                  <span class="exp-label answer_title">{{ $quiz['questions'][0]['answers'][0]['title'] }}</span>
                  <span class="checkmark-border"></span>
                </div>
              </div>
            </label>
          </li>
          <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
            <label class="start-quiz-item adjust" style="box-sizing: border-box;">
              <div class="row">
                <div class="col-3 cntr">
                  <input id="" type="radio" name="quiz[]" value="{{ $quiz['questions'][0]['answers'][1]['id'] }}" class="exp-option-box answer_input1">
                  <span class="exp-number text-uppercase">B</span>
                </div>
                <div class="col-9 cntr2">
                  <span class="exp-label answer_title1">{{ $quiz['questions'][0]['answers'][1]['title'] }}</span>
                  <span class="checkmark-border"></span>
                </div>
              </div>
            </label>
          </li>
          <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
            <label class="start-quiz-item adjust" style="box-sizing: border-box;">
              <div class="row">
                <div class="col-3 cntr">
                  <input id="" type="radio" name="quiz[]" value="{{ $quiz['questions'][0]['answers'][2]['id'] }}" class="exp-option-box answer_input2">
                  <span class="exp-number text-uppercase">C</span>
                </div>
                <div class="col-9 cntr2">
                  <span class="exp-label answer_title2">{{ $quiz['questions'][0]['answers'][2]['title'] }}</span>
                  <span class="checkmark-border"></span>
                </div>
              </div>
            </label>
          </li>
          <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
            <label class="start-quiz-item adjust" style="box-sizing: border-box;">
              <div class="row">
                <div class="col-3 cntr">
                  <input id="" type="radio" name="quiz[]" value="{{ $quiz['questions'][0]['answers'][3]['id'] }}" class="exp-option-box answer_input3">
                  <span class="exp-number text-uppercase">D</span>
                </div>
                <div class="col-9 cntr2">
                  <span class="exp-label answer_title3">{{ $quiz['questions'][0]['answers'][3]['title'] }}</span>
                  <span class="checkmark-border"></span>
                </div>
              </div>
            </label>
          </li>
        </ul>
      </div>
    </div>
    <div class="actions">
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">
          0%
        </div>
      </div>
      <div class="row last">
        <div class="col-sm-6 prev">
          <button class="prev_next js-btn-prev" data-attribute="0" type="button" class="btn btn-default">PREVIOUS QUESTION</button>
        </div>
        <div class="col-sm-6 next" class="next next_submit">
          <button class="prev_next js-btn-next" data-attribute="1" type="button" class="btn btn-default">NEXT QUESTION</button>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection
@section('scripts')    
<script type="text/javascript">

  $(document).ready(function()
  {
    $(document).on('click', '.prev_next',function()
    {

      skip = $(this).attr('data-attribute');

      var json_data = {
        "question_id" : $('.question_id').val(),
        "quiz_id" : $('.quiz_id').val(),
        "ans_selected" : $('.exp-option-box:checked').val(),
        "quiz_attempt_id" : {{ $quiz_attempt_id }},
        "_token": "{{ csrf_token() }}",
        "skip": skip
      }



      $.ajax(
      {
        url: "{{ url('take_quiz/'.$quiz_attempt_id) }}",
        type: "post",
        data: json_data,
        datatype: "html"
      }).done(function(data){

        var result = JSON.parse(data);
        console.log(result.question.data)
        if(result.question.data !== null){
          $('#question_title').html(result.question.data.title);
          $('.answer_title').html(result.question.data.answers[0].title);
          $('.answer_title1').html(result.question.data.answers[1].title);
          $('.answer_title2').html(result.question.data.answers[2].title);
          $('.answer_title3').html(result.question.data.answers[3].title);

          $('.answer_input').attr('value',result.question.data.answers[0].id);
          $('.answer_inpu1').attr('value',result.question.data.answers[1].id);
          $('.answer_inpu2').attr('value',result.question.data.answers[2].id);
          $('.answer_inpu3').attr('value',result.question.data.answers[3].id);
          $('.start-quiz-item').css('background','white');
          $('.start-quiz-item span').css('color','#446d76');
          $('.question_id').val(result.question.data.id)
          $('#question_title').html(result.question.data.title);
          $('.js-btn-prev').attr('data-attribute',skip-1);
          $('.js-btn-next').attr('data-attribute',+skip+1);
          var percentage = Math.round(skip/result.count*100);

          $('.progress-bar').css('width',percentage+'%');
          $('.progress-bar').html(percentage+'%');


        }
        else{
//redirect
window.location.replace("{{ url('thank_you') }}");
}
});
    });

  });


</script>
@endsection
