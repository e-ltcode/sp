// var checked_val = 0;

$(function() {  
    $('.quiz-option-selector ul li').click(function(){
    	let count = $('.exp-option-box:checked').length
    	if(count>0){

    	}
    	else{
    		// console.log($('.exp-option-box:checked').val())
    		// checked_val = $('.exp-option-box:checked').val()
    		// $('.exp-option-box').attr('disabled','true')
    					
    		if($(this).find('label.start-quiz-item').data('correct') == true){
    			$(this).find('label.start-quiz-item').css('border','3px solid lightgreen')
    			$(this).find('.exp-number').css('border','3px solid lightgreen');


        		$('.explaination_answer').html('Your answer is Correct');

    		}
    		else{
    			$(this).find('label.start-quiz-item').css('border','3px solid red')
    			$(this).find('.exp-number').css('border','3px solid red');
    			let label = $('label.start-quiz-item[data-correct=true]')
    			label.css('border','3px solid lightgreen')
    			label.find('.exp-number').css('border','3px solid lightgreen')
        		$('.explaination_answer').html('Your answer is Incorrect');
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

