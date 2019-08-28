<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="post-warp archive">
    <h2 class="post-title" style="text-align:right;padding-bottom:2em"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h2>
    <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
    <article class="archive-item">
        <a href="<?php $this->permalink() ?>"class="archive-item-link"><?php $this->title() ?></a>
        <span class="archive-item-date"><?php $this->date(); ?></span>
    </article>
        <?php endwhile; ?>
    <?php else: ?>暂无文章<?php endif; ?>
        <ul class="pagination">
            <li class="page-item"><span class="page-link"><?php $this->pageLink('下一页','next'); ?></span></li>
            <li class="page-item"><span class="page-link"><?php $this->pageLink('上一页'); ?></span></li></ul>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
