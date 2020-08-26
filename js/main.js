window.onload = function () {
	jQuery(window).resize(function () {

		var winwidth = jQuery(window).width();
		if(winwidth < 1245){
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
		var username = document.getElementById('username');
		var password = document.getElementById('pawwsord');
		var fp = document.getElementById('signInner');
		var create = document.getElementById('createform');
		var d2 = document.getElementById('d2');
		var cp1 = document.getElementById('cpassword');
		var cp2 = document.getElementById('copassword');
		var d2cont = document.getElementById('d2cont');
		var errmsg2 = document.getElementsByClassName('errmsg2');
		var sign = document.getElementById('sign'); //LOG IN BTN RIGHT CORNER
var signIn = document.getElementById('signIn'); //SIGN IN WINDOW
var errmsg = document.getElementById('errmsg');
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

var scroll2 = document.getElementsByClassName('scroll-indicator');
    
    
/*CHECK IF INPUTS ARE EMPTY */

function validate(){
	if ($.trim($(".comname").val()) === "" || $.trim($(".comemail").val()) === "" || $.trim($(".comcomment").val()) === "") {
		$(this).closest(".leavemsg").find('.errmsg2').html("<p>Don't leave anything empty</p>");

		return false;
	}
};

if(window.location.href.indexOf("leavemsg") > -1) {
	logo.style.display = 'inline';
//	d2.style.visibility = 'hidden';
//	canvas.style.visibility = 'hidden';
	latestPosts.style.zIndex = '2';
	$("#latestPosts").fadeIn()
		.css({ top: 1000, position: 'fixed' })
		.animate({ top: 120 }, 0, function () {
		});
	container.style.display = 'none';
	d2.style.display = 'none';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
    }
    for(var i = 0; i<scroll2.length; i++){
        scroll2[i].style.display = 'none';
        }
 }
 if(window.location.href.indexOf("user") > -1) {
    for(var i = 0; i<scroll2.length; i++){
        scroll2[i].style.display = 'none';
        }
  
	logo.style.display = 'inline';
	//d2.style.visibility = 'hidden';
//	canvas.style.visibility = 'hidden';
	latestPosts.style.zIndex = '2';
	$("#latestPosts").fadeIn()
		.css({ top: 1000, position: 'fixed' })
		.animate({ top: -120 }, 500, function () {
		});
		container.style.display = 'none';
		//d2.style.display = 'none';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
	}
	var x = document.getElementById('jump');
	x.scrollIntoView();
 }
 if(window.location.href.indexOf("jmp") > -1) {
	logo.style.display = 'inline';
//	d2.style.visibility = 'hidden';
//	canvas.style.visibility = 'hidden';
	latestPosts.style.zIndex = '2';
	$("#latestPosts").fadeIn()
		.css({ top: 1000, position: 'fixed' })
		.animate({ top: 120 }, 0, function () {
		});
	container.style.display = 'none';
	d2.style.display = 'none';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
    }
    for(var i = 0; i<scroll2.length; i++){
        scroll2[i].style.display = 'none';
        }
 }

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
		if (scrollTop >600) {
	
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
		}
	 }).resize()
		var width = $(window).width();
	

