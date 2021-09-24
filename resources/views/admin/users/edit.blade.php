@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">{{@$page_title}}</h3>
                </div>
                <form class="form container-fluid make_ajax" method="post" action="{{$action}}" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type='text' name="name" id="name" class="form-control" required="" value="{{@$row['name']}}" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type='email' name="email" id="email" class="form-control" required=""  value="{{@$row['email']}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Phone</label>
                                    <input type='text' name="phone" id="phone" class="form-control" value="{{@$row['phone']}}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type='password' name="password" id="password" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date" class="control-label">Birth Date</label>
                                    <input type='text' name="birth_date" id="birth_date" class="form-control" value="{{@$row['birth_date']}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="control-label">Role</label>
                                    <select name="role" id="role" class="form-control" required="">
                                        <option selected="" disabled="">Select Role</option>
                                        <option value="20" {{(@$row['role'] == 20)? "selected": ""}}>Student</option>
                                        <option value="1" {{(@$row['role'] == 1)? "selected": ""}}>Admin</option>
                                    </select>
                                    {{-- <input type='number' name="student_number" id="student_number" class="form-control"value="{{@$row['student_number']}}" /> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_number" class="control-label">Student Status</label>
                                    <select name="status" class="form-control">
                                        <option value="" disabled="" selected="">Select Student Status</option>
                                        <option value="1" 
                                        @if($row['status'] == '1')
                                        
                                        {{$selected = "selected"}} 
                                        
                                        {{$selected}}
                                        @endif 
                                        >Active</option>
                                        <option value="2" 
                                        @if($row['status'] == '2')
                                        {{$selected = "selected"}}
                                        {{$selected}}
                                        @endif
                                        value="2">Gratuated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_number" class="control-label">Student ID</label>
                                    <input type='text' name="student_number" id="student_number" class="form-control" value="{{@$row['student_number']}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_number" class="control-label">Type of education</label>
                                    <select class=" form-control" name="degree_type" required="">
    								    <option value="" >Select</option>
    								    <option value="Doctorate" <?= ($row['degree_type'] == "Associate")? 'selected' : '' ?> >Associate</option>
    									<option value="Undergraduate" <?= ($row['degree_type'] == "Undergraduate")? 'selected' : '' ?> >Undergraduate</option>
    									<option value="Postgraduate" <?= ($row['degree_type'] == "Postgraduate")? 'selected' : '' ?> >Postgraduate</option>
    									<option value="Postgraduate" <?= ($row['degree_type'] == "Doctorate")? 'selected' : '' ?> >Doctorate</option>
    								</select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile_image" class="control-label">Profile Picture</label>
                                    <input type='file' name="profile_image" id="profile_image" class="form-control" value="{{@$row['profile_image']}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="degree_pic" class="control-label">Degree Picture</label>
                                    <input type='file' name="degree_pic[]" id="degree_pic" class="form-control" value="{{@$row['degree_pic']}}" multiple />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transcript_pic" class="control-label">Transcript Picture</label>
                                    <input type='file' name="transcript_pic[]" id="transcript_pic" class="form-control" value="{{@$row['transcript_pic']}}" multiple />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="transcript_pic" class="control-label">Degree Picture</label> --}}
                                    @foreach(@explode(",",@$row['degree_pic']) as $key => $value)
                                    <?php $parts = explode(".",$value)[count(explode(".",$value))-1]; ?>
            						@if(trim($parts) == 'pdf' || $parts == 'PDF')
            						<img src="{{asset('assets/pdf.png')}}" width="100px" height="100px">
            						@else
                                    <img src="{{asset('assets/studentsdegrees/'.@$value)}}"  height="100px" width="100px" />
                                    @endif()
                                    @endforeach()
                                    {{-- <img src="{{asset('assets/fe-assets/images/thispersondoesnotexist.jpg')}}" class="w-100"> --}}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @foreach(@explode(",",@$row['transcript_pic']) as $key => $value)
                                    <?php $parts = explode(".",$value)[count(explode(".",$value))-1]; ?>
            						@if(trim($parts) == 'pdf' || $parts == 'PDF')
            						<img src="{{asset('assets/pdf.png')}}" width="100px" height="100px">
            						@else
                                        <img src="{{asset('assets/studentstranscripts/'.@$value)}}" height="100px" width="100px" />
                                    @endif()
                                    @endforeach()
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="is_featured" class="control-label">Available Courses</label>
                                <div class="row">
                                    @if(!empty($courses))
                                    @foreach($courses as $key => $course)
                                    <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label for="c_id_{{$course['c_id']}}">
                                                <input type='checkbox' name="c_id[]" value="{{$course['c_id']}}" id="c_id_{{$course['c_id']}}" <?= (in_array($course['c_id'], $courses_ids))?'checked':''; ?> class="" />
                                                {{$course['c_name']}}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach()
                                    @endif()
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a  class="btn btn-secondary" href="{{url($module['action'])}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('footer')

