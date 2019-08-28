<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $this->header('commentReply=1&description=0&keywords=0&generator=0&template=0&pingback=0&xmlrpc=0&wlw=0&rss2=0&rss1=0&antiSpam=0&atom'); ?>

<?php function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		};
	};
?>
<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($comments->levels > 0) {
	echo ' comment-child';
	$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
	echo ' comment-parent';
};
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
	<div id="<?php $comments->theId(); ?>">
		<div class="comment-author">
			<?php $comments->gravatar('40', ''); ?>
			<?php $comments->author(); ?>
			<?php if ('waiting' == $comments->status) { ?>
				<span class="awaiting"><?php $options->commentStatus(); ?></span>
			<?php } ?><br>
			<?php $comments->date(); ?>
			<span class="comment-reply">
				<?php $comments->reply(); ?>
			</span>
		</div>
		<?php echo preg_replace('#\@\((.*?)\)#', '<img src="//' . $_SERVER['HTTP_HOST'] . '/usr/themes/Destiny/images/OwO/$1.png" class="bq">', $comments->content); ?>
	</div>
	<?php if ($comments->children): ?>
		<div class="comment-children">
			<?php $comments->threadedComments($options); ?>
		</div>
	<?php endif; ?>
</li>
<?php } ?>

<div class="comment">
	<?php $this->comments()->to($comments); ?>
	<?php if ($this->allow('comment')): ?>
		<div id="<?php $this->respondId(); ?>" class="respond">
			<div class="cancel-comment-reply">
				<?php $comments->cancelReply(); ?>
			</div>
			<form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
				<?php if ($this->user->hasLogin()): ?>
					<div class="comment-form-all">
						你回来啦(๑¯∀¯๑)：
						<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
						<a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a>
				<?php else: ?>
					<div class="comment-form-all">
						<div class="comment-form-meta">
							<input type="text" name="author" id="author" class="text" placeholder="Name(必填)" value="<?php $this->remember('author'); ?>" required />
							<input type="email" name="mail" id="mail" class="text" placeholder="QQ-Mail(必填)" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
							<input type="url" name="url" id="url" class="text" placeholder="网址http://开头" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
						</div>
				<?php endif; ?>
						<textarea rows="8" cols="50" name="text" id="textarea" class="textarea" placeholder="来都来了，说点什么吧？" required ><?php $this->remember('text'); ?></textarea>
						<div class="submit-box">
								<button type="submit" class="submit">biu~</button>
								</div>
					</div>
			</form>
		</div>
	<?php else: ?>
		<h3>评论已关闭</h3>
	<?php endif; ?>
	<div id="comments">
	    <style>
	    #comments h3{
	        color:#000;
	    }
	        .dark-theme #comments h3{
	            color: #a9a9b3;;
	        }
	    </style>
		<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
		<?php $comments->listComments(); ?>
		<div class="comment-page"><?php $comments->pageNav('', ''); ?></div>
	</div>
</div>
