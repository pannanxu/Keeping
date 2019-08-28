<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<article class="post-warp">
    <header class="post-header">
        <!--标题-->
        <h1 class="post-title"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></h1>
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
<div class="post-copyright">
    <p class="copyright-item">
    <span>作者:</span>
    <span><?php $this->author(); ?></span>
    </p>
    <!--<p class="copyright-item">
    <span>字数:</span>
    <span>3133</span>
    </p>-->
    <p class="copyright-item">
    <span>分享:</span>
    <span>
    <a href="//twitter.com/share?url=<?php $this->permalink() ?>&amp;text=<?php $this->title() ?>&amp;via=Twitter" target="_blank" title="Share on Twitter">
    <i class="iconfont icon-twitter"></i>
    </a>
    <a href="//www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>" target="_blank" title="Share on Facebook">
    <i class="iconfont icon-facebook"></i>
    </a>
    <a href="//reddit.com/submit?url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>" target="_blank" title="Share on Reddit">
    <i class="iconfont icon-reddit"></i>
    </a>
    <a href="//www.linkedin.com/shareArticle?url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>" target="_blank" title="Share on LinkedIn">
    <i class="iconfont icon-linkedin"></i>
    </a>
    <a href="//www.pinterest.com/pin/create/button/?url=<?php $this->permalink() ?>&amp;description=<?php $this->title() ?>" target="_blank" title="Share on Pinterest">
    <i class="iconfont icon-pinterest"></i>
    </a>
    <a href="//news.ycombinator.com/submitlink?u=<?php $this->permalink() ?>&amp;description=<?php $this->title() ?>" target="_blank" title="Share on Hacker News">
    <i class="iconfont icon-ycombinator"></i>
    </a>
    <a href="//mix.com/add?url=<?php $this->permalink() ?>&amp;description=<?php $this->title() ?>" target="_blank" title="Share on Mix">
    <i class="iconfont icon-mix"></i>
    </a>
    <a href="//www.tumblr.com/widgets/share/tool?canonicalUrl=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>" target="_blank" title="Share on Tumblr">
    <i class="iconfont icon-tumblr"></i>
    </a>
    <a href="//vk.com/share.php?url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>" target="_blank" title="Share on VKontakte ">
    <i class="iconfont icon-vk"></i>
    </a>
    <a href="//www.douban.com/recommend/?url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>" target="_blank" title="Share on Douban ">
    <i class="iconfont icon-douban"></i>
    </a>
    <a href="//service.weibo.com/share/share.php?url=<?php $this->permalink() ?>&amp;appkey=&amp;title=<?php $this->title() ?>" target="_blank" title="Share on Douban ">
    <i class="iconfont icon-weibo"></i>
    </a>
    </span>
    </p>
    <p class="copyright-item">
    lincese <a rel="license external nofollow noopener noreffer" href="https://creativecommons.org/licenses/by-nc/4.0/" target="_blank">CC BY-NC 4.0</a>
    </p>
</div>
    <div class="post-tags">
        <section>
            <i class="iconfont icon-icon-tag"></i>标签:
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
            <?php if($tags->have()): ?>
            <?php while ($tags->next()): ?>
                <span class="tag"><a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题">#<?php $tags->name(); ?></a></span>
            <?php endwhile; ?>
            <?php else: ?>
                <span class="tag">><?php _e('没有任何标签'); ?></span>
            <?php endif; ?>
            </section>
            <section>
            <a href="javascript:window.history.back();">返回</a></span> ·
            <span><a href="<?php $this->options->siteUrl(); ?>">主页</a></span>
        </section>
    </div>
    <div class="post-nav">
     <!--   <?php $this->thePrev('<i class="iconfont icon-dajiantou"></i>&nbsp; %s','没有了'); ?>
    <?php $this->theNext('%s &nbsp;<i class="iconfont icon-xiaojiantou"></i>','没有了'); ?>-->
    </div>
    <div class="post-comment">
    <h1>评论</h1>
    <?php $this->need('comments.php'); ?>
    </div>
</article>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
