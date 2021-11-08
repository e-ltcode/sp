@extends('layouts.header')
@section('content')
<style type="text/css">
    .showbox {
        position: absolute;
        top: 185px;
        background-color: #fff;
        min-height: calc(100vh - 240px);
        display: none;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 5%;
    }
    .loader {
        position: relative;
        margin: 0 auto;
        width: 100px;
    }

    .loader::before {
        content: "";
        display: block;
        padding-top: 100%;
    }

    .circular {
        animation: rotate 2s linear infinite;
        height: 100%;
        transform-origin: center center;
        width: 100%;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
    .previous_button{
        display: none;
    }
    .path {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
        animation: dash 1.5s ease-in-out infinite, color 6s ease-in-out infinite;
        stroke-linecap: round;
    }

    @keyframes rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }
        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35px;
        }
        100% {
            stroke-dasharray: 899, 200;
            stroke-dashoffset: -124px;
        }
    }

    @keyframes color {
        100% {
        }
        0% {
            stroke: red;
        }
        40% {
            stroke: blue;
        }
        66% {
            stroke: green;
        }
        80% {
        }
        90% {
            stroke: yellow;
        }
    }

    .text-0{
        padding-left: 148px;
    }
    .border-1{
        background: #f5f5f5;
    }
    .tns-1{
        height: 119%
    }
    .t1-0{
        margin-top: 22px;
        margin-left: 1px;
    }
    .ds-1{
        text-align: end;
    }

    .ds-0{
        width: 85%;
        height: 20px;
        border-radius: 22px;
    }
    .progress-bar{
        background: #469ACD;
    }
    .PP-0{
        color:#469ACD;
    }
    .button-1{
        background: transparent !important;
        color: #469ACD !important;
        border-color: #469ACD !important;
        border: 2px solid #469acd !important;
        width: 100px;
    }
    .nn-2{
        background: #469ACD !important;
        color: white;
        border: 1px solid #469acd !important;
        width: 96px;
    }
    .button-1:hover {
        opacity: 0.7;
    }
    .nn-2:hover {
        opacity: 0.7;
    }
    .zx-1{
        font-size: 15px;
    }
    .brd-1{
        border: 1px solid #13172f10;
    }
    .layer_div{
        position: absolute;
        z-index: 99;
        display: none;
        background: transparent;
        width: 100%;
    }

    .checkbox-container {
        display: block;
        position: relative;
        padding-left: 35px;
        cursor: pointer;
        padding-bottom: 15px !important;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
    }

    .checkbox-container:hover input ~ .checkmark {
        background-color:  none ;
    }

    .checkbox-container input:checked  ~ .checkmark {
        background-color: #1e73be;
    }

    .checkbox-container :hover input ~ .checkmark {
        color: #1e73be;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }
    .checkbox-container input:checked ~ .checkmark{
        background: #eee;
    }
    .checkbox-container .checkmark:after {
       top: 5px;
       left: 4px;
       width: 17px;
       height: 16px;
       /*border-radius: 50%;*/
   }
   .footer-section{
    display: none;
}
.footer-loader{
    position: absolute !important;
    width: 100% !important;
    bottom: 0px !important;
}
.row.m-0.bg-black.text-white.header {
    display: none;
}
@media screen and (max-width: 600px) {
    .learn_more_div{
        margin-top: -20px;
    }
    .take_quiz_card{
        margin-left: 17px;
    }
    .main_take_quiz{
        padding: 0px !important;
    }
    .parent_div_take_quiz{
        padding: 0px !important;
        margin-left: -20px;
    }
}
.action_btn{
    z-index: 9999999999;
}

.navbar-expand-md{
    display: none;
}
.alert, .alert-dismissible .close{
    padding: 0.4rem 0.5rem !important;
}
.explaination_answer p{
    margin: 0px !important;
}
</style>
{{-- <div class="showbox">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterLimit="10" />
        </svg>
    </div>
</div> --}}
{{-- <div class="quiz-top-area text-center" style="padding: 5px 0px;background-color:#9d43ac">
    <h1 style="color: white;">{{ $quiz['quiz_title'] }}</h1>
</div>
<form action="{{ url('marketplace') }}" method="get">
    <div class="response">
        <div class="wizard-forms clearfix position-relative" style="background-image: url({{ asset('assets/images/qbg.jpg') }});background-size: cover;background-repeat: no-repeat;">
            <div class="quiz-title text-center" style="margin: 0 auto;max-width: 800px; text-align: center!important;">
                <span id="question_title" style="color: #151515;font-size: 24px;font-weight: 500;">{!! $quiz['questions'][0]['title'] !!}
                </span>
                <span type="button" id="tooltip_exp" class="fa fa-question-circle d-none" data-toggle="tooltip" data-html="true" data-placement="right" title="{{ $quiz['questions'][0]['answer_explaination'] }}">
                </span>

                <div class="alert mt-2 d-none alert-info exp_alert alert-dismissible fade show" style="width: 50%;margin: 0px auto;" role="alert">
                    <strong>Explaination!</strong> 
                    <span class="explaination_answer"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="quiz-option-selector clearfix">
                <ul class="row">
                    <input type="hidden" class="question_id" value="{{ $quiz['questions'][0]['id'] }}">
                    <input type="hidden" class="quiz_id" value="{{ $quiz['id'] }}">
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust label1" @if($quiz['questions'][0]['answers'][0]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][0]['id'] }}" class="exp-option-box answer_input">
                                    <span class="exp-number text-uppercase">A</span>
                                </div>
                                <div class="col-9  mt-set">
                                    <span class="exp-label answer_title">{!! $quiz['questions'][0]['answers'][0]['title'] !!}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust label2" @if($quiz['questions'][0]['answers'][1]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][1]['id'] }}" class="exp-option-box answer_input1">
                                    <span class="exp-number text-uppercase">B</span>
                                </div>
                                <div class="col-9 mt-set">
                                    <span class="exp-label answer_title1">{!! $quiz['questions'][0]['answers'][1]['title'] !!}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust label3" @if($quiz['questions'][0]['answers'][2]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][2]['id'] }}" class="exp-option-box answer_input2">
                                    <span class="exp-number text-uppercase">C</span>
                                </div>
                                <div class="col-9 mt-set">
                                    <span class="exp-label answer_title2">{!! $quiz['questions'][0]['answers'][2]['title'] !!}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust label4" @if($quiz['questions'][0]['answers'][3]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][3]['id'] }}" class="exp-option-box answer_input3">
                                    <span class="exp-number text-uppercase">D</span>
                                </div>
                                <div class="col-9  mt-set">
                                    <span class="exp-label answer_title3">{!! $quiz['questions'][0]['answers'][3]['title'] !!}</span>
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
            <div class="row last no-gutters">
                <div class="col-sm-6 prev">
                    <button class="prev_next js-btn-prev" data-attribute="0" type="button" class="btn btn-default">PREVIOUS QUESTION</button>
                </div>
                <div class="col-sm-6 next" class="next next_submit">
                    <button class="prev_next js-btn-next" data-attribute="1" type="button" class="btn btn-default">NEXT QUESTION</button>
                </div>
            </div>
        </div>
    </div>
</form> --}}


<div class="container mt-5 parent_div_take_quiz">
    <div class="row" style="max-width: 700px;margin: 0px auto">
        <div class="col-md-12 nn-0 main_take_quiz">
            <div class="card w-100 py-5 take_quiz_card">
                <div class="d-flex" style="align-items: center; justify-content: center; ">
                    <div class="progress ds-0">
                        <div class="progress-bar" style="width: 0%">0%</div>
                    </div>
                </div>
                <div class="card-body mt-4 tns-1">
                    <div class="text-center" style="border-bottom: 1px solid #e9e6e6;padding-bottom: 10px;">
                        @if(!empty($quiz['questions'][0]['question_image']))
                        <img class="card-img-top text-center question_image" style="width: 90%;" src="{{ url('storage/app/public'.'/'. $quiz['questions'][0]['question_image']) }}" alt="Card image cap">
                        @endif
                    </div>
                    <div style="display: inline-flex; position: absolute;right: 30px" class="learn_more_div">
                        {{-- <i class="fa fa-question-circle ml-3  icon_exp" aria-hidden="true" data-placement="right" data-toggle="tooltip" data-html="true" title="{{ $quiz['questions'][0]['answer_explaination'] }}" style="height: 15px; margin-top: 21px;"></i>  --}}
                        <div class="learn_more" style="margin-top: 18px; margin-left: 3px;">    
                            @if(!empty($quiz['questions'][0]['learn_more_url']))
                            <a href="http://{{ $quiz['questions'][0]['learn_more_url'] }}" target="_blank" style="color: #9d43ac" class=""><b>Learn More</b></a> 
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-between" >

                        <span class="card-title mt-3 pl-3 text-left ck-content " style="width: 100%" id="question_title">{!! $quiz['questions'][0]['title'] !!}
                        </span>

                    {{-- 
                      <i class="fa fa-question-circle ml-3 d-none icon_exp" aria-hidden="true" data-placement="right" data-toggle="tooltip" data-html="true" title="{{ $quiz['questions'][0]['answer_explaination'] }}" style="height: 15px; margin-top: 21px;"></i> --}}
                  </div>


                  <input type="hidden" name="" value="{{ $quiz['questions'][0]['answer_explaination'] }}" class="get_ans_exp">

                  <div class="alert mt-2 d-none alert-info text-center exp_alert alert-dismissible fade show" style="width: 60%;margin: 0px auto;" role="alert">
                    <strong>Explaination:</strong> 
                    <span class="explaination_answer"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('marketplace') }}" method="get">
                    <input type="hidden" class="question_id" value="{{ $quiz['questions'][0]['id'] }}">
                    <input type="hidden" class="quiz_id" value="{{ $quiz['id'] }}">
                    <div class="text-1 mt-4 pl-3">
                        <div class="layer_div">

                        </div>
                        @if(!empty($quiz['questions'][0]['answers'][0]['title']))
                        <div class="brd-1 my-1 ">
                            <label class="form-check-label py-3 ml-3 checkbox-container label1" @if($quiz['questions'][0]['answers'][0]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif for="exampleRadios1" style="font-size: 15px;">
                                <span class="answer_title">{{ $quiz['questions'][0]['answers'][0]['title']  }}</span>
                                <input type="radio"  id="exampleRadios1" class="answer_input input_radio" name="quiz[]"  value="{{ $quiz['questions'][0]['answers'][0]['id'] }}">
                                {{-- <input type="hidden" value="" class="answer_input input_radio" > --}}
                                <span class="checkmark "></span>
                            </label>
                        </div>
                        @endif
                        @if(!empty($quiz['questions'][0]['answers'][1]['title']))
                        <div class="brd-1 my-1 ">
                            <label class="form-check-label py-3 ml-3 checkbox-container label2" @if($quiz['questions'][0]['answers'][1]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif for="exampleRadios2" style="font-size: 15px;">
                                <span class="answer_title1">{{ $quiz['questions'][0]['answers'][1]['title']     }}</span>
                                <input type="radio"  id="exampleRadios2" class="answer_input1 input_radio" name="quiz[]"  value="{{ $quiz['questions'][0]['answers'][1]['id'] }}">
                                {{-- <input type="hidden" value="" class="answer_input input_radio1" name="quiz[]" > --}}
                                <span class="checkmark "></span>
                            </label>
                        </div>
                        @endif
                        @if(!empty($quiz['questions'][0]['answers'][2]['title']))
                        <div class="brd-1 my-1 ">
                            <label class="form-check-label py-3 ml-3 checkbox-container label3" @if($quiz['questions'][0]['answers'][2]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif for="exampleRadios3" style="font-size: 15px;">
                                <span class="answer_title2">{{ $quiz['questions'][0]['answers'][2]['title']     }}</span>
                                <input type="radio"  id="exampleRadios3" class="answer_input2 input_radio" name="quiz[]"  value="{{ $quiz['questions'][0]['answers'][2]['id'] }}">
                                {{-- <input type="hidden" value="" class="answer_input input_radio2" name="quiz[]" > --}}
                                <span class="checkmark "></span>
                            </label>
                        </div>
                        @endif
                        @if(!empty($quiz['questions'][0]['answers'][3]['title']))
                        <div class="brd-1 my-1 ">
                            <label class="form-check-label py-3 ml-3 checkbox-container label4" @if($quiz['questions'][0]['answers'][3]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif for="exampleRadios4" style="font-size: 15px;">
                                <span class="answer_title3">{{ $quiz['questions'][0]['answers'][3]['title']     }}</span>
                                <input type="radio"  id="exampleRadios4" class="answer_input3 input_radio" name="quiz[]"  value="{{ $quiz['questions'][0]['answers'][3]['id'] }}">
                                {{-- <input type="hidden" value="" class="answer_input input_radio3" name="quiz[]" > --}}
                                <span class="checkmark "></span>
                            </label>
                        </div>
                        @endif

                    </div>
                    <div class="row action_btn">
                        <div class="col-6 mt-3">

                            <button class="btn button-1 prev_next previous_button" data-attribute="0" type="button">
                                Previous
                            </button>
                <a href="{{ url('') }}" class="btn btn-primary" style="background-color: #469acd; border-color: #469acd;">Go Home</a>

                        </div>
                        <div class="col-6 mt-3 ds-1 next_submit">
                            <button class="btn nn-2 prev_next js-btn-next next_button" data-attribute="1" type="button">
                                Next
                            </button>

                            <button class="btn nn-2 submit_answer" data-attribute="1" type="button">
                                Submit
                            </button>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
</div>

@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function()
    {   

        $(document).on('click', '.prev_next',function()
        {
            $('.showbox').css('display','block');
            $('form').css('display','none');
            $('.footer-section').addClass('footer-loader');
            skip = $(this).attr('data-attribute');



            var json_data = {
                "question_id" : $('.question_id').val(),
                "quiz_id" : $('.quiz_id').val(),
                "ans_selected" : $('input[name="quiz[]"]:checked').val(),
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
                // console.log(result.question.data)
                if(result.question.data !== null){
                    $('#question_title').html(result.question.data.title);
                    $('.question_image').attr('src','{{ url('storage/app/public') }}'+'/'+result.question.data.question_image);
                    $('.get_ans_exp').val(result.question.data.answer_explaination);
                    if(result.question.data.question_image === null){
                        $('.question_image').css('display','none');
                    }
                    if(result.question.data.learn_more_url === null){
                        $('.learn_more').html('');
                    }else{
                        $('.learn_more a').attr('href','http://'+result.question.data.learn_more_url);
                    }
                    // $('.icon_exp').removeClass('d-block');
                    // $('.icon_exp').addClass('d-none');

                    $('.answer_title').html(result.question.data.answers[0].title);
                    $('.answer_title1').html(result.question.data.answers[1].title);
                    $('.answer_title2').html(result.question.data.answers[2].title);
                    $('.answer_title3').html(result.question.data.answers[3].title);
                    // console.log(json_data)

                    $('.current_question').html(parseInt(skip) + 1);

                    if(result.question.data.answers[0].is_correct == 1){
                        $('.label1').attr('data-correct',true);
                        $('.label2').attr('data-correct',false);
                        $('.label3').attr('data-correct',false);
                        $('.label4').attr('data-correct',false);
                    }else if(result.question.data.answers[1].is_correct == 1){
                        $('.label2').attr('data-correct',true);
                        $('.label1').attr('data-correct',false);
                        $('.label3').attr('data-correct',false);
                        $('.label4').attr('data-correct',false);

                    }
                    else if(result.question.data.answers[2].is_correct == 1){
                        $('.label3').attr('data-correct',true);
                        $('.label1').attr('data-correct',false);
                        $('.label2').attr('data-correct',false);
                        $('.label4').attr('data-correct',false);

                    }
                    else if(result.question.data.answers[3].is_correct == 1){
                        $('.label4').attr('data-correct',true);
                        $('.label1').attr('data-correct',false);
                        $('.label2').attr('data-correct',false);
                        $('.label3').attr('data-correct',false);

                    }
                    // $('start-quiz-item').attr('data-correct',);
                    // console.log(result.question.data.answers[2].id);

                    $('.layer_div').css('display','none');
                    $('.previous_button').css('display','unset');
                    // $('.next_button').css('display','none');
                    // $('.checkmark:after').css('display','none');
                    $('.checkmark').css('background','rgb(238, 238, 238)');
                    $('.answer_input').attr('value',result.question.data.answers[0].id);
                    $('.answer_input1').attr('value',result.question.data.answers[1].id);
                    $('.answer_input2').attr('value',result.question.data.answers[2].id);
                    $('.answer_input3').attr('value',result.question.data.answers[3].id);
                    $('.start-quiz-item').css('background','white');
                    $('.start-quiz-item span').css('color','#446d76');
                    $('.question_id').val(result.question.data.id)
                    $('#question_title').html(result.question.data.title);
                    $('#tooltip_exp').attr('title',result.question.data.answer_explaination)
                    $('#tooltip_exp').attr('data-original-title',result.question.data.answer_explaination)
                    $('.js-btn-prev').attr('data-attribute',skip-1);
                    $('.js-btn-next').attr('data-attribute',+skip+1);
                    var percentage = Math.round(skip/result.count*100);
                    $('.progress-bar').css('width',percentage+'%');
                    $('.progress-bar').html(percentage+'%');
                    if(skip == result.count-1){
                        $('.js-btn-next').html('Finish')
                    }
                    $('.showbox').css('display','none');
                    $('form').css('display','block');
                    $('.footer-section').removeClass('footer-loader');
                    $('.exp_alert').removeClass('d-block');
                    $('#tooltip_exp').removeClass('d-inline-block');
                    $('.exp_alert').addClass('d-none');
                    $('#tooltip_exp').addClass('d-none');
                    // $('label.start-quiz-item').css('border','2px solid #e7e7e7')
                    // $('.exp-number').css('border','2px solid #e7e7e7')
                    $('.exp-option-box').prop('checked',false)
                    $('.submit_answer').removeClass('d-none');
                    $('.js-btn-next').addClass('d-none');

                    // $('.checkmark').css('background','#eee')
                    // $('.checkmark').children().css('background','#eee')
                    $('.form-check-label').parent().css('border','1px solid #13172f10')


                }
                else{
                    window.location.replace("{{ url('thank_you') }}");
                }
            });
});



});
</script>
@endsection