function design2(){

    var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
    if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1|| width < 1245){
		window.location.replace("indeex.php");
	
	}else{

function createElementOnDom(type, id) {
	var element = document.createElement(type);
	element.id = id;
	return element;
}
/*-----------------------------------------------CHROME / EDGE / SAFARI --------------------------------------------------------*/
var canvas = createElementOnDom('canvas', 'myCanvas');
var errmsg = document.getElementById('errmsg');
var sceneMousePosition = new THREE.Vector3(0, 0, 0);
var container = document.getElementById('container');
var menulist = document.getElementsByTagName("UL")[0];
var list = menulist.getElementsByTagName("LI");
var latestPosts = document.getElementById('latestPosts');
var ctx = canvas.getContext('2d');
var logo = document.getElementById('logo');

var options = {
	dotSize: 7,
	density: 10,
	resolution: 250,
	nerve: 0,
	twitchDist: 2,
	amount: 10000,
	mouse: new THREE.Vector3(10000, 10000, -1),
};

canvas.width = options.resolution;
canvas.height = options.resolution;

function loadImages(paths, whenLoaded) {
	var imgs = [];
	var loadedImgsCounter = 0;
	paths.forEach(function (path, i) {
		var img = new Image;
		img.setAttribute('crossOrigin', '');
		img.onload = function () {
			if (img.complete) {
				imgs[i] = img;
				loadedImgsCounter++;
				if (loadedImgsCounter == paths.length) {
					whenLoaded(imgs)
				};
			}

		}
		img.src = path;
	});
}

function fillUp(array, max) {
	var length = array.length;
	var counter = 0;
	if (length > max) {
		for (; array.length > max;) {
			length = array.length;
			for (i = 0; i < length - max; i++) {
				array.splice(Math.floor(Math.random() * length), 1);
			}
		}
	} else {
		for (i = 0; i < max - length; i++) {
			array.push(array[Math.floor(Math.random() * length)])
		}
	}
	return array;
}

function shuffle(a) {
	for (var i = a.length; i; i--) {
		var j = Math.floor(Math.random() * i);
		[a[i - 1], a[j]] = [a[j], a[i - 1]];
	}
	return a;
}

function drawImageScaled(img, context) {
	context = context || ctx;
	var canvas = context.canvas;
	var hRatio = canvas.width / img.width;
	var vRatio = canvas.height / img.height;
	var ratio = Math.min(hRatio, vRatio);
	var centerShift_x = (canvas.width - img.width * ratio) / 2;
	var centerShift_y = (canvas.height - img.height * ratio) / 2;
	context.clearRect(0, 0, canvas.width, canvas.height);
	context.drawImage(img, 0, 0, img.width, img.height,
		centerShift_x, centerShift_y, img.width * ratio, img.height * ratio);
}
function clearScene(arg) {
	while (scene.children.length > 0) {
		scene.remove(scene.children[0]);
	}
}
function drawCurrentImgOnCanvas(argument) {
	loadImages(images, function (imgs) {
		drawImageScaled(imgs[currentImage], ctx);
	});
}
function getArrayFromImage(img) {
	var imageCoords = [];
	//ctx.clearRect(0, 0, options.resolution, options.resolution);

	img.prop = img.height / img.width;

	drawImageScaled(img, ctx);
	var data = ctx.getImageData(0, 0, options.resolution, options.resolution);
	data = data.data;

	for (var y = 0; y < options.resolution; y++) {
		for (var x = 0; x < options.resolution; x++) {
			var red = data[((options.resolution * y) + x) * 4];
			var green = data[((options.resolution * y) + x) * 4 + 1];
			var blue = data[((options.resolution * y) + x) * 4 + 2];
			var alpha = data[((options.resolution * y) + x) * 4 + 3];
			if (alpha > 0) {
				imageCoords.push({
					x: options.density * (x - options.resolution / 2),
					y: options.density * (options.resolution / 2 - y),
					red: red,
					green: green,
					blue: blue
				});
			}
		}
	}
	return shuffle(fillUp(imageCoords, options.amount));
}
var images = [
	/*
	'http://studenter.miun.se/~rese1800/dt093g/projekt/images/read.svg',
	'http://studenter.miun.se/~rese1800/dt093g/projekt/images/write.svg',
	'http://studenter.miun.se/~rese1800/dt093g/projekt/images/share.svg',
	'http://studenter.miun.se/~rese1800/dt093g/projekt/images/blogspace.svg'
	*/
	'./images/read.svg',
	'./images/write.svg',
	'./images/share.svg',
	'./images/blogspace.svg'


];
var camera, controls, scene, renderer, geometry, currentImage = 0, galleryData = [];

function createScene(argument) {
	var texture = (new THREE.TextureLoader).load("https://cdn.rawgit.com/akella/dots-animation/b9abad87/img/particle.png");
	var material = new THREE.PointsMaterial({
		size: options.dotSize,
		vertexColors: THREE.VertexColors,
		map: texture,
		alphaTest: 0.5
	});

	geometry = new THREE.Geometry();
	var x, y, z;
	galleryData[currentImage].forEach((el, index) => {
		geometry.vertices.push(new THREE.Vector3(
			el.x - Math.random() * 3,
			el.y - Math.random() * 3,
			Math.random() * (options.resolution / 4)
		));
		geometry.colors.push(new THREE.Color(el.red / 255, el.green / 255, el.blue / 255));
	});
	var pointCloud = new THREE.Points(geometry, material);
	scene.add(pointCloud);
}

function reinit(argument) {
	galleryData = [];
	loadImages(images, function (loadedImages) {

		loadedImages.forEach(function (el, index) {
			galleryData.push(getArrayFromImage(loadedImages[index]));

		});
		clearScene();
		createScene();
		drawCurrentImgOnCanvas();
	});
}

loadImages(images, function (loadedImages) {
	loadedImages.forEach(function (el, index) {
		galleryData.push(getArrayFromImage(loadedImages[index]));
	});
	function init() {
		scene = new THREE.Scene();
		//	scene.background = new THREE.Color(0x212121);
		//	scene.fog = new THREE.FogExp2( 0xcccccc, 0.0007 );
		renderer = new THREE.WebGLRenderer({ alpha: true });
		renderer.setPixelRatio(window.devicePixelRatio);
		renderer.setSize(window.innerWidth, window.innerHeight);
		var container = document.getElementById('container');
		container.appendChild(renderer.domElement);
		camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 1, 10000);
		camera.position.z = 1000;
		//controls = new THREE.OrbitControls(camera, renderer.domElement);
		createScene();
		window.addEventListener('resize', onWindowResize, false);
		var tlHello = new TimelineMax();
		tlHello
			.fromTo(scene.children[0].position, 2, { ease: Power2.easeIn, z: 1000 }, { z: 0 });
		canvas.style.display = "block";
		drawCurrentImgOnCanvas();
	} //init end
	function onWindowResize() {
		camera.aspect = window.innerWidth / window.innerHeight;
		camera.updateProjectionMatrix();
		renderer.setSize(window.innerWidth, window.innerHeight);
	}

	var i = 0;

	function animate() {
		i++;
		requestAnimationFrame(animate);
		geometry.vertices.forEach(function (particle, index) {
			var dX, dY, dZ;
			dX = Math.sin(i / 10 + index / 2 - Math.random() * options.nerve) / options.twitchDist;
			dY = Math.sin(i / 10 + index / 2 - Math.random() * options.nerve) / options.twitchDist;
			dZ = 0;
			particle.add(new THREE.Vector3(dX, dY, dZ));
		});
		geometry.verticesNeedUpdate = true;
		render();
	}
	function render() {
		renderer.render(scene, camera);
	}
	init();
	animate();
	drawCurrentImgOnCanvas();

	function dotsTransform(particle, index) {
		var TLOffset = new TimelineMax();
		TLOffset.to(particle, 1, { x: galleryData[currentImage][index].x, y: galleryData[currentImage][index].y });
		var TLColor = new TimelineMax();
		TLColor.to(geometry.colors[index], 1, {
			r: galleryData[currentImage][index].red / 255,
			g: galleryData[currentImage][index].green / 255,
			b: galleryData[currentImage][index].blue / 255,
			onUpdate: function () {
				geometry.colorsNeedUpdate = true;
			}
		});
	}
	geometry.vertices.forEach((particle, index) => dotsTransform(particle, index))
}
);
/*CHECK IF INPUTS ARE EMPTY */

