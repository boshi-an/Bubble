<?php
/**
 * 自定义页面模板
 *
 * @package custom
 */
	if (!defined('__TYPECHO_ROOT_DIR__')) exit;
	if(!(art_available($this) || $this->user->hasLogin())) {$this->need('404.php'); exit;}
	$this->need('header.php');
?>
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
						<h1 class="text-white">最新动态</h1>
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
		
		<?php if (in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
			<section class="section">
				<div class="container">
					<div class="card shadow">
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<h2><?php _e('最新文章'); ?></h2>
								<hr/>
								<ul>
									<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if (in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
			<section class="section">
				<div class="container">
					<div class="card shadow">
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<h2><?php _e('最新回复'); ?></h2>
								<hr/>
								<ul>
									<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
									<?php while($comments->next()): ?>
										<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
									<?php endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if (in_array('ShowCategory', $this->options->sidebarBlock)): ?>
			<section class="section">
				<div class="container">
					<div class="card shadow">
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<h2><?php _e('分类'); ?></h2>
								<hr/>
								<?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if (in_array('ShowArchive', $this->options->sidebarBlock)): ?>
			<section class="section">
				<div class="container">
					<div class="card shadow">
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<h2><?php _e('归档'); ?></h2>
								<hr/>
								<ul>
									<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
<?php $this->need('footer.php'); ?>