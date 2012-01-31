// JavaScript Document
featuredcontentslider.init({
    id: "slider2",  //id of main slider DIV
    contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
    toc: ["NEWS","REGLEMENTS","SHOUTBOX"],  //Valid values: "#increment", "markup", ["label1", "label2", etc]
    nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
    revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
    enablefade: [false, 1.0],  //[true/false, fadedegree]
    autorotate: [false, 5000],  //[true/false, pausetime]
    onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
    //previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
    //curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
    }
})