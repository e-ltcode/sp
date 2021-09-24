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
                            <tr class="text-uppercase">
                                <th scope="col">#</th>
                                <th class="pl-0" style="min-width: 137px">Name</th>
                                <th class="pl-0" style="min-width: 137px">Email</th>
                                <th class="pl-0" style="min-width: 137px">Phone</th>
                                <th class="pl-0" style="min-width: 137px">Role</th>
                                {{-- <th class="pl-0" style="min-width: 100px">Date Added</th> --}}
                                @if(\Auth::user()->role==1)
                                <th class="pr-0 text-right" style="min-width: 100px">action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($list['data']) && sizeof($list['data'])>0)
                            @foreach($list['data'] as $key => $val)
                            <tr class="list_{{$val[$module['db_key']]}}">
                                <th scope="row">{{++$key}}</th>
                                <td class="pl-0">
                                    <a href="#" class="text-dark-75  text-hover-primary font-size-lg">{{$val['name']}}</a>
                                </td>
                                <td class="pl-0">{{@$val['email']}}</td>
                                <td class="pl-0">{{@$val['phone']}}</td>
                                <td class="pl-0">
                                    @foreach(config('constants.role') as $key => $role)
                                    @if($key == $val['role']) 
                                    {{@$role}}
                                    @endif
                                    @endforeach
                                </td>
                                {{-- <td class="pl-0">{{date('Y-m-d',strtotime($val['created_at']))}}</td> --}}
                                <td class="pr-0 text-right">
                                    <a class="dropdown-item delete"  href="javascript:void(0);" data-url="{{ url($module['action']).'/delete/'.$val[$module['db_key']] }}" data-remove="list_{{$val[$module['db_key']]}}" style="display: inline;"><i class="fa fa-trash"></i> Delete
                                    </a> | 
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
                <!--end::Table-->
            </div>
        </div>
    </div>
</div>
@endsection