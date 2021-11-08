@extends('layouts.header')

@section('content')

<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');

	body {
		font-family: 'Manrope', sans-serif;
		background: #eee
	}

	.size span {
		font-size: 11px
	}

	.color span {
		font-size: 11px
	}

	.product-deta {
		margin-right: 70px
	}

	.gift-card:focus {
		box-shadow: none
	}

	.pay-button {
		color: #fff
	}

	.pay-button:hover {
		color: #fff
	}

	.pay-button:focus {
		color: #fff;
		box-shadow: none
	}

	.text-grey {
		color: #a39f9f
	}

	.qty i {
		font-size: 11px
	}
	.btn-warning{
		background-color: #9d43ac !important;
		border-color: #9d43ac !important;
	}
	.btn-marketplace{
		background-color: #9d43ac;
		color: #fff;
	}
	.btn-marketplace:hover{
		color: #fff;
	}
</style>




<div class="container mt-5 mb-5" style="min-height: calc(100vh - 400px);">
	<div class="d-flex justify-content-center row">
		<div class="col-md-8 list">
			<div class="p-2">
				<h4>Shopping cart</h4>
			</div>
			@if(!empty($list['data']))
			@foreach($list['data'] as $key=>$val)
			<div class="d-flex list_{{$val[$module['db_key']]}} flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
				<div class="mr-1"><img class="rounded" src="{{ url('storage/app/public/'.$val['quiz']['image']) }}" width="70"></div>
				<div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{$val['quiz']['quiz_title']}}</span>

				</div>

				<div>
					<h5 class="text-grey">${{ $val['price'] }}</h5>
				</div>
				<div class="d-flex align-items-center"><a class="dropdown-item delete1"  href="javascript:void(0);" data-url="{{ url($module['action'].'/delete/'.$val[$module['db_key']]) }}" data-remove="list_{{$val[$module['db_key']]}}" style="display: inline;"><i class="fa fa-trash mb-1 text-danger"></i></a></div>
			</div>
			@endforeach
			
			<div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
				<div class="d-flex flex-row align-items-center qty">
					<h5 class="text-black mt-1 mr-1 ml-1">Total: </h5>
				</div>
				<div>
					<h5 class="text-grey">${{ collect($total)->flatten()->sum() }}</h5>
				</div>
			</div>
			<div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><a href="{{  url('checkout') }}" class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</a></div>
			@else
			<div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
				<div class="d-flex flex-row align-items-center text-center">
					<h5 class="text-center mr-1 ml-1">Your cart is empty</h5>					
				</div>
			</div>
			<a href="{{ url('marketplace') }}" class="btn btn-marketplace mt-5">Go to Marketplace</a>
			@endif
		</div>
	</div>
</div>

@endsection

@section('admin_scripts')
{{-- <script src="{{ asset('js/global-script.js') }}"></script> --}}
{{-- <script src="{{asset('ample/js/footable-init.js')}}"></script> --}}

@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/select.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">




@endsection

@section('scripts')
<script type="text/javascript">
	$(document).on("click", ".list .delete1", function (event) {
		var remvove = $(this).attr("data-remove");
		var attr = $(this).attr("data-action");
    //confirm("Do you want to delete");
    //addWaitWithoutText(this);
    $.ajax({
    	type: "GET",
    	cache: false,
    	url: $(this).attr("data-url"),
    	dataType: "json",
    	headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    	success: function (res) {
    			window.location.reload();
    		if (res.flag == true) {
    			toastr["success"](res.msg, "Completed!");
    			if (res.action == "reload") {
    				window.location.reload();
    			} else {
    				$("." + remvove).remove();
    			}
    		}
    	},
    });
});

</script>
@endsection

