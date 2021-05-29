
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title><?php wp_title('|', true, 'right'); bloginfo('name') ?></title>

  <?php wp_head(); ?>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="description"
		content="David's Auto Service strives to provide outstanding car repair services to the community. Our mechanics and employees have a high level of auto repair expertise, with years of experience in all types of automotive repair services. The great panel of tools at our disposal allows us to pinpoint exactly your car issues, in order to save you valuable time and money. All of your car issues are given the same high-level of consideration." />
	<meta name="keywords"
		content="auto repair services, car repair services, automotive repair services, transmission, alignment, tires" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
  <?php get_template_directory_uri() ?>

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<link rel="stylesheet" href="fonts2/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="fonts2/icomoon/style.css">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link
		href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<!-- header -->
	<header id="home">
		<div class="container">
			<div class="header d-lg-flex justify-content-between align-items-center py-sm-3 py-2 px-sm-2 px-1">
				<!-- logo -->
				<div id="logo">
					<h1><a href="index.html"><?php bloginfo('title') ?></a></h1>
				</div>
				<!-- //logo -->
				<!-- nav -->
				<div class="nav_w3ls ml-lg-5">
					<nav>
						<label for="drop" class="toggle">Menu</label>
						<input type="checkbox" id="drop" />
            <?php
            wp_nav_menu([
              'theme_location'  =>  'main-menu',
              'container'       =>  'ul',
              'menu_class'      =>  'menu'
            ]);
            ?>
					</nav>
				</div>
				<!-- //nav -->
			</div>
		</div>
	</header>
	<!-- //header -->




  
