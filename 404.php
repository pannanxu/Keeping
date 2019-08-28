<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<article class="post-warp">
    <header class="post-header">
        <!--标题-->
        <h1 class="post-title"><a itemprop="url" href="#">页面走丢啦</a></h1>
    </header>
    <div class="post-content">
        <a href="<?php $this->options->siteUrl(); ?>">返回主页</a>
    </div>
</article>
<?php $this->need('footer.php'); ?>