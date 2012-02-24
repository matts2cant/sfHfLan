<?php use_stylesheet('slider.css') ?>

<?php use_javascript('contentslider.js') ?>

<?php use_helper('Text') ?>

<div id="slider">
    <div id="banner">
        <div id="slider1" class="sliderwrapper">
            <?php foreach($sliderArticles as $actu):?>
            <div class="contentdiv">
                <a href="#"><img src="<?php echo $actu->getThumbnail(); ?>" alt=""></a>
                <div class="banner_des">
                    <a class="more" href="<?php echo url_for('blog_view', $actu); ?>">&raquo;</a>
                    <h4><?php echo $actu->getTitle(); ?></h4>
                    <p><?php echo truncate_text(strip_tags($actu->getContent(ESC_RAW)), 140, "..."); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div> 

        <div id="paginate-slider1" class="pagination">
            <a href="#prev" class="prev">Previous</a>
            <?php for($i = 1; $i <= $sliderArticles.count(); $i++): ?>
                <a href="#<?php echo $i; ?>" class="toc<?php echo ($i == $actus.count()) ? 'selected' : ''; ?>" rel="<?php echo $i; ?>"><?php echo $i; ?></a> 
            <?php endfor; ?>
            <a href="#next" class="next">Next</a>
        </div> 
        <script>
            featuredcontentslider.init({
                id: "slider1",  //id of main slider DIV
                contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
                toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
                nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
                revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
                enablefade: [false, 1.0],  //[true/false, fadedegree]
                autorotate: [true, 5000],  //[true/false, pausetime]
                onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
                //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
                //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
                }
            })
        </script>
    </div>
</div>