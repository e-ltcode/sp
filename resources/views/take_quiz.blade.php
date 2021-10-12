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
    .footer-section{
        margin-top: 0px !important;
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
    .footer-loader{
        position: absolute !important;
        width: 100% !important;
        bottom: 0px !important;
    }
</style>
<div class="showbox">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterLimit="10" />
        </svg>
    </div>
</div>
<div class="quiz-top-area text-center" style="padding: 5px 0px;background-color:#9d43ac">
    <h1 style="color: white;">{{ $quiz['quiz_title'] }}</h1>
</div>
<form action="{{ url('marketplace') }}" method="get">
    <div class="response">
        <div class="wizard-forms clearfix position-relative" style="background-image: url({{ asset('assets/images/qbg.jpg') }});background-size: cover;background-repeat: no-repeat;">
            <div class="quiz-title text-center" style="margin: 0 auto;max-width: 800px; text-align: center!important;">
                <span id="question_title" style="color: #151515;font-size: 24px;font-weight: 500;">{{ $quiz['questions'][0]['title'] }}
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
                        <label class="start-quiz-item adjust" @if($quiz['questions'][0]['answers'][0]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][0]['id'] }}" class="exp-option-box answer_input">
                                    <span class="exp-number text-uppercase">A</span>
                                </div>
                                <div class="col-9  mt-set">
                                    <span class="exp-label answer_title">{{ $quiz['questions'][0]['answers'][0]['title'] }}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust" @if($quiz['questions'][0]['answers'][1]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][1]['id'] }}" class="exp-option-box answer_input1">
                                    <span class="exp-number text-uppercase">B</span>
                                </div>
                                <div class="col-9 mt-set">
                                    <span class="exp-label answer_title1">{{ $quiz['questions'][0]['answers'][1]['title'] }}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust" @if($quiz['questions'][0]['answers'][2]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][2]['id'] }}" class="exp-option-box answer_input2">
                                    <span class="exp-number text-uppercase">C</span>
                                </div>
                                <div class="col-9 mt-set">
                                    <span class="exp-label answer_title2">{{ $quiz['questions'][0]['answers'][2]['title'] }}</span>
                                    <span class="checkmark-border"></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="col-md-6 col-12 py-3" style="box-sizing: border-box;">
                        <label class="start-quiz-item adjust" @if($quiz['questions'][0]['answers'][3]['is_correct'] == 1) data-correct="true" @else data-correct="false" @endif style="box-sizing: border-box;">
                            <div class="row align-items-center">
                                <div class="col-3 mt-set">
                                    <input id="" type="radio" name="quiz[]" data-correct="{{ $quiz['questions'][0]['answers'][2]['is_correct'] }}" value="{{ $quiz['questions'][0]['answers'][3]['id'] }}" class="exp-option-box answer_input3">
                                    <span class="exp-number text-uppercase">D</span>
                                </div>
                                <div class="col-9  mt-set">
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
</form>
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
                    $('label.start-quiz-item').css('border','2px solid #e7e7e7')
                    $('.exp-number').css('border','2px solid #e7e7e7')
                    $('.exp-option-box').prop('checked',false)
                }
                else{
                    window.location.replace("{{ url('thank_you') }}");
                }
            });
        });
    });
</script>
@endsection
