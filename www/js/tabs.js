// JavaScript Document

$(document).ready(function() {

$(".tab_content").hide(); //Hide all content
$(".tabs_links ul li:first").addClass("active").show(); //Activate first tab
$(".tab_content:first").show(); //Show first tab content
//On Click Event
$(".tabs_links ul li").click(function() {
$(".tabs_links ul li").removeClass("active"); //Remove any "active" class
$(this).addClass("active"); //Add "active" class to selected tab
$(".tab_content").hide(); //Hide all tab content
var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
$(activeTab).fadeIn(); //Fade in the active content
return false;
});




$(".rtab_content").hide(); //Hide all content
$(".tab_navigation ul li:first").addClass("active").show(); //Activate first tab
$(".rtab_content:first").show(); //Show first tab content
//On Click Event
$(".tab_navigation ul li").click(function() {
$(".tab_navigation ul li").removeClass("active"); //Remove any "active" class
$(this).addClass("active"); //Add "active" class to selected tab
$(".rtab_content").hide(); //Hide all tab content
var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
$(activeTab).fadeIn(); //Fade in the active content
return false;
});



});