<script type="text/javascript">
    $(document).ready(function(){
        // FOR COLORS ADDITION AND DELETION
        $(document).on('change','.checked-all',function(){            
            let selectedColorType = $(this).val();
            $('.colors_'+selectedColorType).attr('checked',this.checked);
        });
        
        // FOR SIZE ADDITION AND DELETION
        let prosizehtm = $('.productsize').html();
        var sizeArray = [];
        @if(!empty($row['sizes']))
        @foreach($row['sizes'] as $v)
        sizeArray.push('{{$v['size_id']}}');
        @endforeach
        @endif
        $(document).on('change','#prosize',function(){
            let vlue = $(this).val();            
            if(sizeArray.length>0){
                let check = sizeArray.filter(item=>item===vlue);
                if(check.length>0){
                    return false;
                }
            }
            $('.sizeacc').find('.accsizediv').each((item,index)=>{
                let accValue = $(index).find('input:checkbox').val();
                let actualvalu = accValue.split('-');
                let newValue = `${actualvalu[0]}-${vlue}`;
                $(index).find('input:checkbox').prop('value',newValue);
                // $(index).append(`<input type="text" value="${vlue}" name="acc_size[${vlue}]"/>`);
            });
            let accesizes = $('.sizeacc').html();
            var element = $("option:selected", this);
            var text = element.attr("data-lable");
            var name = element.attr("data-name");
            var sizehtml = `<div class="col-md-3">
            <div class="card card-custom card-stretch gutter-b">
            <div class="card-header border-0 py-2">
            <h5 class="card-title font-weight-bolder text-dark w-100 py-0" style="width: 100%;background-color: #ced0d6 !important">Size ${text}</h5>
            </div>
            <div class="card-body">
            <input type="hidden" value="${vlue}" name="sizes[]">
            <div class="row">
            <div class="col-sm-4"><strong>Code </strong></div>
            <div class="col-sm-8">
            <input type="text" name="code[]" class="w-100">
            </div>
            </div>
            <div class="row my-3">
            <div class="col-sm-4"><strong>Price </strong></div>
            <div class="col-sm-8">
            <input type="text" name="price[]" class="w-100">
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4"><strong>Commission </strong></div>
            <div class="col-sm-8">
            <input type="text" name="commission[]" class="w-100">
            </div>
            </div>
            </div>
            </div>
            </div>`
            let row = `<span class="ua-parent" data-size='${vlue}'> <p class='ua-cross text-right mb-0 mt-2'><i class="fa fa-times-circle" aria-hidden="true"></i></p> <div class="row pb-5 border-bottom">${sizehtml}${prosizehtm}${accesizes}</div></span>`;
            $('.sizetablebody').append(row);
            sizeArray.push(vlue);
            sortTable();
            sizeArray.push(vlue);
        });

        $(document).on('click','#deletesize',function(){
            $(this).closest('tr').remove();
        });

        $(document).on('click','.ua-cross',function(){
            var removeElement = $(this).closest('.ua-parent');
            var size= removeElement.attr('data-size');
            console.log('sleect esize',size);
            sizeArray.pop(size);
            removeElement.remove();

            for( var i = 0; i < sizeArray.length; i++){ 

                if ( sizeArray[i] ===  size) { 

                   sizeArray.splice(i, 1); 
               }

           }
       });
    });
    function sortTable(){
        var tbody = $('.sizetablebody');
        var rows = tbody.find('tr');
        rows.sort(function(a, b) {
            var keyA = $(a).attr('data-name');
            var keyB = $(b).attr('data-name');
            return keyA - keyB;
        });
        $.each(rows, function(index, row) {
            tbody.append(row);
        });
    }
    sortTable();
</script>
<script type="text/javascript">
    $( function() {
        $( "#birth_date" ).datepicker({
  dateFormat: "yy-mm-dd"
});
    });
</script>