<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

// 主题设置
function themeConfig($form) {
    $HomeImg = new Typecho_Widget_Helper_Form_Element_Text('HomeImg',NULL,null,_t('首页logo图片'),_t('填入链接http://或者https://'));
    $HomeTitle = new Typecho_Widget_Helper_Form_Element_Text('HomeTitle',NULL,null,_t('首页logo图片下的标题'));
	$Icp = new Typecho_Widget_Helper_Form_Element_Text('Icp', NULL, NULL, _t('ICP备案号'), _t('填入ICP备案号，没有则不填'));
	/*$TimeStatistics = new Typecho_Widget_Helper_Form_Element_Text('TimeStatistics', NULL, NULL, _t('站点运行时间统计'), _t('填入起始时间，格式：月/日/年 时:分:秒，如08/20/2018 12:00:00'));*/
	$Custom_css = new Typecho_Widget_Helper_Form_Element_Textarea('Custom_css', NULL, NULL, _t('自定义css代码'), _t('写入css代码，不需要style标签'));
	/*$QR_code_zfb = new Typecho_Widget_Helper_Form_Element_Text('QR_code_zfb', NULL, NULL, _t('支付宝二维码链接'), _t('支付宝收款二维码链接，不填不显示'));
	$QR_code_wx = new Typecho_Widget_Helper_Form_Element_Text('QR_code_wx', NULL, NULL, _t('微信二维码链接'), _t('微信收款二维码链接，不填不显示'));*/
	$form->addInput($HomeImg);
	$form->addInput($HomeTitle);
	$form->addInput($Icp);
	/*$form->addInput($TimeStatistics);*/
	$form->addInput($Custom_css);
	/*$form->addInput($QR_code_zfb);
	$form->addInput($QR_code_wx);*/
}

// 自定义字段
function themeFields($layout) {
	$ArticleHeadMap = new Typecho_Widget_Helper_Form_Element_Text('ArticleHeadMap', NULL, NULL, _t('自定义文章头图'), _t('输入图片地址(仅风格一有效)，不填则从文章找，文章没有则随机'));
	$OriginalLink = new Typecho_Widget_Helper_Form_Element_Text('OriginalLink', NULL, NULL, _t('原文链接'), _t('填入完整链接，会在文章底部版权声明处显示'));
	$layout->addItem($ArticleHeadMap);
	$layout->addItem($OriginalLink);
}

// 文章阅读次数统计
function get_post_view($archive) {
	$cid = $archive->cid;
	$db = Typecho_Db::get();
	$prefix = $db->getPrefix();
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
		echo 0;
		return;
	}
	$row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
	if ($archive->is('single')) {
		$views = Typecho_Cookie::get('extend_contents_views');
		if (empty($views)) {
			$views = array();
		} else {
			$views = explode(',', $views);
		}
		if (!in_array($cid, $views)) {
			$db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
			array_push($views, $cid);
			$views = implode(',', $views);
			Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
		}
	}
	echo $row['views'];
}

// 获取文章缩略图
function img_postthumb($cid) {
	$db = Typecho_Db::get();
	$rs = $db->fetchRow($db->select('table.contents.text')
		->from('table.contents')
		->where('table.contents.cid=?', $cid)
		->order('table.contents.cid', Typecho_Db::SORT_ASC)
		->limit(1));
	preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl); //通过正则式获取图片地址
	$img_src = $thumbUrl[1][0]; //将赋值给img_src
	$img_counter = count($thumbUrl[0]); //一个src地址的计数器

	switch ($img_counter > 0) {
		case $allPics = 1:
			echo 'url(' . $img_src . ');'; //当找到一个src地址的时候，输出缩略图
			break;
		default:
			// echo '/usr/themes/Destiny/images/' . rand(1, 3) . "-min.png"; //没找到(默认情况下)，随机输出
			$GradientBackground = array("#4587ff, #88d3ff", "#fc4a1a, #f7b733", "#ff4217, #ffbc25", "#2d2201, #777777", "#7713fb, #a56dff", "#e2025f, #fd9595");
			echo 'linear-gradient(90deg, ' . $GradientBackground[rand(0, 5)] . ');';
		};
}

// 判断内容页是否百度收录

function baidu_record() {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if (strpos($url, '?_pjax')) {
		$url = substr($url, 0, strpos($url, '?_pjax'));
	};
	if (checkBaidu($url) == 1) {
		echo "百度已收录";
	} else {
		echo "<a rel=\"external nofollow\" title=\"点击提交收录！\" target=\"_blank\" href=\"http://zhanzhang.baidu.com/sitesubmit/index?sitename=$url\">百度未收录</a>";
	};
}
function checkBaidu($url) {
	$url = 'http://www.baidu.com/s?wd=' . urlencode($url);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$rs = curl_exec($curl);
	curl_close($curl);
	if (!strpos($rs, '没有找到')) { //没有找到说明已被百度收录
		return 1;
	} else {
		return -1;
	};
}