<?php
/**
 * Template Name: Campus Life
 * Template Post Type: page
 *
 * This template is for displaying campus life page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package PGC Prospective 2023
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;


?>

<!-- Subpage Visual -->
<section class="visual-section subpage-visual">
	<div class="container">
		<div class="textbox">
			<h1>Campus Life</h1>
		</div>
	</div>
</section>
<!-- Campus Section -->
<section class="campus-block additionl-styles">
	<div class="container">
		<header class="campus-head">
			<h2>campus Life</h2>

			<div class="filter-controls">
				<div class="slick-slide">
					<button type="button" data-filter="all">All</button>
				</div>
				<div class="slick-slide">
					<button type="button" data-filter=".music-fest">Music fest</button>
				</div>
				<div class="slick-slide">
					<button type="button" data-filter=".competitions">Competitions</button>
				</div>
				<div class="slick-slide">
					<button type="button" data-filter=".student-survey">Student Survey</button>
				</div>
				<div class="slick-slide">
					<button type="button" data-filter=".cultural-fest">Cultural fest</button>
				</div>
				<div class="slick-slide">
					<button type="button" data-filter=".sports-fest">Sports fest</button>
				</div>

			</div>
		</header>
		<div class="filters-container">
			<div class="filter-item mix video-box sports-fest cultural-fest competitions">
				<a href="https://youtu.be/9xwazD5SyVg" data-fancybox="gallery">
					<img src="images/image04.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix video-box cultural-fest music-fest">
				<a href="https://youtu.be/9xwazD5SyVg" data-fancybox="gallery">
					<img src="images/image07.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix sports-fest cultural-fest competitions">
				<a href="images/image10.jpg" data-fancybox="gallery">
					<img src="images/image10.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix student-survey">
				<a href="images/image05.jpg" data-fancybox="gallery">
					<img src="images/image05.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix cultural-fest sports-fest">
				<a href="images/image06.jpg" data-fancybox="gallery">
					<img src="images/image06.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix competitions sports-fest cultural-fest">
				<a href="images/image08.jpg" data-fancybox="gallery">
					<img src="images/image08.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix music-fest cultural-fest">
				<a href="images/image09.jpg" data-fancybox="gallery">
					<img src="images/image09.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
			<div class="filter-item mix student-survey">
				<a href="images/image11.jpg" data-fancybox="gallery">
					<img src="images/image11.jpg" alt="img description">
					<span class="btn-play"><i class="fas fa-play"></i></span>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- Section Programs -->
<section class="section-programs">
	<div class="container">
		<div class="content-holder">
			<h2>Programmes Offered</h2>
			<div class="row-block">
				<div class="col-block-4 box-program">
					<a class="box-holder" href="#">
						<h3>Intermediate</h3>
						<p>2 Year Annual <br>Programmes</p>
					</a>
				</div>
				<div class="col-block-4 box-program">
					<a class="box-holder" href="#">
						<h3>Associate Degree</h3>
						<p>2 Year Annual <br>Programmes</p>
					</a>
				</div>
				<div class="col-block-4 box-program">
					<a class="box-holder" href="#">
						<h3>BS Degree</h3>
						<p>4 Year Semester <br>Programmes</p>
					</a>
				</div>
			</div>
			<div class="btn-block">
				<a href="#" class="btn btn-primary">Read More</a>
			</div>
		</div>
	</div>
</section>


<?php get_footer();
