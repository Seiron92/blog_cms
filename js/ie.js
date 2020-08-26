window.onload = function () {

var isIE = !!window.ActiveXObject;
/*For IE versions >= 10*/
var isIE2 = document.body.style.msTouchAction !== undefined;
if(isIE2 || isIE){
    window.location.replace("indeex.php");
}
	
var container = document.getElementById('container');
var menu = document.getElementById('menu');
var menu2 = document.getElementById('blg');
var logo = document.getElementById('logo');
var test2 = document.getElementById('test2');
var inScroll = document.getElementById('scroll');
var menulist = document.getElementsByTagName("UL")[0];
var list = menulist.getElementsByTagName("LI");
var latestPosts = document.getElementById('latestPosts');
var jumpToLatest = document.getElementById('jumpToLatest')
var d2cont = document.getElementById('d2cont');


/*JUMP ON CLICK "Latest posts" */

$("#jumpToLatest").click(function () {
$('html,body').animate({
scrollTop: 1550
},
'fast');
});
/*CHECK IF INPUTS ARE EMPTY */
$('.commentForm').submit(function () {
if ($.trim($(".comname").val()) === "" || $.trim($(".comemail").val()) === "" || $.trim($(".comcomment").val()) === "") {
$(this).closest(".leavemsg").find('.errmsg2').html("<p>Don't leave anything empty</p>");

return false;
}
});

/*SHOW COMMENT SECTION ON CLICK */
$(".comment").on('click', function(event){
//event.stopPropagation();
// event.stopImmediatePropagation();
$(this).closest(".cont").find('.leavemsg').show();
$(this).closest(".cont").find('.closecomment').show();
$(this).closest(".cont").find('.cmessage').show();
$(this).closest(".mainCon").find('.cont').toggleClass("active");
$(this).closest(".mainCon").find('.cont').toggleClass("cont");
$(this).closest(".mainCon").find('.join').toggleClass("active2");
$(this).closest(".mainCon").find('.join').toggleClass("join");
});


/*SHOW COMMENTS ON CLICK */
$(".numberOfComments").on('click', function(event){
event.stopPropagation();
event.stopImmediatePropagation();
$(this).closest(".cont").find('.leavemsg').show();
$(this).closest(".cont").find('.cmessage').show();
$(this).closest(".cont").find('.closecomment').show();
$(this).closest(".mainCon").find('.cont').toggleClass("active");
$(this).closest(".mainCon").find('.cont').toggleClass("cont");
$(this).closest(".mainCon").find('.join').toggleClass("active2");
$(this).closest(".mainCon").find('.join').toggleClass("join");
});
/*CLOSE COMMENT SECTION */
$(".closecomment").on('click', function(event){
event.stopPropagation();
event.stopImmediatePropagation();
$(this).closest(".active").find('.cmessage').hide();
$(this).closest(".active").find('.leavemsg').hide();
$(this).closest(".active").find('.closecomment').hide();
$(this).closest(".mainCon").find('.active').toggleClass("cont");
$(this).closest(".mainCon").find('.cont').toggleClass("active");
$(this).closest(".mainCon").find('.active2').toggleClass("join");
$(this).closest(".mainCon").find('.join').toggleClass("active2");


});

/*
'http://studenter.miun.se/~rese1800/dt093g/projekt/images/read.svg',
'http://studenter.miun.se/~rese1800/dt093g/projekt/images/write.svg',
'http://studenter.miun.se/~rese1800/dt093g/projekt/images/share.svg',
'http://studenter.miun.se/~rese1800/dt093g/projekt/images/blogspace.svg'
*/

container.style.display = 'none';
d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/read.svg"/></div>';
latestPosts.style.display = 'none';

window.onscroll = function (e) {
    if(d2cont.style.display == 'none'){
        d2cont.style.display = 'block';
        var scroll = $(".scroll-indicator");
        for(var i = 0; i<scroll.length; i++){
        scroll[i].style.display = 'block';
        }
    }
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    if (scrollTop > 0) {
        for (var i = 0; i < list.length; i++) {
            list[i].style.color = "#f2709c";
            list[i].style.transition = "0.3s ease-in-out";
        }
        latestPosts.style.display = 'none';
        
        d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/read.svg"/></div>';
        logo.style.display = 'none';
    }
if (scrollTop > 350) {

    for (var i = 0; i < list.length; i++) {
        list[i].style.color = "#f2709c";
        list[i].style.transition = "0.3s ease-in-out";
    }
    latestPosts.style.display = 'none';
    d2cont.style.display = 'block';
    d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/write.svg"/></div>';
    logo.style.display = 'none';

}
if (scrollTop > 700) {

    for (var i = 0; i < list.length; i++) {
        list[i].style.color = "#f2709c";
        list[i].style.transition = "0.3s ease-in-out";
    }
    latestPosts.style.display = 'none';
    d2cont.style.display = 'block';
    d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/share.svg" /></div>';
    logo.style.display = 'none';

}
if (scrollTop > 1000) {
    latestPosts.style.display = 'none';
    d2cont.style.display = 'block';
    d2cont.innerHTML = '<div class="d2"><img id="bs" src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/blogspace.svg" /></div>';
    logo.style.display = 'none';

}
if (scrollTop > 1500) {
    latestPosts.style.zIndex = '2';
    latestPosts.style.display = 'block';
    $("#latestPosts").fadeIn()
        .css({ top: 1000, position: 'fixed' })
        .animate({ top: 120 }, 0, function () {
        });
    d2cont.style.display = 'none';
    logo.style.display = 'block';
}
}

}