function validate(){
	if ($.trim($(".comname").val()) === "" || $.trim($(".comemail").val()) === "" || $.trim($(".comcomment").val()) === "") {
		$(this).closest(".leavemsg").find('.errmsg2').html("<p>Don't leave anything empty</p>");

		return false;
	}
};

if(window.location.href.indexOf("leavemsg") > -1) {
	logo.style.display = 'inline';
	canvas.style.visibility = 'hidden';
	latestPosts.style.zIndex = '2';
	$("#latestPosts").fadeIn()
		.css({ top: 1000, position: 'fixed' })
		.animate({ top: 120 }, 0, function () {
		});
	container.style.display = 'none';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
	}
 }
 if(window.location.href.indexOf("user") > -1) {

	
	logo.style.display = 'inline';
	canvas.style.visibility = 'hidden';
	latestPosts.style.zIndex = '2';
	$("#latestPosts").fadeIn()
		.css({ top: 1000, position: 'fixed' })
		.animate({ top: 120 }, 0, function () {
		});
	container.style.display = 'none';
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
	}
	var x = document.getElementById('jump');
	x.scrollIntoView();
 }


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
		scrollTop: 1700
	},
		'fast');
});
$("#scroll-indicator").click(function () {
	$('html,body').animate({
		scrollTop: 1700
	},
		'fast');
});

