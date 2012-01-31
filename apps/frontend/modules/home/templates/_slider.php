<?php use_stylesheet('slider.css') ?>

<?php use_javascript('contentslider.js') ?>

<div id="slider">
    <div id="banner">
        <div id="slider1" class="sliderwrapper">
            <div class="contentdiv">
                <a href="#"><img src="/images/banner1.jpg" alt=""></a>
                <div class="banner_des">
                    <h4>Finale Super Smash Bros.</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div> 
            <div class="contentdiv">
                <a href="#"><img src="/images/banner2.jpg" alt=""></a>
                <div class="banner_des">
                    <h4>Installation des Equipes</h4>
                    <p>
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
                        non numquam eius modi tempora incidunt.
                    </p>
                </div>
            </div> 
            <div class="contentdiv">
                <a href="#"><img src="/images/banner3.jpg" alt=""></a>
                <div class="banner_des">
                    <h4>Tournois League of Legends</h4>
                    <p>
                        Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
                        voluptates repudiandae sint et molestiae non recusandae.
                    </p>
                </div>
            </div> 
            <div class="contentdiv">
                <a href="#"><img src="/images/banner4.jpg" alt=""></a>
                <div class="banner_des">
                    <h4>Tournois Melee</h4>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                        aperiam.
                    </p>
                </div>
            </div>
        </div> 

        <div id="paginate-slider1" class="pagination">
            <a href="#prev" class="prev">Previous</a> 
            <a href="#1" class="toc" rel="1">1</a> 
            <a href="#2" class="toc" rel="2">2</a> 
            <a href="#3" class="toc" rel="3">3</a> 
            <a href="#4" class="toc selected" rel="4">4</a> 
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