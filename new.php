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
		<section class="section">
			<div class="container mb-5">
				<div class="section pb-0 section-components">
					<div class="row">

						<div class="col-md-4 widget">
							<?php if (in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
								<div class="container">
									<div class="tab-content" id="myTabContent">
										<h3><?php _e('最新文章'); ?></h3>
										<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-4 widget">
							<?php if (in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
								<div class="container">
									<div class="tab-content" id="myTabContent">
										<h3><?php _e('最新回复'); ?></h3>
										<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
										<?php while($comments->next()): ?>
											<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
										<?php endwhile; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>

						<div class="col-md-4 widget">
							<?php if (in_array('ShowArchive', $this->options->sidebarBlock)): ?>
								<div class="container">
									<div class="tab-content" id="myTabContent">
										<h3><?php _e('归档'); ?></h3>
										<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>
			</div>
		</section>
<?php $this->need('footer.php'); ?>