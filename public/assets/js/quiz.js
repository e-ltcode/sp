$(document).on('click', '.form-check-label', function() {
    // $('.checkmark').closest().css('background', '#eee');
    $('.checkmark').css('background', '#eee');
    $(this).children().eq(2).css('background', '#1e73be');
    // $(this).parent().css('border', '2px solid blue');
    $('.input_radio').parent().closest('div').css('border', '1px solid #13172f10');
    $('.input_radio:checked').parent().closest('div').css('border', '2px solid #1e73be');
    // console.log(result.question.data);
    var get_ans_exp = $('.get_ans_exp').val();
    if ($(this).attr('data-correct') == 'true') {

        $('.explaination_answer').html('True!' + get_ans_exp)
    } else if ($(this).attr('data-correct') == 'false') {

        $('.explaination_answer').html('False!' + get_ans_exp)
    }
    $('.answer_input').val() == $('.old_input:checked').val();
    $('.old_input').attr('disabled', 'true');
    var val = $(this).children().eq(1).val();
    // console.log(val)
    $(this).addClass('get_answer')
    $(this).children().eq(2).val(val);
    var ans_selected = $(this).children().eq(2).val(val)

    $('.next_button').css('display', 'unset');
})
$('.js-btn-next').addClass('d-none');
$(document).on('click', '.submit_answer', function() {

    $('.layer_div').css('display', 'block');
    $('.layer_div').css('height', $('.text-1').height());
    $('.exp_alert').addClass('d-block');
    $('.js-btn-next').removeClass('d-none');
    $('.submit_answer').addClass('d-none');

});
// $(window).scroll(function() {    
//     var scroll = $(window).scrollTop();

//      //>=, not <=
//     if (scroll >= 100) {
//         //clearHeader, not clearheader - caps H
//         $(".open-menu").css("margin-top","0px");
//         $(".sidebar").css("position","sticky");
//     }else{
//         $(".open-menu").css("margin-top","100px");
//         $(".sidebar").css("position","absolute");

//     }
// }); 

$(function() {
    $('.quiz-option-selector ul li').click(function() {
        let count = $('.exp-option-box:checked').length
        if (count > 0) {

        } else {
            // console.log($('.exp-option-box:checked').val())
            // checked_val = $('.exp-option-box:checked').val()
            // $('.exp-option-box').attr('disabled','true')

            if ($(this).find('label.start-quiz-item').data('correct') == true) {
                $(this).find('label.start-quiz-item').css('border', '3px solid lightgreen')
                $(this).find('.exp-number').css('border', '3px solid lightgreen');


                $('.explaination_answer').html('True');

            } else {
                $(this).find('label.start-quiz-item').css('border', '3px solid red')
                $(this).find('.exp-number').css('border', '3px solid red');
                let label = $('label.start-quiz-item[data-correct=true]')
                label.css('border', '3px solid lightgreen')
                label.find('.exp-number').css('border', '3px solid lightgreen')
                $('.explaination_answer').html('False');
            }
            // $('.quiz-option-selector ul li label').css('background','white');
            $('.exp_alert').addClass('d-block');
            $('#tooltip_exp').addClass('d-inline-block');
            $('#tooltip_exp').removeClass('d-none');
            // $('.quiz-option-selector ul li label .exp-label').css('color','#446d76');
            // $(this).children('label').css('background','#9d43ac');
            // $('.exp-option-box').prop('disabled','true')

        }
    });
});