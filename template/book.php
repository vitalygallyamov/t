<section id="honor-book">
    <h1><?=$pageData['name']?></h1>
    <?foreach($pageData['content'] as $item){?>
    <article>
        <div class="honor-image"><img src="/uploadfiles/<?=$item->picture?>.jpg" height="168" /></div>
        <div class="honor-item">
            <h2><?=$item->name?></h2>
            <?=$item->content?>
        </div>
        <div class="both"></div>  
    </article>
    <? }?>
    <div id="pager">
        <?if(!empty($pageData['pagination']))
            echo $pageData['pagination'];
        ?>
    </div>
</section>