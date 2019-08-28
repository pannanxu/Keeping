<?php
/**
 * index page
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="intro">
    <div class="avatar">
        <a href="<?php $this->options->siteUrl(); ?>"> <img src="<?php $this->options->HomeImg(); ?>"> </a>
    </div>
        <h2 class="description"><?php $this->options->HomeTitle(); ?></h2>
    <div class="social-links">
        <a href="" target="_blank" rel="me noopener noreffer"><i class="iconfont icon-github"></i></a>
        <a href="" target="_blank" rel="me noopener noreffer"><i class="iconfont icon-twitter"></i></a>
        <a href="" rel="me noopener noreffer" target="_blank"><i class="iconfont icon-mail"></i></a>
        <a href="" rel="me noopener noreffer" target="_blank"><i class="iconfont icon-telegram-plane"></i></a>
    </div>
</div> 
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>