<script>
    $(document).ready(function() {

        var svg =
            "<svg class='question__dots' xmlns='http://www.w3.org/2000/svg' width='54' height='14' viewBox='0 0 54 14'>" +
            "<g fill='none' fill-rule='evenodd' transform='translate(1 1)'>" +
            "<circle cx='6' cy='6' r='6' fill='#FF5F56' stroke='#E0443E' stroke-width='.5'>" +
            "</circle>" +
            "<circle cx='26' cy='6' r='6' fill='#FFBD2E' stroke='#DEA123' stroke-width='.5'>" +
            "</circle>" +
            "<circle cx='46' cy='6' r='6' fill='#27C93F' stroke='#1AAB29' stroke-width='.5'>" +
            "</circle>" +
            "</g>" +
            "</svg>";
        var codeTagExist = $('pre').find('code').length;
        if (0 != codeTagExist) {
            $('pre').css("background-color", "");
            $('pre').css('background-color', '#585858');
            $("code").before(svg);
        } else {
            $('#question_title').removeClass('ck-content');
        }

    });
</script>
<script type="text/javascript">
    var ans = "";
    //doc start
    $(document).ready(function() {
        $('.brd-1[data-index="-1"]').addClass('d-none');
        $('.brd-1[data-index="0"]').addClass('d-block');

        $('.input_radio').on('click', function() {
            ans = $(this).parent().attr('data-correct');
            // console.log(ans);
            $('.cls_button').click(function() {
                $('.alert').removeClass('d-block');
            })
        });
        $('.form-check-label').click(function() {

            $('.checkmark').attr('data-check', 1);
            // console.log($('.checkmark').attr('data-check'));
            if ($('.checkmark').attr('data-check') == 1) {
                // console.log('asd');
                $('.exp_alert').removeClass('d-block');

            }

        });

        $('.submit_answer').on('click', function() {
            // console.log('adasdsadasdasdasd');
            $('.form-check-label[data-correct="true"]').parent().addClass('border border-success');

            if ($('.checkmark').attr('data-check') != 1) {

                $('.explaination_answer').html("Please select an answer!");
                $('.form-check-label').parent().removeClass('border');
                $('.form-check-label').parent().removeClass('border-success');

            } else {

                $('.form-check-label[data-correct="true"]').parent().addClass('border border-success');
                $(".block").removeClass("d-none");
                $(".block").addClass("d-block");

            }

        });

        $('.next_button').on('click', function() {

            $quiz_id = $('.form-check-label').attr('quiz_id');
            $('.form-check-label').attr('quiz_id', eval(parseInt($quiz_id) + 1));

        });

        $('.previous_button').on('click', function() {
            $quiz_id = $('.form-check-label').attr('quiz_id');
            $('.form-check-label').attr('quiz_id', eval($quiz_id - 1));
            // console.log( $('.form-check-label').attr('quiz_id') );
        });



    });
    //doc end
    $(document).on('click', '.submit_answer', function() {
        // console.log('New value = '+ans);
        $('.exp_alert').removeClass('alert-info');

        if (ans === 'true') {
            // alert('true');
            $('.exp_alert').removeClass('alert-danger');
            $('.exp_alert').addClass('alert-success');

        } else {
            // alert('false');
            $('.exp_alert').removeClass('alert-success');
            $('.exp_alert').addClass('alert-danger');
        }

        if ($('.checkmark').attr('data-check') != 1) {
            // console.log('no asnwer');
            $('.submit_answer').removeClass('d-none');
            $('.next_button').addClass('d-none');

        } else {
            $('.next_button').removeClass('d-none');
        }
    });


    $(document).on('click', '.prev_next', function(e) {
        e.preventDefault();
        $('.checkmark').attr('data-check', 0);
        $('.showbox').css('display', 'block');
        $('form').css('display', 'none');
        $('.footer-section').addClass('footer-loader');
        $('.form-check-label[data-correct="true"]').parent().removeClass('border border-success');

        skip = $(this).attr('data-attribute');

        var json_data = {
            "question_id": $('.question_id').val(),
            "quiz_id": $('.quiz_id').val(),
            "ans_selected": $('input[name="quiz[]"]:checked').val(),
            "quiz_attempt_id": {{ $quiz_attempt_id }},
            "_token": "{{ csrf_token() }}",
            "skip": skip
        }
        $.ajax({
            url: "{{ url('take_quiz/' . $quiz_attempt_id) }}",
            type: "post",
            data: json_data,
            datatype: "html"
        }).done(function(data) {
            var result = JSON.parse(data);


            $('.brd-1').attr('data-index', result.skip);
            if (result.question.data !== null) {
                $('#question_title').html(result.question.data.title);
                $('.question_image').attr('src', '{{ url('storage/app/') }}' + '/' + result.question
                    .data.question_image);
                $('.get_ans_exp').val(result.question.data.answer_explaination);
                if (result.question.data.question_image === null) {
                    $('.question_image').css('display', 'none');
                }
                if (result.question.data.learn_more_url === null) {
                    $('.learn_more').html('');
                } else {
                    $('.learn_more a').attr('href', result.question.data.learn_more_url);
                }

                $('.answer_title').text(result.question.data.answers[0].title);
                $('.answer_title1').text(result.question.data.answers[1].title);
                $('.answer_title2').text(result.question.data.answers[2].title);
                $('.answer_title3').text(result.question.data.answers[3].title);

                $('.current_question').html(parseInt(skip) + 1);

                // $('#question_title').html('<pre><code">'+result.question.data.title+'</code></pre>');
                // hljs.highlightAll();
                if ($('.answer_title').html() === "") {
                    $('.label1').parent().attr('data-index', '-1');
                }
                if ($('.answer_title1').html() === "") {
                    $('.label2').parent().attr('data-index', '-1');
                }
                if ($('.answer_title2').html() === "") {
                    $('.label3').parent().attr('data-index', '-1');
                }
                if ($('.answer_title3').html() === "") {
                    $('.label4').parent().attr('data-index', '-1');
                }
                $('.brd-1[data-index="-1"]').removeClass('d-block').addClass('d-none');
                $('.brd-1[data-index!="-1"]').removeClass('d-none').addClass('d-block');

                if (result.question.data.answers[0].is_correct == 1) {
                    $('.label1').attr('data-correct', true);
                    $('.label2').attr('data-correct', false);
                    $('.label3').attr('data-correct', false);
                    $('.label4').attr('data-correct', false);
                } else if (result.question.data.answers[1].is_correct == 1) {
                    $('.label2').attr('data-correct', true);
                    $('.label1').attr('data-correct', false);
                    $('.label3').attr('data-correct', false);
                    $('.label4').attr('data-correct', false);

                } else if (result.question.data.answers[2].is_correct == 1) {
                    $('.label3').attr('data-correct', true);
                    $('.label1').attr('data-correct', false);
                    $('.label2').attr('data-correct', false);
                    $('.label4').attr('data-correct', false);

                } else if (result.question.data.answers[3].is_correct == 1) {
                    $('.label4').attr('data-correct', true);
                    $('.label1').attr('data-correct', false);
                    $('.label2').attr('data-correct', false);
                    $('.label3').attr('data-correct', false);

                }

                $('.layer_div').css('display', 'none');
                $('.previous_button').css('display', 'unset');

                $('.checkmark').css('background', 'rgb(238, 238, 238)');
                $('.answer_input').attr('value', result.question.data.answers[0].id);
                $('.answer_input1').attr('value', result.question.data.answers[1].id);
                $('.answer_input2').attr('value', result.question.data.answers[2].id);
                $('.answer_input3').attr('value', result.question.data.answers[3].id);
                $('.start-quiz-item').css('background', 'white');
                $('.start-quiz-item span').css('color', '#446d76');
                $('.question_id').val(result.question.data.id)
                $('#question_title').html(result.question.data.title);
                $('#tooltip_exp').attr('title', result.question.data.answer_explaination)
                $('#tooltip_exp').attr('data-original-title', result.question.data.answer_explaination)
                $('.js-btn-prev').attr('data-attribute', skip - 1);
                $('.js-btn-next').attr('data-attribute', +skip + 1);
                var percentage = Math.round(skip / result.count * 100);
                $('.progress-bar').css('width', percentage + '%');

                if ($('.form-check-label').attr('quiz_id') == 1) {
                    $('.previous_button').addClass('d-none');
                }
                if (skip == result.count - 1) {
                    $('.js-btn-next').html('Finish')
                }
                $('.block').removeClass('d-block');
                $('.block').addClass('d-none');
                $('.showbox').css('display', 'none');
                $('form').css('display', 'block');
                $('.footer-section').removeClass('footer-loader');
                $('.exp_alert').removeClass('d-block');
                $('#tooltip_exp').removeClass('d-inline-block');
                $('.exp_alert').addClass('d-none');
                $('#tooltip_exp').addClass('d-none');

                $('.exp-option-box').prop('checked', false)

                $('.submit_answer').removeClass('d-none');
                $('.js-btn-next').addClass('d-none');

                $('.form-check-label').parent().css('border', '1px solid #13172f10')
                $('pre').css('background-color', '#272822');
                var svg1 =
                    "<svg class='question__dots' xmlns='http://www.w3.org/2000/svg' width='54' height='14' viewBox='0 0 54 14'>" +
                    "<g fill='none' fill-rule='evenodd' transform='translate(1 1)'>" +
                    "<circle cx='6' cy='6' r='6' fill='#FF5F56' stroke='#E0443E' stroke-width='.5'>" +
                    "</circle>" +
                    "<circle cx='26' cy='6' r='6' fill='#FFBD2E' stroke='#DEA123' stroke-width='.5'>" +
                    "</circle>" +
                    "<circle cx='46' cy='6' r='6' fill='#27C93F' stroke='#1AAB29' stroke-width='.5'>" +
                    "</circle>" +
                    "</g>" +
                    "</svg>";
                var codeTagExist = $('pre').find('code').length;
                if (0 != codeTagExist) {
                    $('pre').css("background-color", "");
                    $('pre').css('background-color', '#585858');
                    $("code").before(svg1);
                } else {
                    $('#question_title').removeClass('ck-content');
                }
                $('pre > code').each(function() {
                    hljs.highlightBlock(this);
                });
            } else {
                window.location.replace("{{ url('submitted/'.$quiz_attempt_id) }}");
            }
        });
    });
</script>
