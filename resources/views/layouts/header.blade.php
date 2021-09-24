<!DOCTYPE html>
<html>
<head>
  <title>Quiz Marketplace</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,600,800" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile_page.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}">
</head>

<style type="text/css">
  .profile_img{
    width: 170px;
    height: 170px;
    object-fit: cover;
    margin: 10px auto;
    border: 10px solid #ccc;
    border-radius: 50%;
  }
  .hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
  }
  .navbar .dropdown-menu a:hover {
    color: #616161 !important;
  }
  .darken-grey-text {
    color: #2E2E2E;
  }
  .teal{
    background-color: #009688!important;
  }
  .badge{
    padding: .05em .2em !important;
    position: absolute;
  }
/*  ul {
margin: 0px;
padding: 0px;
}*/
.footer-section {
  background: #151414;
  margin-top: 100px;
  position: relative;
}
.footer-cta {
  border-bottom: 1px solid #373636;
}
.single-cta i {
  color: #9d43ac;
  font-size: 30px;
  float: left;
  margin-top: 8px;
}
.cta-text {
  padding-left: 15px;
  display: inline-block;
}
.cta-text h4 {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 2px;
}
.cta-text span {
  color: #757575;
  font-size: 15px;
}
.footer-content {
  position: relative;
  z-index: 2;
}
.footer-pattern img {
  position: absolute;
  top: 0;
  left: 0;
  height: 330px;
  background-size: cover;
  background-position: 100% 100%;
}
.footer-logo {
  margin-bottom: 30px;
}
.footer-logo img {
  max-width: 200px;
}
.footer-text p {
  margin-bottom: 14px;
  font-size: 14px;
  color: #7e7e7e;
  line-height: 28px;
}
.footer-social-icon span {
  color: #fff;
  display: block;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
}
.footer-social-icon a {
  color: #fff;
  font-size: 16px;
  margin-right: 15px;
}
.footer-social-icon i {
  height: 40px;
  width: 40px;
  text-align: center;
  line-height: 38px;
  border-radius: 50%;
}
.facebook-bg{
  background: #3B5998;
}
.twitter-bg{
  background: #55ACEE;
}
.google-bg{
  background: #DD4B39;
}
.footer-widget-heading h3 {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 40px;
  position: relative;
}
.footer-widget-heading h3::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -15px;
  height: 2px;
  width: 50px;
  background: #ff5e14;
}
.footer-widget ul li {
  display: inline-block;
  float: left;
  width: 50%;
  margin-bottom: 12px;
}
.footer-widget ul li a:hover{
  color: #9d43ac;
}
.footer-widget ul li a {
  color: #878787;
  text-transform: capitalize;
}
.subscribe-form {
  position: relative;
  overflow: hidden;
}
.subscribe-form input {
  width: 100%;
  padding: 14px 28px;
  background: #2E2E2E;
  border: 1px solid #2E2E2E;
  color: #fff;
}
  .burger1{
    top: 2px !important;
    right: 10px !important;
  }
.subscribe-form button {
  position: absolute;
  right: 0;
  background: #ff5e14;
  padding: 13px 20px;
  border: 1px solid #ff5e14;
  top: 0;
}
.subscribe-form button i {
  color: #fff;
  font-size: 22px;
  transform: rotate(-6deg);
}
.copyright-area{
  background: #202020;
  padding: 25px 0;
}
.copyright-text p {
  margin: 0;
  font-size: 14px;
  color: #878787;
}
.copyright-text p a{
  color: #ff5e14;
}
.footer-menu li {
  display: inline-block;
  margin-left: 20px;
}
.footer-menu li:hover a{
  color: #9d43ac;
}
.footer-menu li a {
  font-size: 14px;
  color: #878787;
}


