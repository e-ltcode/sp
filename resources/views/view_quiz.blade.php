@extends('layouts.header')
@section('content')

<style type="text/css">
	.bold{
		font-weight: bold;
	}

</style>

<div class="container mt-5">

	<h3 class="text-center mb-4">{{ $quiz['quiz_title'] }}</h3>
	
	@foreach($quiz['questions'] as $key => $val)
	<div class="card my-3">
		<div class="card-header ck-content">
			{!! $val['title'] !!}

			{{-- <i type="button" class="fa fa-question-circle" data-toggle="tooltip" data-html="true" data-placement="right" title="{{ $val['answer_explaination'] }}">
			</i> --}}
		</div>
		<div class="card-body">
			@php
			$option = 'A';
			@endphp
			@foreach($val['answers'] as $k => $v)
			<div class="row">
				<div class="col-md-6">
					{{ $option++ }} ) <span class="{{ $v['is_correct'] == 1 ? 'bold' : ''  }}"> {{ $v['title'] }}  </span> 
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endforeach
</div>
@endsection
