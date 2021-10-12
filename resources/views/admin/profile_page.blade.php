@extends('layouts.admin_ample')
@section('content')
<style type="text/css">
  /*.footer-section {
    margin-top: 100px;
    position: absolute;
    width: 100%;
    bottom: 0px;
}*/
</style>
<section>
  <div class="rt-container">
    <div class="col-rt-12">
      <div class="Scriptcontent">

        <!-- Student Profile -->
        <div class="student-profile py-5 mt-5">
          <div class="container">
            <div class="pofile_heading text-center mb-5">
              <h3>My Profile</h3>
            </div>
            <div class="row bg-white">
              {{-- <div class="col-lg-4">
                <div class="card shadow-sm">
                  <div class="card-header bg-transparent text-center">
                    <img class="profile_img" src="https://source.unsplash.com/600x300/?man" alt="student dp">
                    <h3>{{ Auth::user()->name }}</h3>
                  </div>
                </div>
              </div> --}}

              <div class="col-lg-12 ">
                <div class="card shadow-sm mb-5">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0 text-dark">General Information</h3>
                  </div>
                  <div class="card-body pt-0">
                    
                    <a class="btn btn-primary" style="margin-bottom: 7px;" href="javascript:void(0);" data-target="#data_modal" data-toggle="modal" onclick="loadModal('/admin/edit_login_details','{{Auth::user()->id}}')" >
                          <i class="fa fa-edit"></i> Edit
                        </a>
                    <table class="table table-bordered">
                      <tr>
                        <th width="30%">Name</th>
                        <td width="2%">:</td>
                        <td>{{ Auth::user()->name }}</td>
                      </tr>
                      <tr>
                        <th width="30%">Email</th>
                        <td width="2%">:</td>
                        <td>{{ Auth::user()->email }}</td>
                      </tr>
                      <tr>
                        <th width="30%">Quiz Attempts</th>
                        <td width="2%">:</td>
                        <td>{{ Auth::user()->quiz_attempts()->count() }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div style="height: 26px"></div>
                {{-- <div class="card shadow-sm">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                  </div>  
                  <div class="card-body pt-0">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        <!-- partial -->

      </div>
    </div>
  </div>
</section>
@endsection