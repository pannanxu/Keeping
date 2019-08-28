<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<article class="post-warp">
    <header class="post-header">
        <!--标题-->
        <h1 class="post-title"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
    <div class="post-meta">
        Written by <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a> with ♥
        <span class="post-time">
        on <time datetime="<?php $this->date(); ?>"><?php $this->date(); ?></time>
        </span>
        in
        <i class="iconfont icon-folder"></i>
        <span class="post-category">
            <?php $this->category(','); ?>
        </span>
    </div>
    </header>
    <div class="post-content">
        <?php $this->content(); ?>
    </div>
</article>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>