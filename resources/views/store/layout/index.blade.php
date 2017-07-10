
<!DOCTYPE html>
<html>
<head>
<title>Store247</title>
<base href="{{asset('')}}">
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Store247" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="store_asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="store_asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="store_asset/js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="store_asset/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="store_asset/js/bootstrap-3.1.1.min.js"></script>
<!-- timer -->
<link rel="stylesheet" href="store_asset/css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<!--<link href="store_asset/css/animate.min.css" rel="stylesheet"> 
<script src="store_asset/js/wow.min.js"></script>-->
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
	@include('store.layout.header')
	
	@yield('content')

	@include('store.layout.footer')

	@yield('script')
</body>
</html>