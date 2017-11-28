<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block clearfix">
            <h1><?= $page->title?></h1>
        </div>
        <div class="txt_block clearfix">
            <div class="article_block">
                <article><?= $page->content?></article>
            </div>
        </div>
    </div>
</section>