@extends('layouts.admin_ample')

@section('content')
<div class="card-toolbar">
	<!--begin::Button-->
	<a href="javascript:void(0);" data-target="#data_modal" data-toggle="modal" onclick="loadModal('{{$module['action']}}/create')" class="fcbtn btn btn-info btn-outline btn-1c">New {{@$module['singular']}}</a>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="box-title">{{@$page_title}}</h3>
			<div class="scrollable">
				<div class="table-responsive">
					<table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list list" data-page-size="10" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>User ID</th>
								<th>Amount</th>
								<th>Discount</th>
								<th>Payment Type</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if($list['data'])
							@php($i=1)
							@foreach($list['data'] as $key=>$val)
							<tr class="list_{{$val[$module['db_key']]}}">
								<td>{{$i++}}</td>
								<td>{{$val['user_id']}}</td>
								<td>{{$val['amount']}}</td>
								<td>{{$val['discount']}}</td>
								<td>{{$val['payment_type']}}</td>
								<td style="">
									<a class="dropdown-item delete"  href="javascript:void(0);" data-url="{{ url($module['action'].'/delete/'.$val[$module['db_key']]) }}" data-remove="list_{{$val[$module['db_key']]}}" style="display: inline;"><i class="fa fa-trash"></i> Delete</a> | 
									<a href="javascript:void(0);" data-target="#data_modal" data-toggle="modal" onclick="loadModal('{{$module['action']}}/edit','{{$val[$module['db_key']]}}')" style="display: inline;">
										<i class="fa fa-edit"></i> Edit
									</a>
								</td>
							</tr>

							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- end data table  -->
	<!-- ============================================================== -->
</div>
@endsection

@section('admin_scripts')

<script src="{{ asset('/assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('/assets/libs/js/main-js.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/datatables/js/data-table.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/buttons.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/select.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
@endsection