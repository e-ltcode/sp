@extends('layouts.admin_ample')

@section('content')
<div class="card-toolbar">
	<a href="javascript:void(0);" data-target="#data_modal" data-toggle="modal"
		onclick="loadModal('{{$module['action']}}/create')" class="fcbtn btn btn-info btn-outline btn-1c">New
		{{@$module['singular']}}</a>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="white-box">
			<h3 class="box-title">{{@$page_title}}</h3>
			<div class="scrollable">
				<div class="table-responsive">
					<table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list list" data-page-size="10"
						style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Quiz Image</th>
								<th>Quiz Title</th>
								<th>Category</th>
								<th>Quiz Description</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($list['data'])
							@php($i=1)
							@foreach($list['data'] as $key=>$val)
							<tr class="list_{{$val[$module['db_key']]}}">
								<td>{{$i++}}</td>
								<td><img src="{{ url('storage/app/public/'.$val['image']) }}"></td>
								<td>{{$val['quiz_title']}}</td>
								<td>{{@$val['category']['title']}}</td>
								<td>{{$val['quiz_description']}}</td>
								<td>{{$val['price']}}</td>
								<td style="">
									<div class="dropdown">
										<button class="btn btn-secondary dropdown-toggle" type="button"
											data-toggle="dropdown">Actions
											<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item delete" href="javascript:void(0);"
													data-url="{{ url($module['action'].'/delete/'.$val[$module['db_key']]) }}"
													data-remove="list_{{$val[$module['db_key']]}}"><i
														class="fa fa-trash"></i>Delete</a></li>
											<li><a class="dropdown-item" href="javascript:void(0);"
													data-target="#data_modal" data-toggle="modal"
													onclick="loadModal('{{$module['action']}}/edit','{{$val[$module['db_key']]}}')">
													<i class="fa fa-edit"></i> Edit
												</a></li>
											<li><a class="dropdown-item" href="javascript:void(0);"
													data-target="#data_modal" data-toggle="modal"
													onclick="loadModal('{{$module['action']}}/import','{{$val[$module['db_key']]}}')">
													<i class="fa fa-edit"></i> Import
												</a></li>
											<li><a class="dropdown-item"
													href="{{ url('admin/questions/'.$val[$module['db_key']]) }}"><i
														class="fa fa-eye"></i> Questions</a> </li>
										</ul>
									</div>
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
</div>
@endsection