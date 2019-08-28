<?php
/**
 * 每天保持一个良好的心态微笑面对一切，哪怕这是最后一秒。
 * @package Keeping
 * @author 浩瀚
 * @version 1.0
 * @link https://www.ucuser.cn/note/12.html
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="post-warp archive">
    <h2 class="post-title" style="text-align:right;padding-bottom:2em">-&nbsp;文章归档&nbsp;-</h2>
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
        <li class="page-item"><span class="page-link"><?php $this->pageLink('上一页'); ?></span></li>
    </ul>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