</style>
</head>
<body>

  <div class="header">
    <div onclick="myFunction()" class=" menu-icon burger1">
      <i id="brgr" class="fas fa-bars icon-3x burger1"></i>
      <i id="cros" class="fas fa-times icon-3x"></i>
    </div>

    <div  id="myDIV" class="container-fluid toggle1">

      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('') }}">
            <span class="icon">

              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path
                d="M23.062 6.18692V4.45939C23.062 3.70359 22.7741 3.01978 22.1982 2.55191C21.6224 2.08404 20.8666 1.86809 20.1828 2.08404L2.90748 5.93499C1.86376 5.93499 1 6.79875 1 7.84247V19.3593C1 20.403 1.86376 21.2668 2.90748 21.2668H22.0903C23.134 21.2668 23.9977 20.403 23.9977 19.3593V7.84247C24.0337 7.15865 23.6378 6.47484 23.062 6.18692ZM20.5787 3.99152C20.7586 3.99152 20.9746 3.99152 20.9746 4.09949C21.0825 4.20746 21.1545 4.27944 21.1545 4.49538V5.93499H11.941L20.5787 3.99152ZM22.1262 7.80648V9.71396H2.90748V7.80648H22.1262ZM22.1262 11.6574V12.6292H2.90748V11.6574H22.1262ZM2.90748 19.3233V14.5366H22.0903V19.3233H2.90748Z"
                fill="white"></path>
              </svg>
            </span><br>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">Home</span>
          </div>
        </a>

      </div>
      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('quiz_attempts') }}">
            <span class="icon stroke-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M15.5 5.5281H14.5C14.5 6.08038 14.9477 6.5281 15.5 6.5281V5.5281ZM21.5008 11.1172V12.1172C22.053 12.1172 22.5008 11.6695 22.5008 11.1172H21.5008ZM21.5008 15.1172H22.5008C22.5008 14.5649 22.053 14.1172 21.5008 14.1172V15.1172ZM15.5 21.5281H14.5C14.5 22.0804 14.9477 22.5281 15.5 22.5281V21.5281ZM11.5 21.5281V22.5281C12.0523 22.5281 12.5 22.0804 12.5 21.5281H11.5ZM5.50075 15H6.50075C6.50075 14.4477 6.05304 14 5.50075 14V15ZM5.50075 11V12C6.05304 12 6.50075 11.5523 6.50075 11H5.50075ZM11.5 5.5281V6.5281C12.0523 6.5281 12.5 6.08038 12.5 5.5281H11.5ZM13.5 1C11.8431 1 10.5 2.34314 10.5 4H12.5C12.5 3.44771 12.9477 3 13.5 3V1ZM16.5 4C16.5 2.34315 15.1569 1 13.5 1V3C14.0523 3 14.5 3.44772 14.5 4H16.5ZM16.5 5.5281V4H14.5V5.5281H16.5ZM20.5008 4.5281H15.5V6.5281H20.5008V4.5281ZM22.5008 6.5281C22.5008 5.42353 21.6053 4.5281 20.5008 4.5281V6.5281H22.5008ZM22.5008 11.1172V6.5281H20.5008V11.1172H22.5008ZM19.2969 12.1172H21.5008V10.1172H19.2969V12.1172ZM18.2969 13.1172C18.2969 12.5649 18.7446 12.1172 19.2969 12.1172V10.1172C17.64 10.1172 16.2969 11.4603 16.2969 13.1172H18.2969ZM19.2969 14.1172C18.7446 14.1172 18.2969 13.6695 18.2969 13.1172H16.2969C16.2969 14.774 17.64 16.1172 19.2969 16.1172V14.1172ZM21.5008 14.1172H19.2969V16.1172H21.5008V14.1172ZM22.5008 20.5281V15.1172H20.5008V20.5281H22.5008ZM20.5008 22.5281C21.6053 22.5281 22.5008 21.6327 22.5008 20.5281H20.5008V22.5281ZM15.5 22.5281H20.5008V20.5281H15.5V22.5281ZM14.5 19.2969V21.5281H16.5V19.2969H14.5ZM13.5 18.2969C14.0523 18.2969 14.5 18.7446 14.5 19.2969H16.5C16.5 17.64 15.1569 16.2969 13.5 16.2969V18.2969ZM12.5 19.2969C12.5 18.7446 12.9477 18.2969 13.5 18.2969V16.2969C11.8431 16.2969 10.5 17.64 10.5 19.2969H12.5ZM12.5 21.5281V19.2969H10.5V21.5281H12.5ZM6.50075 22.5281H11.5V20.5281H6.50075V22.5281ZM4.50075 20.5281C4.50075 21.6327 5.39618 22.5281 6.50075 22.5281V20.5281H4.50075ZM4.50075 15V20.5281H6.50075V15H4.50075ZM4 16H5.50075V14H4V16ZM1 13C1 14.6569 2.34314 16 4 16V14C3.44771 14 3 13.5523 3 13H1ZM4 10C2.34315 10 1 11.3431 1 13H3C3 12.4477 3.44772 12 4 12V10ZM5.50075 10H4V12H5.50075V10ZM4.50075 6.5281V11H6.50075V6.5281H4.50075ZM6.50075 4.5281C5.39618 4.5281 4.50075 5.42353 4.50075 6.5281H6.50075V4.5281ZM11.5 4.5281H6.50075V6.5281H11.5V4.5281ZM10.5 4V5.5281H12.5V4H10.5Z" fill="white"></path>
              </svg>
            </span><br>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">My Quizzes</span>
          </div>
        </a>
      </div>
      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('marketplace') }}">
            <span class="icon stroke-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M23.062 6.18692V4.45939C23.062 3.70359 22.7741 3.01978 22.1982 2.55191C21.6224 2.08404 20.8666 1.86809 20.1828 2.08404L2.90748 5.93499C1.86376 5.93499 1 6.79875 1 7.84247V19.3593C1 20.403 1.86376 21.2668 2.90748 21.2668H22.0903C23.134 21.2668 23.9977 20.403 23.9977 19.3593V7.84247C24.0337 7.15865 23.6378 6.47484 23.062 6.18692ZM20.5787 3.99152C20.7586 3.99152 20.9746 3.99152 20.9746 4.09949C21.0825 4.20746 21.1545 4.27944 21.1545 4.49538V5.93499H11.941L20.5787 3.99152ZM22.1262 7.80648V9.71396H2.90748V7.80648H22.1262ZM22.1262 11.6574V12.6292H2.90748V11.6574H22.1262ZM2.90748 19.3233V14.5366H22.0903V19.3233H2.90748Z" fill="white"></path>
              </svg>
            </span><br>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">Marketplace</span>
          </div>
        </a>
      </div>


      @if(Auth::check())
      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('/profile') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.4997 1C10.4756 0.998703 8.49426 1.58289 6.7946 2.68214C5.09494 3.7814 3.7495 5.34879 2.92046 7.19539C2.09143 9.04198 1.8142 11.0889 2.12218 13.0895C2.43016 15.0901 3.31021 16.9589 4.65624 18.4707L4.65843 18.4737L4.66893 18.4847C5.58505 19.5148 6.69548 20.3539 7.93655 20.954C9.17762 21.5541 10.5249 21.9033 11.9012 21.9816L11.945 21.9851C12.1284 21.995 12.3134 22 12.4997 22C12.6861 22 12.8712 21.995 13.0549 21.9851L13.0987 21.9816C14.475 21.9033 15.8223 21.5541 17.0634 20.954C18.3044 20.3539 19.4149 19.5148 20.331 18.4847L20.3415 18.4737V18.4707C21.6874 16.959 22.5674 15.0904 22.8755 13.09C23.1835 11.0895 22.9064 9.04271 22.0776 7.19619C21.2488 5.34966 19.9036 3.78224 18.2042 2.68286C16.5048 1.58347 14.5237 0.999041 12.4997 1ZM12.4997 2.75C14.097 2.74817 15.6643 3.18409 17.0312 4.01041C18.3981 4.83673 19.5125 6.02184 20.2532 7.43699C20.9939 8.85215 21.3326 10.4432 21.2325 12.0374C21.1325 13.6315 20.5975 15.1677 19.6857 16.4792C18.626 15.2898 17.2883 14.3813 15.7919 13.8349C16.6388 13.1539 17.2535 12.2269 17.5512 11.1817C17.8488 10.1365 17.8148 9.02467 17.4538 7.99963C17.0928 6.9746 16.4225 6.08686 15.5356 5.4589C14.6486 4.83093 13.5887 4.49368 12.5019 4.49368C11.4152 4.49368 10.3552 4.83093 9.46826 5.4589C8.58131 6.08686 7.9111 6.9746 7.55008 7.99963C7.18906 9.02467 7.15504 10.1365 7.4527 11.1817C7.75036 12.2269 8.36504 13.1539 9.21193 13.8349C7.71479 14.381 6.37627 15.2895 5.31599 16.4792C4.40428 15.1679 3.8693 13.6319 3.76917 12.0379C3.66904 10.444 4.00757 8.85305 4.74801 7.43797C5.48844 6.02288 6.60247 4.83774 7.96908 4.01126C9.3357 3.18479 10.9026 2.74857 12.4997 2.75ZM18.3789 17.9619C18.2384 18.0892 18.0976 18.2156 17.9501 18.3333C17.8845 18.3858 17.8145 18.4344 17.7471 18.4851C17.5896 18.6037 17.4308 18.7205 17.2659 18.8281C17.2051 18.8675 17.1412 18.9029 17.0795 18.941C16.9023 19.0504 16.7234 19.1576 16.5392 19.2538C16.4845 19.2822 16.4281 19.3068 16.3729 19.3343C16.1778 19.4306 15.9792 19.5242 15.7797 19.606C15.7267 19.6279 15.6716 19.6449 15.6178 19.6655C15.4126 19.7443 15.2052 19.8195 14.9948 19.8843C14.9292 19.9035 14.8636 19.9171 14.7957 19.935C14.5949 19.9901 14.3928 20.0435 14.1876 20.0846C14.0791 20.1056 13.9689 20.1174 13.8586 20.1345C13.6919 20.1612 13.5261 20.1909 13.3577 20.2076C13.0751 20.2356 12.7889 20.2513 12.4993 20.2513C12.2097 20.2513 11.9236 20.2356 11.6409 20.2076C11.4725 20.1909 11.3067 20.1612 11.14 20.1345C11.0306 20.1174 10.9212 20.1056 10.811 20.0846C10.6058 20.0435 10.4037 19.9901 10.2029 19.935C10.1368 19.9171 10.0716 19.9035 10.0038 19.8843C9.79337 19.8208 9.58599 19.7456 9.3808 19.6655C9.32699 19.6449 9.27186 19.6279 9.21893 19.606C9.01768 19.5242 8.8208 19.431 8.62568 19.3343C8.57055 19.3068 8.51411 19.2822 8.45943 19.2538C8.27524 19.1576 8.0963 19.0504 7.91912 18.941C7.85743 18.9029 7.79355 18.8675 7.73274 18.8281C7.56824 18.7205 7.40943 18.6037 7.25149 18.4851C7.18411 18.4344 7.11412 18.3858 7.04849 18.3333C6.90105 18.2156 6.76018 18.0892 6.61974 17.9619C6.56855 17.9151 6.51562 17.8696 6.4653 17.8214C7.20317 16.9382 8.12597 16.2277 9.16852 15.7401C10.2111 15.2526 11.3479 14.9999 12.4989 14.9999C13.6498 14.9999 14.7867 15.2526 15.8292 15.7401C16.8718 16.2277 17.7946 16.9382 18.5324 17.8214C18.483 17.8696 18.4301 17.9151 18.3789 17.9619ZM8.99974 9.75C8.99974 9.05777 9.20501 8.38108 9.5896 7.80551C9.97418 7.22993 10.5208 6.78133 11.1603 6.51642C11.7999 6.25152 12.5036 6.1822 13.1826 6.31725C13.8615 6.4523 14.4851 6.78564 14.9746 7.27513C15.4641 7.76461 15.7974 8.38825 15.9325 9.06719C16.0675 9.74612 15.9982 10.4499 15.7333 11.0894C15.4684 11.7289 15.0198 12.2756 14.4442 12.6601C13.8687 13.0447 13.192 13.25 12.4997 13.25C11.5718 13.249 10.6822 12.8799 10.026 12.2237C9.36987 11.5676 9.00078 10.6779 8.99974 9.75Z" fill="white"></path>
              </svg>
            </span>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">Profile</span>
          </div>
        </a>
      </div>


      <div class="row">
        <div class="col-sm-1 small" style="position: relative;">
          <a class="icons" href="{{ url('/cart_items') }}">
            <span class="badge badge-dark" style="position: absolute;top: 1px;margin-left: 10px;">{{ Auth::user()->cart_items()->count() }}</span>
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.2915 7.45909H20.0165C20.0165 7.35594 20.0165 7.28718 20.0165 7.18403L17.816 1.61406C17.6441 1.16709 17.0939 0.892027 16.6126 1.06394C16.1656 1.23585 15.8905 1.78597 16.0625 2.26733L18.0566 7.39033H6.02276L8.01694 2.26733C8.18886 1.82036 8.01694 1.27024 7.46682 1.06394C7.01985 0.892027 6.46973 1.06394 6.26344 1.61406L4.09734 7.18403C4.09734 7.28718 4.09734 7.35594 4.09734 7.35594H3.82227C2.82518 7.35594 2 8.18113 2 9.17822V11.0005C2 11.7225 2.44697 12.3758 2.99709 12.6509L3.92542 20.5245C4.09734 21.8998 5.30072 23 6.67603 23H17.5409C18.9162 23 20.0852 22.0029 20.2915 20.5245L21.2198 12.6509C21.8731 12.3758 22.2169 11.7225 22.2169 11.0005V9.17822C22.1138 8.28427 21.2886 7.45909 20.2915 7.45909ZM3.82227 9.28137H20.2915V11.1036H3.82227V9.28137ZM17.4721 21.1433H6.67603C6.22905 21.1433 5.85084 20.7651 5.7477 20.3182L4.81937 12.9259H19.1569L18.3317 20.3182C18.3661 20.7995 17.9191 21.1433 17.4721 21.1433Z" fill="white"></path>
              </svg>
            </span>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">Cart</span>
          </div>
        </a>
      </div>

      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('/logout') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.91016 22.5C8.24805 22.5 10.2168 20.5312 10.2168 18.1523C10.3398 17.6602 10.75 17.25 11.1602 17.25H12.8418C13.375 17.25 13.7852 17.6602 13.7852 18.1523C13.7852 20.5312 15.7539 22.5 18.0918 22.5C20.4707 22.5 22.4395 20.5312 22.4395 18.1523V12C22.4395 8.5957 19.6914 5.84766 16.2461 5.84766H12.9648C12.9648 4.37109 14.1543 3.22266 15.5898 3.22266H19.1582C19.5273 3.22266 19.9375 2.8125 19.9375 2.40234C19.9375 2.0332 19.5273 1.5 19.0352 1.5H15.4668C13.1289 1.5 11.1602 3.46875 11.1602 5.84766H7.71484C4.31055 5.84766 1.5625 8.5957 1.5625 12V18.1523C1.5625 20.5312 3.53125 22.5 5.91016 22.5ZM3.28516 12C3.28516 9.62109 5.25391 7.65234 7.5918 7.65234H16.4102C18.748 7.65234 20.7168 9.62109 20.7168 12V18.1523C20.7168 19.6289 19.5273 20.7773 18.0918 20.7773C16.6562 20.7773 15.4668 19.6289 15.4668 18.1523C15.4668 16.7168 14.2773 15.5273 12.8418 15.5273H11.1602C9.68359 15.5273 8.53516 16.7168 8.53516 18.1523C8.53516 19.6289 7.3457 20.7773 5.91016 20.7773C4.43359 20.7773 3.28516 19.6289 3.28516 18.1523V12ZM5.91016 12.9023H6.8125V13.8457C6.8125 14.2148 7.22266 14.625 7.71484 14.625C8.125 14.625 8.53516 14.2148 8.53516 13.7227V12.9023H9.4375C9.9707 12.9023 10.3398 12.5332 10.3398 12C10.3398 11.4668 9.9707 11.0977 9.4375 11.0977H8.53516V10.2773C8.53516 9.78516 8.125 9.375 7.71484 9.375C7.22266 9.375 6.8125 9.78516 6.8125 10.2773V11.2207H5.91016C5.5 11.0977 5.08984 11.4668 5.08984 12C5.08984 12.5332 5.5 12.9023 5.91016 12.9023ZM17.3125 10.2773C17.3125 10.8105 16.9023 11.2207 16.4102 11.2207C15.877 11.2207 15.4668 10.8105 15.4668 10.2773C15.4668 9.78516 15.877 9.375 16.4102 9.375C16.9023 9.375 17.3125 9.78516 17.3125 10.2773ZM15.5898 12C15.5898 12.4922 15.1797 12.9023 14.6875 12.9023C14.1953 12.9023 13.7852 12.4922 13.7852 12C13.7852 11.5078 14.1953 11.0977 14.6875 11.0977C15.1797 11.0977 15.5898 11.5078 15.5898 12ZM19.1582 12C19.1582 12.4922 18.748 12.9023 18.2148 12.9023C17.7227 12.9023 17.3125 12.4922 17.3125 12C17.3125 11.5078 17.7227 11.0977 18.2148 11.0977C18.748 11.0977 19.1582 11.5078 19.1582 12ZM17.3125 13.7227C17.3125 14.2148 16.9023 14.625 16.4102 14.625C15.877 14.625 15.4668 14.2148 15.4668 13.7227C15.4668 13.1895 15.877 12.7793 16.4102 12.7793C16.9023 12.7793 17.3125 13.1895 17.3125 13.7227Z" fill="white"></path>
              </svg>
            </span>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">Logout</span>
          </div>
        </a>
      </div>
      @else
      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('/login') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.91016 22.5C8.24805 22.5 10.2168 20.5312 10.2168 18.1523C10.3398 17.6602 10.75 17.25 11.1602 17.25H12.8418C13.375 17.25 13.7852 17.6602 13.7852 18.1523C13.7852 20.5312 15.7539 22.5 18.0918 22.5C20.4707 22.5 22.4395 20.5312 22.4395 18.1523V12C22.4395 8.5957 19.6914 5.84766 16.2461 5.84766H12.9648C12.9648 4.37109 14.1543 3.22266 15.5898 3.22266H19.1582C19.5273 3.22266 19.9375 2.8125 19.9375 2.40234C19.9375 2.0332 19.5273 1.5 19.0352 1.5H15.4668C13.1289 1.5 11.1602 3.46875 11.1602 5.84766H7.71484C4.31055 5.84766 1.5625 8.5957 1.5625 12V18.1523C1.5625 20.5312 3.53125 22.5 5.91016 22.5ZM3.28516 12C3.28516 9.62109 5.25391 7.65234 7.5918 7.65234H16.4102C18.748 7.65234 20.7168 9.62109 20.7168 12V18.1523C20.7168 19.6289 19.5273 20.7773 18.0918 20.7773C16.6562 20.7773 15.4668 19.6289 15.4668 18.1523C15.4668 16.7168 14.2773 15.5273 12.8418 15.5273H11.1602C9.68359 15.5273 8.53516 16.7168 8.53516 18.1523C8.53516 19.6289 7.3457 20.7773 5.91016 20.7773C4.43359 20.7773 3.28516 19.6289 3.28516 18.1523V12ZM5.91016 12.9023H6.8125V13.8457C6.8125 14.2148 7.22266 14.625 7.71484 14.625C8.125 14.625 8.53516 14.2148 8.53516 13.7227V12.9023H9.4375C9.9707 12.9023 10.3398 12.5332 10.3398 12C10.3398 11.4668 9.9707 11.0977 9.4375 11.0977H8.53516V10.2773C8.53516 9.78516 8.125 9.375 7.71484 9.375C7.22266 9.375 6.8125 9.78516 6.8125 10.2773V11.2207H5.91016C5.5 11.0977 5.08984 11.4668 5.08984 12C5.08984 12.5332 5.5 12.9023 5.91016 12.9023ZM17.3125 10.2773C17.3125 10.8105 16.9023 11.2207 16.4102 11.2207C15.877 11.2207 15.4668 10.8105 15.4668 10.2773C15.4668 9.78516 15.877 9.375 16.4102 9.375C16.9023 9.375 17.3125 9.78516 17.3125 10.2773ZM15.5898 12C15.5898 12.4922 15.1797 12.9023 14.6875 12.9023C14.1953 12.9023 13.7852 12.4922 13.7852 12C13.7852 11.5078 14.1953 11.0977 14.6875 11.0977C15.1797 11.0977 15.5898 11.5078 15.5898 12ZM19.1582 12C19.1582 12.4922 18.748 12.9023 18.2148 12.9023C17.7227 12.9023 17.3125 12.4922 17.3125 12C17.3125 11.5078 17.7227 11.0977 18.2148 11.0977C18.748 11.0977 19.1582 11.5078 19.1582 12ZM17.3125 13.7227C17.3125 14.2148 16.9023 14.625 16.4102 14.625C15.877 14.625 15.4668 14.2148 15.4668 13.7227C15.4668 13.1895 15.877 12.7793 16.4102 12.7793C16.9023 12.7793 17.3125 13.1895 17.3125 13.7227Z" fill="white"></path>
              </svg>
            </span>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">SingIn</span>
          </div>
        </a>
      </div>

      <div class="row">
        <div class="col-sm-1 small">
          <a class="icons" href="{{ url('/register') }}">
            <span class="icon" style="color :white;">

              <i class="fas fa-user-plus"></i>
            </span>
          </div>
          <div class="col-sm-1 small">
            <span class="icon-text">SignUp</span>
          </div>
        </a>
      </div>
      @endif
    </div>

    <div class="icons-top" id="hide" style="display: flex;justify-content: space-between;">
      <a class="icons" href="{{ url('') }}">
        <img src="{{ asset('assets/images/logo_quiz.png') }}" class="img-fluid" style="width: 300px" alt="Responsive image">
      </a>
      <div class="image">
        <div class="container icon-align">
          <a class="icons" href="{{ url('quiz_attempts') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M15.5 5.5281H14.5C14.5 6.08038 14.9477 6.5281 15.5 6.5281V5.5281ZM21.5008 11.1172V12.1172C22.053 12.1172 22.5008 11.6695 22.5008 11.1172H21.5008ZM21.5008 15.1172H22.5008C22.5008 14.5649 22.053 14.1172 21.5008 14.1172V15.1172ZM15.5 21.5281H14.5C14.5 22.0804 14.9477 22.5281 15.5 22.5281V21.5281ZM11.5 21.5281V22.5281C12.0523 22.5281 12.5 22.0804 12.5 21.5281H11.5ZM5.50075 15H6.50075C6.50075 14.4477 6.05304 14 5.50075 14V15ZM5.50075 11V12C6.05304 12 6.50075 11.5523 6.50075 11H5.50075ZM11.5 5.5281V6.5281C12.0523 6.5281 12.5 6.08038 12.5 5.5281H11.5ZM13.5 1C11.8431 1 10.5 2.34314 10.5 4H12.5C12.5 3.44771 12.9477 3 13.5 3V1ZM16.5 4C16.5 2.34315 15.1569 1 13.5 1V3C14.0523 3 14.5 3.44772 14.5 4H16.5ZM16.5 5.5281V4H14.5V5.5281H16.5ZM20.5008 4.5281H15.5V6.5281H20.5008V4.5281ZM22.5008 6.5281C22.5008 5.42353 21.6053 4.5281 20.5008 4.5281V6.5281H22.5008ZM22.5008 11.1172V6.5281H20.5008V11.1172H22.5008ZM19.2969 12.1172H21.5008V10.1172H19.2969V12.1172ZM18.2969 13.1172C18.2969 12.5649 18.7446 12.1172 19.2969 12.1172V10.1172C17.64 10.1172 16.2969 11.4603 16.2969 13.1172H18.2969ZM19.2969 14.1172C18.7446 14.1172 18.2969 13.6695 18.2969 13.1172H16.2969C16.2969 14.774 17.64 16.1172 19.2969 16.1172V14.1172ZM21.5008 14.1172H19.2969V16.1172H21.5008V14.1172ZM22.5008 20.5281V15.1172H20.5008V20.5281H22.5008ZM20.5008 22.5281C21.6053 22.5281 22.5008 21.6327 22.5008 20.5281H20.5008V22.5281ZM15.5 22.5281H20.5008V20.5281H15.5V22.5281ZM14.5 19.2969V21.5281H16.5V19.2969H14.5ZM13.5 18.2969C14.0523 18.2969 14.5 18.7446 14.5 19.2969H16.5C16.5 17.64 15.1569 16.2969 13.5 16.2969V18.2969ZM12.5 19.2969C12.5 18.7446 12.9477 18.2969 13.5 18.2969V16.2969C11.8431 16.2969 10.5 17.64 10.5 19.2969H12.5ZM12.5 21.5281V19.2969H10.5V21.5281H12.5ZM6.50075 22.5281H11.5V20.5281H6.50075V22.5281ZM4.50075 20.5281C4.50075 21.6327 5.39618 22.5281 6.50075 22.5281V20.5281H4.50075ZM4.50075 15V20.5281H6.50075V15H4.50075ZM4 16H5.50075V14H4V16ZM1 13C1 14.6569 2.34314 16 4 16V14C3.44771 14 3 13.5523 3 13H1ZM4 10C2.34315 10 1 11.3431 1 13H3C3 12.4477 3.44772 12 4 12V10ZM5.50075 10H4V12H5.50075V10ZM4.50075 6.5281V11H6.50075V6.5281H4.50075ZM6.50075 4.5281C5.39618 4.5281 4.50075 5.42353 4.50075 6.5281H6.50075V4.5281ZM11.5 4.5281H6.50075V6.5281H11.5V4.5281ZM10.5 4V5.5281H12.5V4H10.5Z" fill="white"></path>
              </svg>
            </span><br>
            <span class="icon-text">My Quizzes</span>
          </a>
          <a class="icons" href="{{ url('marketplace') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M23.062 6.18692V4.45939C23.062 3.70359 22.7741 3.01978 22.1982 2.55191C21.6224 2.08404 20.8666 1.86809 20.1828 2.08404L2.90748 5.93499C1.86376 5.93499 1 6.79875 1 7.84247V19.3593C1 20.403 1.86376 21.2668 2.90748 21.2668H22.0903C23.134 21.2668 23.9977 20.403 23.9977 19.3593V7.84247C24.0337 7.15865 23.6378 6.47484 23.062 6.18692ZM20.5787 3.99152C20.7586 3.99152 20.9746 3.99152 20.9746 4.09949C21.0825 4.20746 21.1545 4.27944 21.1545 4.49538V5.93499H11.941L20.5787 3.99152ZM22.1262 7.80648V9.71396H2.90748V7.80648H22.1262ZM22.1262 11.6574V12.6292H2.90748V11.6574H22.1262ZM2.90748 19.3233V14.5366H22.0903V19.3233H2.90748Z" fill="white"></path>

              </svg>
            </span><br>
            <span class="icon-text">Marketplace</span>
          </a>
          @if(Auth::check())
          <a class="icons" href="{{ url('profile') }}">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12.4997 1C10.4756 0.998703 8.49426 1.58289 6.7946 2.68214C5.09494 3.7814 3.7495 5.34879 2.92046 7.19539C2.09143 9.04198 1.8142 11.0889 2.12218 13.0895C2.43016 15.0901 3.31021 16.9589 4.65624 18.4707L4.65843 18.4737L4.66893 18.4847C5.58505 19.5148 6.69548 20.3539 7.93655 20.954C9.17762 21.5541 10.5249 21.9033 11.9012 21.9816L11.945 21.9851C12.1284 21.995 12.3134 22 12.4997 22C12.6861 22 12.8712 21.995 13.0549 21.9851L13.0987 21.9816C14.475 21.9033 15.8223 21.5541 17.0634 20.954C18.3044 20.3539 19.4149 19.5148 20.331 18.4847L20.3415 18.4737V18.4707C21.6874 16.959 22.5674 15.0904 22.8755 13.09C23.1835 11.0895 22.9064 9.04271 22.0776 7.19619C21.2488 5.34966 19.9036 3.78224 18.2042 2.68286C16.5048 1.58347 14.5237 0.999041 12.4997 1ZM12.4997 2.75C14.097 2.74817 15.6643 3.18409 17.0312 4.01041C18.3981 4.83673 19.5125 6.02184 20.2532 7.43699C20.9939 8.85215 21.3326 10.4432 21.2325 12.0374C21.1325 13.6315 20.5975 15.1677 19.6857 16.4792C18.626 15.2898 17.2883 14.3813 15.7919 13.8349C16.6388 13.1539 17.2535 12.2269 17.5512 11.1817C17.8488 10.1365 17.8148 9.02467 17.4538 7.99963C17.0928 6.9746 16.4225 6.08686 15.5356 5.4589C14.6486 4.83093 13.5887 4.49368 12.5019 4.49368C11.4152 4.49368 10.3552 4.83093 9.46826 5.4589C8.58131 6.08686 7.9111 6.9746 7.55008 7.99963C7.18906 9.02467 7.15504 10.1365 7.4527 11.1817C7.75036 12.2269 8.36504 13.1539 9.21193 13.8349C7.71479 14.381 6.37627 15.2895 5.31599 16.4792C4.40428 15.1679 3.8693 13.6319 3.76917 12.0379C3.66904 10.444 4.00757 8.85305 4.74801 7.43797C5.48844 6.02288 6.60247 4.83774 7.96908 4.01126C9.3357 3.18479 10.9026 2.74857 12.4997 2.75ZM18.3789 17.9619C18.2384 18.0892 18.0976 18.2156 17.9501 18.3333C17.8845 18.3858 17.8145 18.4344 17.7471 18.4851C17.5896 18.6037 17.4308 18.7205 17.2659 18.8281C17.2051 18.8675 17.1412 18.9029 17.0795 18.941C16.9023 19.0504 16.7234 19.1576 16.5392 19.2538C16.4845 19.2822 16.4281 19.3068 16.3729 19.3343C16.1778 19.4306 15.9792 19.5242 15.7797 19.606C15.7267 19.6279 15.6716 19.6449 15.6178 19.6655C15.4126 19.7443 15.2052 19.8195 14.9948 19.8843C14.9292 19.9035 14.8636 19.9171 14.7957 19.935C14.5949 19.9901 14.3928 20.0435 14.1876 20.0846C14.0791 20.1056 13.9689 20.1174 13.8586 20.1345C13.6919 20.1612 13.5261 20.1909 13.3577 20.2076C13.0751 20.2356 12.7889 20.2513 12.4993 20.2513C12.2097 20.2513 11.9236 20.2356 11.6409 20.2076C11.4725 20.1909 11.3067 20.1612 11.14 20.1345C11.0306 20.1174 10.9212 20.1056 10.811 20.0846C10.6058 20.0435 10.4037 19.9901 10.2029 19.935C10.1368 19.9171 10.0716 19.9035 10.0038 19.8843C9.79337 19.8208 9.58599 19.7456 9.3808 19.6655C9.32699 19.6449 9.27186 19.6279 9.21893 19.606C9.01768 19.5242 8.8208 19.431 8.62568 19.3343C8.57055 19.3068 8.51411 19.2822 8.45943 19.2538C8.27524 19.1576 8.0963 19.0504 7.91912 18.941C7.85743 18.9029 7.79355 18.8675 7.73274 18.8281C7.56824 18.7205 7.40943 18.6037 7.25149 18.4851C7.18411 18.4344 7.11412 18.3858 7.04849 18.3333C6.90105 18.2156 6.76018 18.0892 6.61974 17.9619C6.56855 17.9151 6.51562 17.8696 6.4653 17.8214C7.20317 16.9382 8.12597 16.2277 9.16852 15.7401C10.2111 15.2526 11.3479 14.9999 12.4989 14.9999C13.6498 14.9999 14.7867 15.2526 15.8292 15.7401C16.8718 16.2277 17.7946 16.9382 18.5324 17.8214C18.483 17.8696 18.4301 17.9151 18.3789 17.9619ZM8.99974 9.75C8.99974 9.05777 9.20501 8.38108 9.5896 7.80551C9.97418 7.22993 10.5208 6.78133 11.1603 6.51642C11.7999 6.25152 12.5036 6.1822 13.1826 6.31725C13.8615 6.4523 14.4851 6.78564 14.9746 7.27513C15.4641 7.76461 15.7974 8.38825 15.9325 9.06719C16.0675 9.74612 15.9982 10.4499 15.7333 11.0894C15.4684 11.7289 15.0198 12.2756 14.4442 12.6601C13.8687 13.0447 13.192 13.25 12.4997 13.25C11.5718 13.249 10.6822 12.8799 10.026 12.2237C9.36987 11.5676 9.00078 10.6779 8.99974 9.75Z" fill="white"></path>
              </svg>
            </span><br>
            <span class="icon-text">My Profile</span>
          </a>
          @endif  
          <a class="icons" href="{{ url('cart_items') }}" style="position: relative;">
            @if(Auth::check())
            @if(Auth::user()->cart_items()->count() > 0)
            <span class="badge badge-dark" style="position: absolute;top: 6px;margin-left: 17px;">{{ Auth::user()->cart_items()->count() }}</span>
            @endif
            @endif
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M20.2915 7.45909H20.0165C20.0165 7.35594 20.0165 7.28718 20.0165 7.18403L17.816 1.61406C17.6441 1.16709 17.0939 0.892027 16.6126 1.06394C16.1656 1.23585 15.8905 1.78597 16.0625 2.26733L18.0566 7.39033H6.02276L8.01694 2.26733C8.18886 1.82036 8.01694 1.27024 7.46682 1.06394C7.01985 0.892027 6.46973 1.06394 6.26344 1.61406L4.09734 7.18403C4.09734 7.28718 4.09734 7.35594 4.09734 7.35594H3.82227C2.82518 7.35594 2 8.18113 2 9.17822V11.0005C2 11.7225 2.44697 12.3758 2.99709 12.6509L3.92542 20.5245C4.09734 21.8998 5.30072 23 6.67603 23H17.5409C18.9162 23 20.0852 22.0029 20.2915 20.5245L21.2198 12.6509C21.8731 12.3758 22.2169 11.7225 22.2169 11.0005V9.17822C22.1138 8.28427 21.2886 7.45909 20.2915 7.45909ZM3.82227 9.28137H20.2915V11.1036H3.82227V9.28137ZM17.4721 21.1433H6.67603C6.22905 21.1433 5.85084 20.7651 5.7477 20.3182L4.81937 12.9259H19.1569L18.3317 20.3182C18.3661 20.7995 17.9191 21.1433 17.4721 21.1433Z" fill="white"></path>
              </svg>
            </span><br>
            <span class="icon-text">Cart</span>
          </a>
          <a class="icons" href="#">
            <span class="icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M19.2176 1H6.28188C4.75184 1 3.5 2.25184 3.5 3.78188V16.4858C3.5 18.0158 4.75184 19.2677 6.28188 19.2677H7.51054C7.44099 19.6849 7.3019 20.079 7.13962 20.4499C6.83825 21.1454 6.97734 21.9568 7.53372 22.49C7.88145 22.8145 8.32192 23 8.78556 23C9.06375 23 9.34194 22.9305 9.59694 22.8145C11.2893 21.98 12.7034 20.4963 13.677 19.2677H19.1944C20.7244 19.2677 21.9763 18.0158 21.9763 16.4858V3.78188C22.0227 2.25184 20.7708 1 19.2176 1ZM20.1913 16.509C20.1913 17.0422 19.7508 17.4826 19.2176 17.4826H13.2597C12.9816 17.4826 12.7034 17.6217 12.5411 17.8303C11.8456 18.7576 10.4315 20.4036 8.80875 21.215C9.20285 20.334 9.41149 19.3836 9.43467 18.4099C9.43467 18.1549 9.34194 17.9231 9.17966 17.7608C9.01739 17.5753 8.78556 17.4826 8.53056 17.4826H6.28188C5.74868 17.4826 5.30822 17.0422 5.30822 16.509V3.78188C5.30822 3.24868 5.74868 2.80822 6.28188 2.80822H19.2408C19.774 2.80822 20.2144 3.24868 20.2144 3.78188V16.509H20.1913Z" fill="white"></path>
              </svg>
            </span><br>
            <span class="icon-text">Help</span>
          </a>

        </div>
      </div>


      @if(Auth::check())
    <div class="header-right ">

      <button  class="btn btn-success account"> <a class="py-0 text-center text-white" href="{{ url('/logout') }}">Logout</a></button>

    </div>
    @else
    <div class="header-right ">
      <button class="btn btn-primary account "> <a class="py-0 text-center text-white" href="{{ url('/login') }}">SignIn</a></button>
      <button  class="btn btn-success account"> <a class="py-0 text-center text-white" href="{{ url('/register') }}">SignUp</a></button>
    </div>
    @endif

    </div>  
    

  </div>


  <!--/.Navbar blue-->

  @yield('content')
  @yield('styles')
  @yield('scripts')


  <footer class="footer-section">
    <div class="container">
      <div class="footer-cta pt-5 pb-5">
        <div class="row">
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="fas fa-map-marker-alt"></i>
              <div class="cta-text">
                <h4>Find us</h4>
                <span>1010 Avenue, sw 54321, chandigarh</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="fas fa-phone"></i>
              <div class="cta-text">
                <h4>Call us</h4>
                <span>9876543210 0</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="far fa-envelope-open"></i>
              <div class="cta-text">
                <h4>Mail us</h4>
                <span>mail@info.com</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6 text-center text-lg-left">
            <div class="copyright-text">
              <p>Copyright &copy; {{ date('Y') }}, all Right Reserved </p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
            <div class="footer-menu">
              <ul>
                <li><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('marketplace') }}">Marketplace</a></li>
                <li><a href="{{ url('quiz_attempts') }}">Quizzes</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="modal fade bs-modal-lg" id="data_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg all-modals">
      <div class="modal-content"></div>
    </div>
  </div>
  <div id="site_url" style="display: none;">{{url('/')}}</div>
  <div id="current_url" style="display: none;">{{URL::current()}}</div> 
  {{-- <script src="{{ asset('ample/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}
  <!-- Bootstrap Core JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
  
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
  {{-- <script src="{{ asset('ample/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
  <!-- Menu Plugin JavaScript -->
  <script src="{{ asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>



  {{-- <script src="{{ asset('ample/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script> --}}
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <!--slimscroll JavaScript -->
  {{-- <script src="{{ asset('ample/js/jquery.slimscroll.js') }}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!--Wave Effects -->
  <script src="{{ asset('ample/js/waves.js') }}"></script>
  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('ample/js/custom.min.js') }}"></script>
  <!--Style Switcher -->
  <script src="{{ asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
  {{-- <script src="{{ asset('js/plugins.js') }}"></script> --}}

  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
  <!-- Menu Plugin JavaScript -->
  <script src="{{asset('ample/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
  <!--Counter js -->
  <script src="{{asset('ample/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
  <script src="{{asset('ample/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
  <!--slimscroll JavaScript -->
  <script src="{{asset('ample/js/jquery.slimscroll.js')}}"></script>
  <!--Wave Effects -->
  <!-- sparkline chart JavaScript -->
  <script src="{{asset('ample/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <!-- Custom Theme JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" --}}
  {{-- integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"> --}}
{{-- </script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" --}}
{{-- integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> --}}
{{-- </script> --}}
<script src="{{ asset('assets/js/quiz.js') }}"></script>
{{-- <link rel="stylesheet" href="css/style.css"> --}}
<script src="{{ asset('assets/js/menu.js') }}"></script>
{{-- <script src="{{asset('ample/js/footable-init.js')}}"></script> --}}
<!--Style Switcher -->
{{-- <script src="{{asset('ample/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script> --}}
<script src="{{ asset('js/global-script.js') }}"></script>


@yield('scripts')
<script type="text/javascript">
  $(document).ready( function () {
    if($('.datatable-custom').length > 0){
      $('.datatable-custom').DataTable();

    }
  } );

  $(document).on("click", ".list .delete", function (event) {
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




</body>
</html>