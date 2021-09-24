@extends('layouts.header')

@section('content')

<div class="row-sm-12 search">
 <form class="example container" >
  <input class="otln" type="text" placeholder="Enter Search Term.." name="search">
</form>
</div>
<div class="container py-3">
   <ul class="nav nav-pills" role="tablist">
      <li class="nav-item active topnav">
         <a class="nav-link active" data-toggle="pill" href="#All">ALL</a>
      </li>
      <li class="nav-item topnav">
         <a class="nav-link " data-toggle="pill" href="#Paid">PAID</a>
      </li>
      <li class="nav-item topnav">
         <a class="nav-link" data-toggle="pill" href="#Free">FREE</a>
      </li>
   </ul>
   <hr style="width: 100%;">
</div>
<div class="tab-content">
   <div id="All" class="container tab-pane active">
      <br>
      <div class="container mid">
         <div class="row hover">
            @foreach($quizes as $key_quiz => $quiz)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
               <div class="card-1 shdw shadow">
                  <div>
                     <img src="{{ url('storage/app/public').'/'.$quiz['image'] }}" class="img-responsive" alt="Avatar" style="width:100%;height: 240px;">
                  </div>
                  <div class="jss87 jss960">
                     <div class="jss87 jss88 jss95 jss125 jss961">
                        <img src="https://front.myquiz.org/assets/images/myquiz.svg">
                     </div>
                     <div class="jss87 jss88 jss95 jss105 jss117">
                        <svg class="ques" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10.9997 8.00016C11.9197 8.00016 12.6597 7.2535 12.6597 6.3335C12.6597 5.4135 11.9197 4.66683 10.9997 4.66683C10.0797 4.66683 9.33301 5.4135 9.33301 6.3335C9.33301 7.2535 10.0797 8.00016 10.9997 8.00016ZM5.99968 7.3335C7.10634 7.3335 7.99301 6.44016 7.99301 5.3335C7.99301 4.22683 7.10634 3.3335 5.99968 3.3335C4.89301 3.3335 3.99968 4.22683 3.99968 5.3335C3.99968 6.44016 4.89301 7.3335 5.99968 7.3335ZM10.9997 9.3335C9.77968 9.3335 7.33301 9.94683 7.33301 11.1668V12.6668H14.6663V11.1668C14.6663 9.94683 12.2197 9.3335 10.9997 9.3335ZM5.99968 8.66683C4.44634 8.66683 1.33301 9.44683 1.33301 11.0002V12.6668H5.99968V11.1668C5.99968 10.6002 6.21968 9.60683 7.57968 8.8535C6.99968 8.7335 6.43968 8.66683 5.99968 8.66683Z" fill="#878D9A">
                           </path>
                        </svg>
                        <small>{{ $quiz['quiz_attempts_count'] }}</small>
                     </div>
                  </div>
                  <div class="inner">
                     <h3>{{ $quiz['quiz_title'] }}</h3>
                     <p>
                        {{ $quiz['quiz_description'] }}
                     </p>
                     <div class="jss87 jss106 jss944">
                        <div class="jss88 jss938">
                           @if($quiz['price'] > 0)
                           {{ $quiz['price'] }}$
                           @else
                           FREE
                           @endif
                        </div>
                        <div class="jss88 jss940 displayOutHover">
                           <div class="jss965">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="1.5" y="1.5" width="13" height="13" rx="3.5" stroke="#C3C6CD" stroke-opacity="0.4"></rect>
                                 <path d="M9.76777 4.73223C10.2366 5.20107 10.5 5.83696 10.5 6.5C10.5001 7.07633 10.3011 7.63499 9.93665 8.08145C9.5722 8.52791 9.06468 8.83474 8.5 8.95V9.5C8.5 9.63261 8.44732 9.75979 8.35355 9.85355C8.25979 9.94732 8.13261 10 8 10C7.86739 10 7.74021 9.94732 7.64645 9.85355C7.55268 9.75979 7.5 9.63261 7.5 9.5V8.5C7.5 8.36739 7.55268 8.24022 7.64645 8.14645C7.74021 8.05268 7.86739 8 8 8C8.29667 8 8.58668 7.91203 8.83336 7.7472C9.08003 7.58238 9.27229 7.34811 9.38582 7.07403C9.49935 6.79994 9.52906 6.49834 9.47118 6.20736C9.4133 5.91639 9.27044 5.64912 9.06066 5.43934C8.85088 5.22956 8.58361 5.0867 8.29264 5.02882C8.00166 4.97094 7.70006 5.00065 7.42598 5.11418C7.15189 5.22771 6.91762 5.41997 6.7528 5.66665C6.58797 5.91332 6.5 6.20333 6.5 6.5C6.5 6.63261 6.44732 6.75978 6.35355 6.85355C6.25978 6.94732 6.13261 7 6 7C5.86739 7 5.74022 6.94732 5.64645 6.85355C5.55268 6.75978 5.5 6.63261 5.5 6.5C5.5 5.83696 5.76339 5.20107 6.23223 4.73223C6.70107 4.26339 7.33696 4 8 4C8.66304 4 9.29893 4.26339 9.76777 4.73223Z" fill="#878D9A"></path>
                                 <path d="M8.5 11.5C8.5 11.7761 8.27614 12 8 12C7.72386 12 7.5 11.7761 7.5 11.5C7.5 11.2239 7.72386 11 8 11C8.27614 11 8.5 11.2239 8.5 11.5Z" fill="#878D9A"></path>
                              </svg>
                           </div>
                           <span class="jss941">Questions: </span>{{ $quiz['questions_count'] }}
                        </div>
                     </div>
                     <hr>

                     @if($quiz['status'] == 'completed' )
                     <a href="{{ url('generate_quiz_attempt').'/'.$quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Retake Quiz
                     </a>
                     @elseif( $quiz['price'] == 0 || $quiz['status'] == 'purchased')
                     <a href="{{ url('generate_quiz_attempt').'/'.$quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Take Quiz
                     </a>
                     @else
                     <a href="{{ url('marketplace/add_to_cart').'?id='.$quiz['id'] }}" class="btn btn-success butn box pt-3">
                        Add to cart
                     </a>
                     @endif

                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <div id="Paid" class="container tab-pane fade">
      <br>
      <div class="container mid">
         <div class="row hover">
            @foreach($paid_quizes as $key_paid_quiz => $paid_quiz)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
               <div class="card-1 shdw shadow">
                  <div>
                     <img src="{{ url('storage/app/public').'/'.$paid_quiz['image'] }}" class="img-responsive" alt="Avatar" style="width:100%;height: 240px;">
                  </div>
                  <div class="jss87 jss960">
                     <div class="jss87 jss88 jss95 jss125 jss961">
                        <img src="https://front.myquiz.org/assets/images/myquiz.svg">
                     </div>
                     <div class="jss87 jss88 jss95 jss105 jss117">
                        <svg class="ques" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10.9997 8.00016C11.9197 8.00016 12.6597 7.2535 12.6597 6.3335C12.6597 5.4135 11.9197 4.66683 10.9997 4.66683C10.0797 4.66683 9.33301 5.4135 9.33301 6.3335C9.33301 7.2535 10.0797 8.00016 10.9997 8.00016ZM5.99968 7.3335C7.10634 7.3335 7.99301 6.44016 7.99301 5.3335C7.99301 4.22683 7.10634 3.3335 5.99968 3.3335C4.89301 3.3335 3.99968 4.22683 3.99968 5.3335C3.99968 6.44016 4.89301 7.3335 5.99968 7.3335ZM10.9997 9.3335C9.77968 9.3335 7.33301 9.94683 7.33301 11.1668V12.6668H14.6663V11.1668C14.6663 9.94683 12.2197 9.3335 10.9997 9.3335ZM5.99968 8.66683C4.44634 8.66683 1.33301 9.44683 1.33301 11.0002V12.6668H5.99968V11.1668C5.99968 10.6002 6.21968 9.60683 7.57968 8.8535C6.99968 8.7335 6.43968 8.66683 5.99968 8.66683Z" fill="#878D9A">
                           </path>
                        </svg>
                        <small>{{ $quiz['quiz_attempts_count'] }}</small>
                     </div>
                  </div>
                  <div class="inner">
                     <h3>{{ $paid_quiz['quiz_title'] }}</h3>
                     <p>
                        {{ $paid_quiz['quiz_description'] }}
                     </p>
                     <div class="jss87 jss106 jss944">
                        <div class="jss88 jss938">
                           @if($paid_quiz['price'] > 0)
                           {{ $paid_quiz['price'] }}$
                           @else
                           FREE
                           @endif
                        </div>
                        <div class="jss88 jss940 displayOutHover">
                           <div class="jss965">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="1.5" y="1.5" width="13" height="13" rx="3.5" stroke="#C3C6CD" stroke-opacity="0.4"></rect>
                                 <path d="M9.76777 4.73223C10.2366 5.20107 10.5 5.83696 10.5 6.5C10.5001 7.07633 10.3011 7.63499 9.93665 8.08145C9.5722 8.52791 9.06468 8.83474 8.5 8.95V9.5C8.5 9.63261 8.44732 9.75979 8.35355 9.85355C8.25979 9.94732 8.13261 10 8 10C7.86739 10 7.74021 9.94732 7.64645 9.85355C7.55268 9.75979 7.5 9.63261 7.5 9.5V8.5C7.5 8.36739 7.55268 8.24022 7.64645 8.14645C7.74021 8.05268 7.86739 8 8 8C8.29667 8 8.58668 7.91203 8.83336 7.7472C9.08003 7.58238 9.27229 7.34811 9.38582 7.07403C9.49935 6.79994 9.52906 6.49834 9.47118 6.20736C9.4133 5.91639 9.27044 5.64912 9.06066 5.43934C8.85088 5.22956 8.58361 5.0867 8.29264 5.02882C8.00166 4.97094 7.70006 5.00065 7.42598 5.11418C7.15189 5.22771 6.91762 5.41997 6.7528 5.66665C6.58797 5.91332 6.5 6.20333 6.5 6.5C6.5 6.63261 6.44732 6.75978 6.35355 6.85355C6.25978 6.94732 6.13261 7 6 7C5.86739 7 5.74022 6.94732 5.64645 6.85355C5.55268 6.75978 5.5 6.63261 5.5 6.5C5.5 5.83696 5.76339 5.20107 6.23223 4.73223C6.70107 4.26339 7.33696 4 8 4C8.66304 4 9.29893 4.26339 9.76777 4.73223Z" fill="#878D9A"></path>
                                 <path d="M8.5 11.5C8.5 11.7761 8.27614 12 8 12C7.72386 12 7.5 11.7761 7.5 11.5C7.5 11.2239 7.72386 11 8 11C8.27614 11 8.5 11.2239 8.5 11.5Z" fill="#878D9A"></path>
                              </svg>
                           </div>
                           <span class="jss941">Questions: </span>{{ $paid_quiz['questions_count'] }}
                        </div>
                     </div>
                     <hr>

                     @if($paid_quiz['status'] == 'completed' )
                     <a href="{{ url('generate_quiz_attempt').'/'.$paid_quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Retake Quiz
                     </a>
                     @elseif( $paid_quiz['price'] == 0 || $paid_quiz['status'] == 'purchased')
                     <a href="{{ url('generate_quiz_attempt').'/'.$paid_quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Take Quiz
                     </a>
                     @else
                     <a href="{{ url('marketplace/add_to_cart').'?id='.$paid_quiz['id'] }}" class="btn btn-success butn box pt-3">
                        Add to cart
                     </a>
                     @endif

                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
   <div id="Free" class="container tab-pane fade">
      <br>
      <div class="container mid">
         <div class="row hover">
            @foreach($free_quizes as $key_free_quiz => $free_quiz)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
               <div class="card-1 shdw shadow">
                  <div>
                     <img src="{{ url('storage/app/public').'/'.$free_quiz['image'] }}" class="img-responsive" alt="Avatar" style="width:100%;height: 240px;">
                  </div>
                  <div class="jss87 jss960">
                     <div class="jss87 jss88 jss95 jss125 jss961">
                        <img src="https://front.myquiz.org/assets/images/myquiz.svg">
                     </div>
                     <div class="jss87 jss88 jss95 jss105 jss117">
                        <svg class="ques" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10.9997 8.00016C11.9197 8.00016 12.6597 7.2535 12.6597 6.3335C12.6597 5.4135 11.9197 4.66683 10.9997 4.66683C10.0797 4.66683 9.33301 5.4135 9.33301 6.3335C9.33301 7.2535 10.0797 8.00016 10.9997 8.00016ZM5.99968 7.3335C7.10634 7.3335 7.99301 6.44016 7.99301 5.3335C7.99301 4.22683 7.10634 3.3335 5.99968 3.3335C4.89301 3.3335 3.99968 4.22683 3.99968 5.3335C3.99968 6.44016 4.89301 7.3335 5.99968 7.3335ZM10.9997 9.3335C9.77968 9.3335 7.33301 9.94683 7.33301 11.1668V12.6668H14.6663V11.1668C14.6663 9.94683 12.2197 9.3335 10.9997 9.3335ZM5.99968 8.66683C4.44634 8.66683 1.33301 9.44683 1.33301 11.0002V12.6668H5.99968V11.1668C5.99968 10.6002 6.21968 9.60683 7.57968 8.8535C6.99968 8.7335 6.43968 8.66683 5.99968 8.66683Z" fill="#878D9A">
                           </path>
                        </svg>
                        <small>{{ $quiz['quiz_attempts_count'] }}</small>
                     </div>
                  </div>
                  <div class="inner">
                     <h3>{{ $free_quiz['quiz_title'] }}</h3>
                     <p>
                        {{ $free_quiz['quiz_description'] }}
                     </p>
                     <div class="jss87 jss106 jss944">
                        <div class="jss88 jss938">
                           @if($free_quiz['price'] > 0)
                           {{ $free_quiz['price'] }}$
                           @else
                           FREE
                           @endif
                        </div>
                        <div class="jss88 jss940 displayOutHover">
                           <div class="jss965">
                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect x="1.5" y="1.5" width="13" height="13" rx="3.5" stroke="#C3C6CD" stroke-opacity="0.4"></rect>
                                 <path d="M9.76777 4.73223C10.2366 5.20107 10.5 5.83696 10.5 6.5C10.5001 7.07633 10.3011 7.63499 9.93665 8.08145C9.5722 8.52791 9.06468 8.83474 8.5 8.95V9.5C8.5 9.63261 8.44732 9.75979 8.35355 9.85355C8.25979 9.94732 8.13261 10 8 10C7.86739 10 7.74021 9.94732 7.64645 9.85355C7.55268 9.75979 7.5 9.63261 7.5 9.5V8.5C7.5 8.36739 7.55268 8.24022 7.64645 8.14645C7.74021 8.05268 7.86739 8 8 8C8.29667 8 8.58668 7.91203 8.83336 7.7472C9.08003 7.58238 9.27229 7.34811 9.38582 7.07403C9.49935 6.79994 9.52906 6.49834 9.47118 6.20736C9.4133 5.91639 9.27044 5.64912 9.06066 5.43934C8.85088 5.22956 8.58361 5.0867 8.29264 5.02882C8.00166 4.97094 7.70006 5.00065 7.42598 5.11418C7.15189 5.22771 6.91762 5.41997 6.7528 5.66665C6.58797 5.91332 6.5 6.20333 6.5 6.5C6.5 6.63261 6.44732 6.75978 6.35355 6.85355C6.25978 6.94732 6.13261 7 6 7C5.86739 7 5.74022 6.94732 5.64645 6.85355C5.55268 6.75978 5.5 6.63261 5.5 6.5C5.5 5.83696 5.76339 5.20107 6.23223 4.73223C6.70107 4.26339 7.33696 4 8 4C8.66304 4 9.29893 4.26339 9.76777 4.73223Z" fill="#878D9A"></path>
                                 <path d="M8.5 11.5C8.5 11.7761 8.27614 12 8 12C7.72386 12 7.5 11.7761 7.5 11.5C7.5 11.2239 7.72386 11 8 11C8.27614 11 8.5 11.2239 8.5 11.5Z" fill="#878D9A"></path>
                              </svg>
                           </div>
                           <span class="jss941">Questions: </span>{{ $free_quiz['questions_count'] }}
                        </div>
                     </div>
                     <hr>

                     @if($free_quiz['status'] == 'completed' )
                     <a href="{{ url('generate_quiz_attempt').'/'.$free_quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Retake Quiz
                     </a>
                     @elseif( $free_quiz['price'] == 0 || $free_quiz['status'] == 'purchased')
                     <a href="{{ url('generate_quiz_attempt').'/'.$free_quiz['id'] }}/" class="btn btn-success butn box pt-3">
                        Take Quiz
                     </a>
                     @else
                     <a href="{{ url('marketplace/add_to_cart').'?id='.$free_quiz['id'] }}" class="btn btn-success butn box pt-3">
                        Add to cart
                     </a>
                     @endif

                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>

   @endsection