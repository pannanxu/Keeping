<?php if (!defined( '__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</main>
<footer class="footer">
    <div class="copyright">
Copyright &copy; 2019 <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> 的博客<br/>
<?php $this->options->Icp(); ?> • Powered by <a href="http://typecho.org/" target="_blank" rel="external nofollow noopener noreffer">Typecho</a> • Theme <a href="https://www.ucuser.cn/note/12.html" target="_blank" rel="external nofollow noopener noreffer">Keeping</a>
<script async src="<?php $this->options->themeUrl('js/c41407119fd540ca8be2f3c058b2b3f9.js'); ?>"></script>
<script async src="<?php $this->options->themeUrl('js/1a8f7b3ed5da49b59f465e8fbf83e1a7.js'); ?>"></script>
<script>window.dataLayer =window.dataLayer ||[];function gtag(){dataLayer.push(arguments);}
gtag('js',new Date());gtag('config','UA-110780416-1');</script>
    </div>
</footer>
<script src='<?php $this->options->themeUrl('js/nprogress.js'); ?>'></script>
<script src='<?php $this->options->themeUrl('js/pjax.min.js'); ?>'></script>
<script src='<?php $this->options->themeUrl('js/vendor_main.min.js'); ?>'></script>
<script>
var pjax = new Pjax({
    elements: 'a[href]:not([href^="#"])',
    cacheBust: false,
    debug: false,
    selectors: ['title', '.wrapper'
    ]
});
document.addEventListener('pjax:send', function () {
    NProgress.start();
});
document.addEventListener('pjax:complete', function () {
    NProgress.done();
});
</script>
</div>
</body>

</html>