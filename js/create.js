var create = document.getElementById('createform');
var cp1 = document.getElementById('cpassword');
var cp2 = document.getElementById('copassword');
var errmsg2 = document.getElementsByClassName('errmsg2');
var sign = document.getElementById('sign'); //LOG IN BTN RIGHT CORNER
var signIn = document.getElementById('signIn'); //SIGN IN WINDOW
var errmsg = document.getElementById('errmsg');
/*CHECK IF INPUTS ARE EMPTY */

$('#createform').submit(function () {
	if ($.trim($("#cusername").val()) === "" || $.trim($("#cpassword").val()) === "" || $.trim($("#cname").val()) === ""|| $.trim($("#clast").val()) === "" || $.trim($("#copassword").val()) === "") {
		errmsg.innerHTML = '<p>Please enter your sign in info</p>';
		return false;
	}else if(cp1.value != cp2.value){
		errmsg.innerHTML = "<p>Your passwords doesn't match</p>";
		return false;
	}
});
/*CREATE ACCOUNT */
$("#create").click(function () {
	signIn.style.display = 'block';
	document.getElementById('Fform').style.display = 'none';
	document.getElementById('logform').style.display = 'none';
	d2cont.style.display = 'none';
	latestPosts.style.display = 'none';
	create.style.display = 'block';
	for (var i = 0; i < list.length; i++) {
		list[i].style.display = 'none';
	}
	var scroll = $(".scroll-indicator");
	for(var i = 0; i<scroll.length; i++){
	scroll[i].style.display = 'none';
	}
});


