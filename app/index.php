<?php
include_once 'api/config.php';
?>
<!DOCTYPE html>
<html ng-app="app">
	<head>
		<meta charset="utf-8">
		<title>ONIVER</title>
		<link rel="icon" href="midia/favicon.png" type="image/png">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge; chrome=1">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url ?>dist/app.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url ?>bower_components/font-awesome/css/font-awesome.min.css">
		<!-- build:css dist/vendors.css -->
		<!-- endbuild -->
		<script>
			var base_url = "<?php echo base_url ?>";
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', '', 'auto');
			  //ga('send', 'pageview');

		</script>
			<base href="<?php echo base_url ?>">
			<?php 
			//include 'seo/indexSeo.php';
			?>
	</head>
	<body ng-cloak>
		<!--<div class="loading">
			<div class="loading_area">
				<div class="cssload-loader"></div>
			</div>        
		</div> -->
		<div ui-view>
			<?php        
			//include 'seo/indexNGView.php';
			?>
		</div>
		<!-- build:js dist/vendors.js -->
		<script src="<?php echo base_url ?>bower_components/angular/angular.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/angular-locale-pt-br/angular-locale_pt-br.js"></script>
		<script src="<?php echo base_url ?>bower_components/jquery/dist/jquery.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/flexslider/jquery.flexslider-min.js"></script>
		<script src="<?php echo base_url ?>bower_components/tether/dist/js/tether.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/angular-input-masks/angular-input-masks-standalone.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/angulartics/dist/angulartics.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/angulartics-google-analytics/dist/angulartics-ga.min.js"></script>
		<script src="<?php echo base_url ?>bower_components/br-cidades-estados/dist/cidades-estados.min.js"></script>
		<!-- endbuild -->
		<script src="<?php echo base_url ?>dist/app.js"></script>
	</body>
</html>