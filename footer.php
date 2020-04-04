<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

		<?php if ($this->user->hasLogin()) : ?>
			<?php if ($this->is('single')) : ?>
				<a title="编辑" href="<?php $this->options->adminUrl(); ?>write-<?php echo $this->is('post')?'post':'page'; ?>.php?cid=<?php echo $this->cid;?>">
					<button class="btn btn-icon-only rounded-circle btn-primary page-btn">
						<span class="btn-inner--icon"><i class="ni ni-settings"></i></span>
					</button>
				</a>
			<?php else : ?>
				<a title="进入控制台" href="<?php $this->options->adminUrl(); ?>">
					<button class="btn btn-icon-only rounded-circle btn-primary page-btn">
						<span class="btn-inner--icon"><i class="ni ni-ui-04"></i></span>
					</button>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	</main>

	<!-- Footer -->
	<footer class="footer">

		<section class="section">
			<div class="container mb-5">
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
		</section>

		<div class="container">
			<div class="row align-items-center justify-content-md-between">
				<div class="col-md-6">
					<div class="copyright">
						Copyright © <?php $this->options->title() ?>
					</div>
				</div>
				<div class="col-md-6">
					<ul class="nav nav-footer justify-content-end">
						<li class="nav-item">
							<a class="nav-link" href="<?php $this->options->siteUrl(); ?>">首页</a>
						</li>
						<?php $this->widget('Widget_Contents_Page_List')->to($pages);
							while($pages->next()): ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
							</li>
						<?php endwhile; ?>
						<?php if($this->user->hasLogin()): ?>
							<li class="nav-item"><a class="nav-link" href="<?php $this->options->adminUrl(); ?>">进入后台(<?php $this->user->screenName(); ?>)</a></li>
							<li class="nav-item"><a class="nav-link" href="<?php $this->options->logoutUrl(); ?>">退出</a></li>
						<?php else: ?>
							<li class="nav-item"><a class="nav-link" href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Core -->
	<script src="<?php $this->options->themeUrl("assets/vendor/jquery/jquery.min.js"); ?>"></script>
	<script src="<?php $this->options->themeUrl("assets/vendor/popper/popper.min.js"); ?>"></script>
	<script src="<?php $this->options->themeUrl("assets/vendor/bootstrap/bootstrap.min.js"); ?>"></script>
	<!-- Optional plugins -->
	<script src="<?php $this->options->themeUrl("assets/vendor/headroom/headroom.min.js"); ?>"></script>
	<!-- Theme JS -->
	<script src="<?php $this->options->themeUrl("assets/js/argon.min.js"); ?>"></script>
	<!-- Typecho footer -->
	<?php $this->footer(); ?>
	</body>
</html>