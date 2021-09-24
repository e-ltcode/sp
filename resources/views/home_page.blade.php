@extends('layouts.header')
@section('content')
<style type="text/css">
	.btn-primary {
		color: #fff !important;
		background-color: #007bff !important;
		border-color: #007bff !important;
	}
	.btn-success {
		color: #fff !important;
		background-color: #28a745 !important;
		border-color: #28a745 !important;
	}
	.account {
		border-radius: 20px !important;
		width: 100px !important;
		padding: 6px 12px !important;
	}
	a:focus, a:hover {
		text-decoration: none !important;
	}	
	@media screen and (min-width: 1200px) {
		.img-fluid{
			max-width: initial !important;
		}
		.container {
			width: inherit !important;
		}
	}
</style>

<div class="layout layouts layoutNew">
	<div class="visually-hidden allSVG"></div>

	<div class="row InvitationNew WhiteColor">
		<div class="col-md-5 col-md-offset-2 col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1" style="padding: 100px 0px;">
			<div>
				<div class="visible-lg visible-md LgMarginTop"></div>
				<div class="visible-xs visible-sm MdMarginTop"></div>
			</div>
			
			<div>
				<div class="visible-lg visible-md MdMarginTop"></div>
				<div class="visible-xs visible-sm SmMarginTop"></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2 class="HeaderDescription">
						Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
					</h2>
				</div>
			</div>
			<div>
				<div class="visible-lg visible-md MdMarginTop"></div>
				<div class="visible-xs visible-sm SmMarginTop"></div>
			</div>
			<div class="row  WhiteColor">
				<div class="col-md-12 SubHeaderDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</div>
			</div>
			<br />
			<div class="row  WhiteColor SubHeaderAlert">
				<div class="col-md-12 SubHeaderDescription">
					
				</div>
			</div>
			<div class="row MdMarginTop">
				<div class="col-lg-4 col-md-5 col-sm-4 col-xs-6">
					<a href="/Account/Register" class="btn btn-success btn-block">Try for FREE</a>
				</div>
			</div>
		</div>
		
	</div>
	
	
	<svg class="XlMarginTop AutoHeight FullWidth waveClass indentMobWave widthWaveAdapt" viewBox="0 0 1920 145">
		<use xlink:href="#wave1"></use>
	</svg>
	
	
	
	
	<div class="CenteredContainer fixLineBetweenBlocks">
		<div class="AboveBackground">
			<div class="LgMarginTop col-md-12 indentModEngage">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="HeaderText BlueColor text--center MdPaddingBottom ieWhiteText">
							Engage & interact with your audience!
						</h1>
					</div>
				</div>
				<div class="row LgMarginTop heightDescSlide">
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 fixWidthAdapt">
						<div id="EventCarousel" class="carousel slide EventCarousel" data-ride="carousel">
							<div class="EventCarousel__Window">
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img alt="asus phone introduction" class="d-block w-100 lazy" alt="partners" src="quiz1.jpg">
									</div>
									<div class="item">
										<img alt="hockey trivia" class="d-block w-100 lazy"  alt="partners" src="https://myquizhub-waveaccess.netdna-ssl.com/app/images/home/sliderPlaceholder.png?ver=20210910.6.37901">
									</div>
									<div class="item">
										<img alt="movie quiz" class="d-block w-100 lazy"  alt="partners" src="https://myquizhub-waveaccess.netdna-ssl.com/app/images/home/sliderPlaceholder.png?ver=20210910.6.37901">
									</div>
									<div class="item">
										<img alt="Dota 2 CUP" class="d-block w-100 lazy"  alt="partners" src="https://myquizhub-waveaccess.netdna-ssl.com/app/images/home/sliderPlaceholder.png?ver=20210910.6.37901">
									</div>
									<div class="item">
										<img alt="hockey quiz" class="d-block w-100 lazy"  alt="partners" src="https://myquizhub-waveaccess.netdna-ssl.com/app/images/home/sliderPlaceholder.png?ver=20210910.6.37901">
									</div>
								</div>
							</div>
							
							<a class="left carousel-control" href="#EventCarousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#EventCarousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
							<div class="TestimonialCarousel__BottomPart carousel-indicators" id="EventCarousel__Indicators">
								<span data-target="#EventCarousel" data-slide-to="0" class="TestimonialCarousel__Indicator active"></span>
								<span data-target="#EventCarousel" data-slide-to="1" class="TestimonialCarousel__Indicator"></span>
								<span data-target="#EventCarousel" data-slide-to="2" class="TestimonialCarousel__Indicator"></span>
								<span data-target="#EventCarousel" data-slide-to="3" class="TestimonialCarousel__Indicator"></span>
								<span data-target="#EventCarousel" data-slide-to="4" class="TestimonialCarousel__Indicator"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<svg class="HeaderTextSVG FullWidth Absolute BackgroundSVG LandingBGColor2 hidden-xs hidden-sm hidden-md waveClass" viewBox="0 0 1920 958">
			<use xlink:href="#wave2"></use>
		</svg>
		<svg class="HeaderTextSVG FullWidth Absolute BackgroundSVG LandingBGColor2 visible-sm visible-md visible-xs hidden-xxs waveClass" viewBox="0 0 320 260">
			<use xlink:href="#wave2mobile"></use>
		</svg>
		<svg class="HeaderTextSVG FullWidth Absolute BackgroundSVG LandingBGColor2 visible-xxs" viewBox="0 0 320 386">
			<use xlink:href="#3var3"></use>
		</svg>
	</div>
	
	<div class="fixLineBetweenBlocks hidden-xs ">
		<div class="XlMarginTop visible-md visible-lg"></div>
		<div class="LgMarginTop visible-sm visible-xs"></div>
	</div>
	
	
	
	
	
	<div class="CenteredContainer fixLineBetweenBlocks" style="padding-top: 100px;">
		<h1 class="HeaderText LgMarginTop WhiteColor indentMobHowWork">
			How it works
		</h1>
	</div>
	
	
	<div class="CenteredContainer HowToPlayContainer fixLineBetweenBlocks">
		<div class="row">
			<div class="LgMarginTop hidden-sm hidden-xs"></div>
			<div class="MdMarginTop visible-xs indentMobMTHowWork"></div>
			<div class="col-md-3 col-md-offset-0 HowToPlayMenu LgMarginBottom col-sm-10 col-sm-offset-1 hidden-xs hidden-sm">
				<div class="bullet selected col-md-12 col-sm-6" linked-id="HowToPlaySlide1">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Designing a quiz
					</div>
				</div>
				<div class="bullet col-md-12 col-sm-6" linked-id="HowToPlaySlide2">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected ">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Inviting players
					</div>
				</div>
				<div class="bullet col-md-12 col-sm-6" linked-id="HowToPlaySlide3">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected ">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Checking in
					</div>
				</div>
				<div class="bullet col-md-12 col-sm-6" linked-id="HowToPlaySlide4">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected ">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Playing the game
					</div>
				</div>
				<div class="bullet col-md-12 col-sm-6" linked-id="HowToPlaySlide5">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Leaderboard
					</div>
				</div>
				<div class="bullet col-md-12 col-sm-6" linked-id="HowToPlaySlide6">
					<div class="star">
						<svg viewBox="0 0 29 30" class="selected">
							<use xlink:href="#activestar"></use>
						</svg>
						<svg viewBox="0 0 29 30" class="notselected">
							<use xlink:href="#star"></use>
						</svg>
					</div>
					<div class="">
						Rewarding
					</div>
				</div>
			</div>
			<div class="col-md-9 col-md-offset-0 col-sm-10 col-sm-offset-1 HowToPlaySlides SmPaddingBottom">
				<div class="LgMarginTop visible-xxs visible-xs visible-sm"></div>
				<div class="WhiteBox" id="HowToPlaySlide1">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider1"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12">
									<h1 class="HeaderText"> Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-8  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider1"></use>
					</svg>
				</div>
				<div class="WhiteBox hidden-lg hidden-md" id="HowToPlaySlide2">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider2"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12">
									<h1 class="HeaderText">Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-8  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider2"></use>
					</svg>
				</div>
				<div class="WhiteBox  hidden-lg hidden-md" id="HowToPlaySlide3">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider3"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12 ">
									<h1 class="HeaderText">Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-8  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider3"></use>
					</svg>
				</div>
				<div class="WhiteBox hidden-lg hidden-md" id="HowToPlaySlide4">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider4"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12">
									<h1 class="HeaderText">Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-8  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider4"></use>
					</svg>
				</div>
				<div class="WhiteBox hidden-lg hidden-md" id="HowToPlaySlide5">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider5"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12">
									<h1 class="HeaderText">Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-8  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider5"></use>
					</svg>
				</div>
				<div class="WhiteBox hidden-lg hidden-md" id="HowToPlaySlide6">
					<div class="visible-xxs visible-xs visible-sm col-xs-12">
						<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 884 523" fill="none">
							<use xlink:href="#slider6"></use>
						</svg>
					</div>
					<div class="AbsoluteMD LgMarginBottom MdPaddingBottom fixTableMBHow">
						<div class="col-md-12">
							<div class="row BlueColor">
								<div class="col-md-12">
									<h1 class="HeaderText">Lorem ipsum</h1>
								</div>
							</div>
							<div class="row Description">
								<div class="col-md-7  col-sm-10 col-xs-10 col-xxs-12">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</div>
							</div>
						</div>
					</div>
					<svg class="HeaderTextSVG FullWidth AutoHeight hidden-xxs hidden-xs hidden-sm" viewBox="0 0 884 523" fill="none">
						<use xlink:href="#slider6"></use>
					</svg>
				</div>
			</div>
		</div>
	</div>
	
	<svg class="XlMarginTop AutoHeight FullWidth waveClass identWaveWhy widthWaveAdapt" viewBox="0 0 1920 76">
		<use xlink:href="#wave3"></use>
	</svg>
	
	
	<div class="LandingBGColor2 fixLineBetweenBlocks hidden-xs">
		<div class="XlMarginTop visible-md visible-lg fixHeightCaretLg"></div>
		<div class="LgMarginTop visible-sm visible-xs"></div>
	</div>
	
	<div class="LandingBGColor2 fixLineBetweenBlocks">
		<div class="col-md-12 text--center MdPaddingBottom">
			<h1 class="HeaderText BlueColor indentPBWhy">Why myQuiz</h1>
		</div>
	</div>
	
	<div class="LandingBGColor2 fixLineBetweenBlocks hidden-xs">
		<div class="LgMarginTop visible-md visible-lg fixHeightCaretLgBlock"></div>
		<div class="LgMarginTop visible-sm visible-xs fixHeightCaretLgBlock"></div>
	</div>
	
	<div class="LandingBGColor2 CenteredContainer WhyMyquiz fixLineBetweenBlocks">
		<div class="row LgMarginBottom">
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-offset-0 col-md-4 col-lg-4 WhiteBox">
				<div class="row">
					<div class="col-md-12 LgMarginTop LgMarginBottom">
						<div class="row BlueColor">
							<div class="col-md-11">
								<h2 class="HeaderText"> Lorem ipsum  <br /> Excepteur sint  </h2>
							</div>
						</div>
						<div class="row Description">
							<div class="col-md-11  col-sm-11 col-xs-11">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-offset-0 col-md-4 col-lg-4 WhiteBox">
				<div class="row">
					<div class="col-md-12 LgMarginTop LgMarginBottom">
						<div class="row BlueColor">
							<div class="col-md-11">
								<h2 class="HeaderText"> Lorem ipsum  <br /> Excepteur sint  </h2>
							</div>
						</div>
						<div class="row Description">
							<div class="col-md-11  col-sm-11 col-xs-11">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-offset-0 col-md-4 col-lg-4 WhiteBox">
				<div class="row">
					<div class="col-md-12 LgMarginTop LgMarginBottom">
						<div class="row BlueColor">
							<div class="col-md-11">
								<h2 class="HeaderText"> Lorem ipsum  <br /> Excepteur sint  </h2>
							</div>
						</div>
						<div class="row Description">
							<div class="col-md-11  col-sm-11 col-xs-11">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	
	
	
	
	<div class="XlMarginTop visible-md visible-lg "></div>
	<div class="LgMarginTop visible-sm visible-xs hidden-xs spacerSeeHow"></div>
	
	
	<div class="LandingBGColor2 fixLineBetweenBlocks">
		<h1 class="HeaderText BlueColor MdPaddingBottom text--center indentMobUsemyQiez">
			
			Use myQuiz to:
		</h1>
	</div>
	
	
	
	<div class="LandingBGColor2 UseTo fixLineBetweenBlocks">
		<div class="row LgMarginTop indentMobGetMore">
			<div class="col-md-4 col-lg-4 hidden-lg hidden-md col-sm-4 col-xs-6 col-xs-offset-3 col-sm-offset-4 hidden-xs">
				<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 553 555">
					<use xlink:href="#useto1"></use>
				</svg>
			</div>
			<div class="col-md-4 col-md-offset-2 col-lg-4 col-lg-offset2 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1">
				<div class="BlueColor TitleText MdMarginTop">
					<h2 class="TitleText">  Lorem ipsum Excepteur sint <br /> consectetur adipiscing elit</h2>
				</div>
				<div class="Description MdMarginTop">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				</div>
			</div>
			<div class="col-md-4 col-lg-4 visible-lg visible-md">
				<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 553 555">
					<use xlink:href="#useto1"></use>
				</svg>
			</div>
		</div>
		<div class="row XlMarginTop XsMtUse">
			<div class="col-md-4 col-md-offset-2 col-lg-4 col-lg-offset2 col-sm-4 col-xs-6 col-xs-offset-3 col-sm-offset-4 hidden-xs">
				<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 467 469">
					<use xlink:href="#useto2"></use>
				</svg>
			</div>
			<div class="col-md-4 col-lg-4  col-md-offset-0 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1">
				<div class="BlueColor TitleText MdMarginTop">
					<h2 class="TitleText"> Lorem ipsum Excepteur sint  <br /> consectetur adipiscing elit</h2>
				</div>
				<div class="Description MdMarginTop">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				</div>
			</div>
		</div>
		<div class="row XlMarginTop XsMtUse">
			<div class="col-md-4 col-lg-4 hidden-lg hidden-md col-sm-4 col-xs-6 col-xs-offset-3 col-sm-offset-4 hidden-xs">
				<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 553 555">
					<use xlink:href="#useto3"></use>
				</svg>
			</div>
			<div class="col-md-4 col-md-offset-2 col-lg-4 col-lg-offset2 col-sm-10 col-xs-10 col-xs-offset-1 col-sm-offset-1">
				<div class="BlueColor TitleText MdMarginTop">
					<h2 class="TitleText">  Lorem ipsum Excepteur sint  <br /> consectetur adipiscing elit</h2>
				</div>
				<div class="Description MdMarginTop">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
				</div>
			</div>
			<div class="col-md-4 col-lg-4 visible-lg visible-md">
				<svg class="HeaderTextSVG FullWidth AutoHeight" viewBox="0 0 553 555">
					<use xlink:href="#useto3"></use>
				</svg>
			</div>
		</div>
	</div>
	
	<div class="CenteredContainer LandingBGColor2 fixLineBetweenBlocks">
		<span class="HeaderText XlMarginTop BlueColor hidden">
			Loved by teams and individuals
		</span>
	</div>


	@endsection

	@section('styles')

	{{-- <link type="image/x-icon" href="https://myquizhub-waveaccess.netdna-ssl.com/favicon.ico?ver=20210910.6.37901" rel="shortcut icon" />
	<link type="image/png" href="https://myquizhub-waveaccess.netdna-ssl.com/favicon-16x16.png?ver=20210910.6.37901" sizes="16x16" rel="icon" />
	<link type="image/png" href="https://myquizhub-waveaccess.netdna-ssl.com/favicon-32x32.png?ver=20210910.6.37901" sizes="32x32" rel="icon" /> --}}

	<link href="{{ asset('assets/css/home_default1.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/home_default2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/home_default3.css') }}" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Lato:400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles_main.css') }}">



	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,400,600,700,800" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	
	@endsection


	@section('scripts')

	<script src="https://myquizhub-waveaccess.netdna-ssl.com/bundles/plugins/yall?ver=20210910.6.37901"></script>
	<script src="https://myquizhub-waveaccess.netdna-ssl.com/app/dist/js/customization?ver=20210910.6.37901"></script>
	<script src="https://myquizhub-waveaccess.netdna-ssl.com/bundles/jquery?ver=20210910.6.37901"></script>

	<script src="{{ asset('assets/js/main.js') }}"></script>
	
	@endsection