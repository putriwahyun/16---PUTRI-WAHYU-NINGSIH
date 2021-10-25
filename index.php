<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Arsip</title>

	<link rel="stylesheet" href="assets/pure-min.css">
	<link rel="stylesheet" href="assets/baby-blue.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<script type='text/javascript' src='assets/ui.js'></script>


</head>

<body>
	<div id="layout">
		<a href="#menu" id="menuLink" class="menu-link"> <span></span> </a>

		<div id="menu">
			<div class="pure-menu pure-menu-open">
				<a class="pure-menu-heading" href="/">Menu</a>
				<ul>

					<li class=" ">
						<a href="index.php?p=arsip">
							<i class="fas fa-star"></i>
							<span class="links_name">Arsip</span>
						</a>
					</li>
					<li class=" ">
						<a href="index.php?p=about">
							<i class="fas fa-info-circle"></i>
							<span class="links_name">About</span>
						</a>
					</li>

				</ul>
			</div>
		</div>

		<section class="home-section">
			<?php
			$pages_dir = 'pages';
			if (!empty($_GET['p'])) {
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);

				$p = $_GET['p'];
				if (in_array($p . '.php', $pages)) {
					include($pages_dir . '/' . $p . '.php');
				} else {
					echo 'Halaman Tidak Ditemukan';
				}
			} else {
				include($pages_dir . '/arsip.php');
			}
			?>
		</section>

</body>

</html>