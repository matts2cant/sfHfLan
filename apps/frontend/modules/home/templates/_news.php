<?php use_stylesheet('blog.css') ?>

<?php use_javascript('contentslider.js') ?>
<?php use_javascript('tabs.js') ?>

<div class="news_events">
    <!-- tabs -->	
    <div class="tabwrapper">
        <div class="tabs_links">
            <ul>
                <li class="active"><a href="#tab1">NEWS</a></li>
                <li><a href="#tab2">REGLEMENTS</a></li>
                <li><a href="#tab3">SHOUTBOX</a></li>
            </ul>
        </div>
        <div class="tab_content" id="tab1" style="display: block;">
            <?php include_partial('blog/list', array('blogArticles' => $blogArticles)); ?>
            <div class="clear"></div>
        </div>

        <div class="tab_content" id="tab2" style="display: none; ">
            CONTENT TAB 2
            <div class="clear"></div>
        </div>

        <div class="tab_content" id="tab3" style="display: none; ">
            CONTENT TAB 3
            <div class="clear"></div>
        </div>
    </div>   		
    <div class="clear"></div>
</div>