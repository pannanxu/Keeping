<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="renderer" content="webkit">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php if ($this->is('index')): ?><?php if ($this->options->SiteSubtitle): ?><?php $this->options->title(); ?> - <?php $this->options->SiteSubtitle(); ?><?php else: ?><?php $this->options->title(); ?><?php endif; ?><?php else: ?><?php $this->archiveTitle(array('category'  =>  _t('分类 %s 下的文章'),'search'    =>  _t('包含关键字 %s 的文章'),'tag' =>  _t('标签 %s 下的文章'),'author'  =>  _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?><?php endif; ?></title>
    <?php $this->header(); ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/iconfont.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/nprogress.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/pl.css'); ?>">
	<?php if ($this->options->Custom_css): ?>
		<!-- 自定义css -->
		<style type="text/css">
			<?php $this->options->Custom_css(); ?>
		</style>
	<?php endif; ?>
</head>
<body class="">
    <div class="wrapper">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header header-logo">
                    <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                </div>
                <div class="menu navbar-right">
                    <a <?php if($this->is('index')): ?> class="menu-item current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a <?php if($this->is('page', $pages->slug)): ?> class="menu-item current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                    <a href="/blog">博客</a>
                    <a href="javascript:void(0);" class="theme-switch"><i class="iconfont icon-sun"></i></a>&nbsp;
                </div>
            </div>
        </nav>
        <nav class="navbar-mobile" id="nav-mobile" style="display: none">
            <div class="container">
                <div class="navbar-header">
                    <div> <a href="javascript:void(0);" class="theme-switch"><i class="iconfont icon-sun"></i></a>&nbsp;<a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></div>
                    <div class="menu-toggle">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            <div class="menu" id="mobile-menu">
                <a <?php if($this->is('index')): ?> class="menu-item current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <a <?php if($this->is('page', $pages->slug)): ?> class="menu-item current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                <?php endwhile; ?>
                <a href="/blog">博客</a>
            </div>
            </div>
        </nav>
<main class="main">
<div class="container">