window.onload = function () {
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
    var d2 = document.getElementById('d2');
    var scroll2 = document.getElementsByClassName('scroll-indicator');
    
    
/*CHECK IF INPUTS ARE EMPTY */

function validate(){
	if ($.trim($(".comname").val()) === "" || $.trim($(".comemail").val()) === "" || $.trim($(".comcomment").val()) === "") {
		$(this).closest(".leavemsg").find('.errmsg2').html("<p>Don't leave anything empty</p>");

		return false;
	}
};


/*SHOW COMMENT SECTION ON CLICK */
$(".comment").on('click', function(event){
    //event.stopPropagation();
   // event.stopImmediatePropagation();
  
   	$(this).closest(".cont").find('.leavemsg').show();
	$(this).closest(".cont").find('.closecomment').show();
	$(this).closest(".cont").find('.cmessageRep').show();
	$(this).closest(".cont").find('.cmessage').show();
	$(this).closest(".mainCon").find('.cont').toggleClass("active");
	$(this).closest(".mainCon").find('.cont').toggleClass("cont");
	$(this).closest(".mainCon").find('.join').toggleClass("active2");
	$(this).closest(".mainCon").find('.join').toggleClass("join");
	$(this).closest(".cont").find('.closecomment').animate({ scrollTop:1500});

});


/*SHOW COMMENTS ON CLICK */
$(".numberOfComments").on('click', function(event){
    event.stopPropagation();
	event.stopImmediatePropagation();
	$(this).closest(".cont").find('.leavemsg').show();
	$(this).closest(".cont").find('.closecomment').show();
	$(this).closest(".cont").find('.cmessage').show();
	$(this).closest(".cont").find('.cmessageRep').show();
	$(this).closest(".mainCon").find('.cont').toggleClass("active");
	$(this).closest(".mainCon").find('.cont').toggleClass("cont");
	$(this).closest(".mainCon").find('.join').toggleClass("active2");
	$(this).closest(".mainCon").find('.join').toggleClass("join");
	$(this).closest(".cont").find('.closecomment').animate({ scrollTop:1500});
});
/*CLOSE COMMENT SECTION */
$(".closecomment").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
	$(this).closest(".active").find('.cmessage').hide();
	$(this).closest(".active").find('.cmessageRep').hide();
	$(this).closest(".active").find('.leavemsg').hide();
	$(this).closest(".active").find('.closecomment').hide();
	$(this).closest(".mainCon").find('.active').toggleClass("cont");
	$(this).closest(".mainCon").find('.cont').toggleClass("active");
	$(this).closest(".mainCon").find('.active2').toggleClass("join");
	$(this).closest(".mainCon").find('.join').toggleClass("active2");
});

/*JUMP ON CLICK "Latest posts" */

$("#jumpToLatest").click(function () {
	$('html,body').animate({
		scrollTop: 1550
	},
		'fast');
});

$("#arrow").click(function () {
	window.location.replace("create.php");
});
$("#arrow").click(function () {
	signIn.style.display = 'block';
	document.getElementById('Fform').style.display = 'none';
	document.getElementById('logform').style.display = 'none';
	d2cont.style.display = 'none';
	latestPosts.style.display = 'none';
	create.style.display = 'block';
	for (var i = 0; i < list.length; i++) {
		list[i].style.display = 'none';
	}
});
    
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
    if (scrollTop > 300) {
    
        for (var i = 0; i < list.length; i++) {
            list[i].style.color = "#f2709c";
            list[i].style.transition = "0.3s ease-in-out";
        }
        latestPosts.style.display = 'none';
        d2cont.style.display = 'block';
        d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/write.svg"/></div>';
        logo.style.display = 'none';
    
    }
    if (scrollTop > 600) {
    
        for (var i = 0; i < list.length; i++) {
            list[i].style.color = "#f2709c";
            list[i].style.transition = "0.3s ease-in-out";
        }
        latestPosts.style.display = 'none';
        d2cont.style.display = 'block';
        d2cont.innerHTML = '<div class="d2"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/share.svg" /></div>';
        logo.style.display = 'none';
    
    }
    if (scrollTop > 900) {
        latestPosts.style.display = 'none';
        d2cont.style.display = 'block';
        d2cont.innerHTML = '<div class="d2"><img id="bs" src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/blogspace.svg" /></div>';
        logo.style.display = 'none';
    
    }
    if (scrollTop > 1400) {
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
    
if(window.location.href.indexOf("leavemsg") > -1) {
    $("#latestPosts").fadeIn()
    .css({ top: 1000, position: 'fixed' })
    .animate({ top: 120 }, 0, function () {
    });
    latestPosts.style.zIndex = '2';
    latestPosts.style.display = 'block';
    d2cont.style.display = 'none';
    logo.style.display = 'block';
    for(var i = 0; i<scroll2.length; i++){
        scroll2[i].style.display = 'none';
        }
	logo.style.display = 'inline';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
    }
    var x = document.getElementById('leavemsg');
    x.scrollIntoView();
        
 }
 if(window.location.href.indexOf("user") > -1) {
    $("#latestPosts").fadeIn()
    .css({ top: 1000, position: 'fixed' })
    .animate({ top: 120 }, 0, function () {
    });
    latestPosts.style.zIndex = '2';
    latestPosts.style.display = 'block';
    d2cont.style.display = 'none';
    logo.style.display = 'block';
    for(var i = 0; i<scroll2.length; i++){
        scroll2[i].style.display = 'none';
        }
	logo.style.display = 'inline';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
    }
    var x = document.getElementById('jump');
    x.scrollIntoView();
 }
    }