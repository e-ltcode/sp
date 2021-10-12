@extends('layouts.header')
@section('content')

<style type="text/css">
	.quiz-option-selector {
		margin: 0 auto;
		max-width: 1135px;
		padding-top: 40px;
		padding-bottom: 80px;
	}
	.footer-section{
		margin-top: 0px !important;
	}
	.thankyou-msg p {
		font-size: 20px;
		padding: 25px 0px 20px;
	}
	.thankyou-msg h2 {
		margin: 0 auto;
		font-size: 70px;
		max-width: 565px;
		margin-bottom: 40px;
		font-weight: 700;
	}
	.wizard-forms2{
		padding:90px;
		min-height: calc(100vh - 175px);
	}
	h1, h2, h3, h4, h5, h6 {
		margin: 0;
		text-transform: initial;
		font-family: "Jost", sans-serif;
	}
	.quiz-top-area {
		padding: 10px 0px;
		background-color: #9d43ac;
	}
	.quiz-top-area h1 {
		color: #fff;
		font-size: 25px;
	}
	@media screen and (max-width: 700px){
		.thankyou-msg h2{
			font-size: 50px;
		}
		.wizard-forms2{
			padding: 90px 10px;
		}
	}
	@media screen and (max-width: 450px){
		.thankyou-msg h2{
			font-size: 30px;
		}
		.wizard-forms2{
			padding: 90px 10px;
		}
		.thankyou-msg p{
			font-size: 17px;
		}
	}
</style>

<div class="quiz-top-area text-center">
	<h1>Thanks For Quiz</h1>
</div>

<div class="wizard-forms2" style="background-image: url({{ asset('assets/images/qbg.jpg') }});">
	<div class="quiz-option-selector">
		<div class="thankyou-msg text-center">
			<img src="{{ asset('assets/images/th.png') }}" alt="">
			<p>Your submission has been received</p>
			<h2>Thank you for Taking Quiz!</h2>
			<a href="{{ url('/quiz_attempts') }}">Check Out My Quizzes -></a>
		</div>
	</div>
</div>

@endsection