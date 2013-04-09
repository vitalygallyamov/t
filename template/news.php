<?if(isset($_GET['n'])){?>
<section id="news-detail">
    <h1><?=$pageData['name']?></h1>
    <?php foreach($pageData['content'] as $item){?>
    <h2><?=$item->name?></h2>
    <article>
        <img src="template/images/tmp/news_img3.jpg" />
        <div class="news-date"><?=date( "d.m.Y" , $item->dat)?></div>
        <div><?=$item->content?></div>
        <div class="both"></div>  
    </article>
    <?php }?>
</section>
<?}else{?>
<section id="news">
    <h1><?=$pageData['name']?></h1>
    <?php foreach($pageData['content'] as $item){?>
    <article>
        <div class="news-image"><img src="template/images/tmp/news_img2.jpg" width="142" height="97" /></div>
        <div class="news-item">
            <a href="<?="?r={$current_page_id}&n={$item->id}";?>"><?=$item->name?></a>
            <div class="news-date"><?=date( "d.m.Y" , $item->dat)?></div>
            <p><?=substr(trim(strip_tags($item->content)), 0, 150)."...";?></p>
        </div>
        <div class="both"></div>  
    </article>
    <?php }?>
    <div id="pager">
        <?if(!empty($pageData['pagination']))
            echo $pageData['pagination'];
        ?>
    </div>
</section>
<?}?>