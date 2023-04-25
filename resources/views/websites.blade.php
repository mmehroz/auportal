@extends('layout.apptheme')
@section('hr-HRM')
<!-- <body>
	

<div class="row">
	<div class="col-md-12">
		<h1 >Preface</h1>0000
	</div>
</div>
</body> -->
<div class="page-wrapper ">
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title text-center">Websites</h3>
					<ul class="breadcrumb">
						<!-- <li class="breadcrumb-item active">Add Employee</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- 1 -->
			@if($data->elsemployees_departid == 2)
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/manta.png') !!}" alt="">
                    </div>

                    <h4>Manta</h4>
                    <a href="https://www.manta.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 2 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/localcom.png') !!}" alt="">
                    </div>

                    <h4>Local</h4>
                    <a href="http://www.local.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 3 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/merchant.png') !!}" alt="">
                    </div>

                    <h4>Merchant Circle</h4>
                    <a href="https://www.merchantcircle.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 4 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/uscity.png') !!}" alt="">
                    </div>

                    <h4>US City</h4>
                    <a href="https://uscity.net/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 5 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/bestof.png') !!}" alt="">
                    </div>

                    <h4>Local Botw</h4>
                    <a href="https://local.botw.org/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 6 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/akama.png') !!}" alt="">
                    </div>

                    <h4>Akama</h4>
                    <a href="http://www.akama.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			@elseif($data->elsemployees_departid == 6)
			<!-- 7 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/canada411.png') !!}" alt="">
                    </div>

                    <h4>Canada411</h4>
                    <a href="https://www.canada411.ca/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 8 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/yp.png') !!}" alt="">
                    </div>

                    <h4>Yellow Pages</h4>
                    <a href="http://yellowpages.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 9 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/whitepage.png') !!}" alt="">
                    </div>

                    <h4>White Pages</h4>
                    <a href="https://www.switchboard.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 10 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/1called.png') !!}" alt="">
                    </div>

                    <h4>1Called</h4>
                    <a href="http://www.1called.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 11 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/411ca.png') !!}" alt="">
                    </div>

                    <h4>411Ca</h4>
                    <a href="http://www.411.ca/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 12 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/zaba.png') !!}" alt="">
                    </div>

                    <h4>Zaba</h4>
                    <a href="http://www.zabasearch.com/" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 13 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/xe.png') !!}" alt="">
                    </div>

                    <h4>Xe</h4>
                    <a href="https://www.xe.com/currencyconverter" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 14 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/oanda.png') !!}" alt="">
                    </div>

                    <h4>Oanda</h4>
                    <a href="https://www.oanda.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 15 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/bin.png') !!}" alt="">
                    </div>

                    <h4>Bin Checker</h4>
                    <a href="https://www.binchecker.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 16 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/whitepage.png') !!}" alt="">
                    </div>

                    <h4>Bin Checker</h4>
                    <a href="https://www.whitepages.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 17 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/411com.png') !!}" alt="">
                    </div>

                    <h4>411com</h4>
                    <a href="https://www.411.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 18 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/usp.png') !!}" alt="">
                    </div>

                    <h4>American Phone Book</h4>
                    <a href="www.americaphonebook.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 19 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/af.png') !!}" alt="">
                    </div>

                    <h4>Acronym Finder</h4>
                    <a href="www.acronymfinder.com" target="_blank" class="Click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 20 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/base.png') !!}" alt="">
                    </div>

                    <h4>Bin Base</h4>
                    <a href="www.binbase.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 21 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/thatthem.png') !!}" alt="">
                    </div>

                    <h4>Thats Them</h4>
                    <a href="thatsthem.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 22 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/cardcheck.png') !!}" alt="">
                    </div>

                    <h4>Credit Cardity</h4>
                    <a href="http://www.creditcardity.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 23 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/okcall.png') !!}" alt="">
                    </div>

                    <h4>Ok Call</h4>
                    <a href="http://www.okcaller.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 24 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/credit.png') !!}" alt="">
                    </div>

                    <h4>Ok Call</h4>
                    <a href="http://www.validate.creditcard" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 25 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/spokeo.png') !!}" alt="">
                    </div>

                    <h4>Spokeo</h4>
                    <a href="http://www.spokeo.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 26 -->
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/binlist.png') !!}" alt="">
                    </div>

                    <h4>Bin List</h4>
                    <a href="http://www.binlist.net" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			<!-- 27 -->
			@else
			<div class="col-md-4">
				<div class="game1">
					<div class="game">
                    <!-- <img src="./game3.jpg" alt="" class="game"> -->
                    <img src="{!! asset('public/website/google.png') !!}" alt="">
                    </div>

                    <h4>Google</h4>
                    <a href="http://www.google.com" target="_blank" class="click btn btn-primary">Click To Visit</a>
                </div>
			
			</div>
			@endif

		</div>

</div>
<style>

.game1 a{
	/*height: 270px;*/
	margin-bottom: 1px;
}
.game1 h4{
	margin-top: 10px;
}
.game{
	/*height: 200px;*/
}

</style>
@endsection