$("#arrow").click(function () {
	window.location.replace("create.php");
});


	/*Change image on scroll */
	window.onscroll = function (e) {


		for (var i = 0; i < list.length; i++) {
			if (list[i].style.display == 'none') {
				list[i].style.display = 'inline';
			}
		}
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

		if (scrollTop > 0) {
			logo.style.display = 'none';
			currentImage++
			currentImage = 0;
			for (var i = 0; i < list.length; i++) {
				list[i].style.color = "#f2709c";
				list[i].style.transition = "0.3s ease-in-out";
			}
			latestPosts.style.display = 'none';
			container.style.display = 'block';

		}
		if (scrollTop > 250) {
			logo.style.display = 'none';
			currentImage++
			currentImage = 1;
			for (var i = 0; i < list.length; i++) {
				list[i].style.color = "#f2709c";
				list[i].style.transition = "0.3s ease-in-out";
			}
			latestPosts.style.display = 'none';
			container.style.display = 'block';
		}
		if (scrollTop > 700) {
			logo.style.display = 'none';
			currentImage++
			currentImage = 2;
			for (var i = 0; i < list.length; i++) {
				list[i].style.color = "#f2709c";
				list[i].style.transition = "0.3s ease-in-out";
			}
			for (var i = 0; i < list.length; i++) {
				list[i].style.color = "#f2709c";
				list[i].style.transition = "0.7s ease-in-out";
			}
			latestPosts.style.display = 'none';
			container.style.display = 'block';
		}
		if (scrollTop > 1200) {
			logo.style.display = 'none';
			currentImage++
			currentImage = 3;
			latestPosts.style.display = 'none!important';
			latestPosts.style.zIndex = '-1';
			container.style.display = 'block';
		}
		if (scrollTop > 1600) {
			logo.style.display = 'inline';
			canvas.style.visibility = 'hidden';
			latestPosts.style.zIndex = '2';
			$("#latestPosts").fadeIn()
				.css({ top: 1000, position: 'fixed' })
				.animate({ top: 120 }, 0, function () {
				});
			container.style.display = 'none';
		}
/*JUMP ON CLICK "Latest posts" */

$("#jumpToLatest").click(function () {
	$('html,body').animate({
		scrollTop: 1700
	},
		'fast');
});
$("#scroll-indicator").click(function () {
	$('html,body').animate({
		scrollTop: 1700
	},
		'fast');
});
$("#arrow").click(function () {
	window.location.replace("create.php");
});
		drawCurrentImgOnCanvas();
		function dotsTransform(particle, index) {
			var TLOffset = new TimelineMax();
			TLOffset.to(particle, 1, { x: galleryData[currentImage][index].x, y: galleryData[currentImage][index].y });
			var TLColor = new TimelineMax();
			TLColor.to(geometry.colors[index], 1, {
				r: galleryData[currentImage][index].red / 255,
				g: galleryData[currentImage][index].green / 255,
				b: galleryData[currentImage][index].blue / 255,
				onUpdate: function () {
					geometry.colorsNeedUpdate = true;
				}
			});
		}
		geometry.vertices.forEach((particle, index) => dotsTransform(particle, index))
	}};
}


design2()


}

	