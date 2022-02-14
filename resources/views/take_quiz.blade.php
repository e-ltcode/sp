@extends('layouts.header')

@section('content')

<div class="container mt-5 parent_div_take_quiz">
    <div class="row" style="max-width: 700px;margin: 0px auto">
        <div class="col-md-12 nn-0 main_take_quiz">
            <div class="card w-100 py-5 take_quiz_card">
                <div class="d-flex" style="align-items: center; justify-content: center; ">
                    <div class="progress ds-0">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                </div>
                <div class="card-body mt-4 tns-1">
                    <div class="text-center" style="border-bottom: 1px solid #e9e6e6;padding-bottom: 10px;">
                        @if ($quiz['questions'][0]['question_image'])
                        <img class="card-img-top text-center question_image"
                            style="width: 90%; max-height:300px; object-fit:cover;"
                            src="{{ url('storage/app/public' . '/' . $quiz['questions'][0]['question_image']) }}"
                            alt="Card image cap">
                        @endif
                    </div>

                    <div style="display: inline-flex; position: absolute;right: 30px" class="learn_more_div">
                        <div class="learn_more mb-2" style="margin-top: 18px; margin-left: 3px;">
                            @if ($quiz['questions'][0]['learn_more_url'])
                            <a href="{{ $quiz['questions'][0]['learn_more_url'] }}" target="_blank"
                                style="color: #9d43ac" class=""><b>Learn More</b></a>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="card-title mt-3 pl-3 text-left ck-content " style="width: 100%;;"
                            id="question_title">
                            {!! $quiz['questions'][0]['title'] !!}
                        </span>
                    </div>

                    <input type="hidden" name="" value="{{ $quiz['questions'][0]['answer_explaination'] }}"
                        class="get_ans_exp">

                    <div class="alert mt-2 d-none alert-info text-center exp_alert alert-dismissible fade show"
                        style="width: 65%;margin: 0px auto;" role="alert">
                        <strong>Explanation:</strong>
                        <span class="explaination_answer"></span>
                        <button type="button" class="close cls_button" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ url('marketplace') }}" method="get">
                        <input type="hidden" class="question_id" value="{{ $quiz['questions'][0]['id'] }}">
                        <input type="hidden" class="quiz_id" value="{{ $quiz['id'] }}">

                        <input type="text" class="block brd-1 my-1 w-100 mb-3 d-none"
                            style="border:none; background-color: #f9f9f9 0; position:absolute; bottom:50px; height:250px; z-index: 1;" disabled>
                        <div class="text-1 mt-4 pl-3">
                            <div class="brd-1 my-1" @if ($quiz['questions'][0]['answers'][0]['title']==null)
                                data-index="-1" @else data-index="0" @endif>
                                <label class="form-check-label py-3 ml-3 checkbox-container label1"
                                    @if($quiz['questions'][0]['answers'][0]['is_correct']==1) data-correct="true" @else
                                    data-correct="false" @endif quiz_id="1" for="exampleRadios1"
                                    style="font-size: 15px;">
                                    <span class="answer_title">{!! $quiz['questions'][0]['answers'][0]['title']
                                        !!}</span>
                                    <input type="radio" id="exampleRadios1" class="answer_input input_radio"
                                        name="quiz[]" value="{{ $quiz['questions'][0]['answers'][0]['id'] }}" required>
                                    <span class="checkmark" data-check="0"></span>
                                </label>
                            </div>

                            <div class="brd-1 my-1" @if ($quiz['questions'][0]['answers'][1]['title']==null)
                                data-index="-1" @else data-index="0" @endif>
                                <label class="form-check-label py-3 ml-3 checkbox-container label2"
                                    @if($quiz['questions'][0]['answers'][1]['is_correct']==1) data-correct="true" @else
                                    data-correct="false" @endif quiz_id="1" for="exampleRadios2"
                                    style="font-size: 15px;">
                                    <span class="answer_title1">{!! $quiz['questions'][0]['answers'][1]['title']
                                        !!}</span>
                                    <input type="radio" id="exampleRadios2" class="answer_input1 input_radio"
                                        name="quiz[]" value="{{ $quiz['questions'][0]['answers'][1]['id'] }}" required>
                                    <span class="checkmark" data-check="0"></span>
                                </label>
                            </div>

                            <div class="brd-1 my-1" @if ($quiz['questions'][0]['answers'][2]['title']==null)
                                data-index="-1" @else data-index="0" @endif>
                                <label class="form-check-label py-3 ml-3 checkbox-container label3"
                                    @if($quiz['questions'][0]['answers'][2]['is_correct']==1) data-correct="true" @else
                                    data-correct="false" @endif quiz_id="1" for="exampleRadios3"
                                    style="font-size: 15px;">
                                    <span class="answer_title2">{!! $quiz['questions'][0]['answers'][2]['title']
                                        !!}</span>
                                    <input type="radio" id="exampleRadios3" class="answer_input2 input_radio"
                                        name="quiz[]" value="{{ $quiz['questions'][0]['answers'][2]['id'] }}" required>
                                    <span class="checkmark" data-check="0"></span>
                                </label>
                            </div>

                            <div class="brd-1 my-1" @if ($quiz['questions'][0]['answers'][3]['title']==null)
                                data-index="-1" @else data-index="0" @endif>
                                <label class="form-check-label py-3 ml-3 checkbox-container label4"
                                    @if($quiz['questions'][0]['answers'][3]['is_correct']==1) data-correct="true" @else
                                    data-correct="false" @endif quiz_id="1" for="exampleRadios4"
                                    style="font-size: 15px;">
                                    <span class="answer_title3">{{$quiz['questions'][0]['answers'][3]['title']
                                        }}</span>
                                    <input type="radio" id="exampleRadios4" class="answer_input3 input_radio"
                                        name="quiz[]" value="{{ $quiz['questions'][0]['answers'][3]['id'] }}" required>
                                    <span class="checkmark" data-check="0"></span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row action_btn mb-3">
                <div class="col-8 mt-3">

                    <button class="btn button-1 prev_next js-btn-prev previous_button mb-2" data-attribute="0"
                        type="button">
                        Previous
                    </button>

                    <a href="{{ url('') }}" class="btn btn-primary mb-2"
                        style="background-color: #469acd; border-color: #469acd;">Go Home</a>

                </div>

                <div class="col-4 mt-3 ds-1 next_submit">

                    <button class="btn nn-2 prev_next js-btn-next next_button" data-attribute="1" type="button">
                        Next
                    </button>

                    <button class="btn nn-2 submit_answer" data-attribute="1" type="button">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/take_quiz.css') }}">
@endsection

@section('scripts')

@include('take_quizjs')

@endsection
