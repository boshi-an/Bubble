<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if(!(art_available($this) || $this->user->hasLogin())) {$this->need('404.php'); exit;}?>
<?php $this->need('header.php'); ?>

	<main>
		<section class="section section-lg section-hero section-shaped">
			<!-- Background circles -->
			<div class="shape shape-style-1 shape-primary">
				<span class="span-150"></span>
				<span class="span-50"></span>
				<span class="span-50"></span>
				<span class="span-75"></span>
				<span class="span-100"></span>
				<span class="span-75"></span>
				<span class="span-50"></span>
				<span class="span-100"></span>
				<span class="span-50"></span>
				<span class="span-100"></span>
			</div>
			<div class="container shape-container d-flex align-items-center py-lg">
				<div class="col px-0 text-center">
					<div class="row align-items-center justify-content-center">
						<h1 class="text-white"><?php $this->title() ?></h1>
					</div>
					<div class="row align-items-center justify-content-center">
						<h5 class="text-white">于 <time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time> 由 <?php $this->author(); ?> 发布</h5>
					</div>
				</div>
			</div>
			<!-- SVG separator -->
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</section>
		<!-- Article content -->
		<section class="section">
			<div class="container">
				<div class="content">
					<?php $this->content(); ?>
					<hr/>
					<ul>
						<li>分类：<span class="badge badge-pill badge-success text-uppercase"><?php $this->category('d'); ?></span></li>
						<li>
							标签：<?php $this->tags(', ', true, 'none'); ?>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- Comment -->
		<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>