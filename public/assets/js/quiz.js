$(function() {  
    $('.quiz-option-selector ul li').click(function(){
        $('.quiz-option-selector ul li label').css('background','white');
        $('.quiz-option-selector ul li label .exp-label').css('color','#446d76');
        $(this).children('label').css('background','#9d43ac');
        $(this).find('.exp-label').css('color','white');
});
});

