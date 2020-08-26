$('#logform').submit(function () {
	if ($.trim($("#username").val()) === "" || $.trim($("#password").val()) === "") {
		errmsg.innerHTML = '<p>Please enter your sign in info</p>';
		return false;
	}
});
$('#change').submit(function () {
	if ($.trim($("#chemail").val()) === "" || $.trim($("#chpassword").val()) === "" || $.trim($("#cohpassword").val()) === "") {
		errmsg.innerHTML = '<p>Please fill all the fields</p>';
		return false;
	}
});
$('#Fform').submit(function () {
	if ($.trim($("#forgotEmail").val()) === "") {
		errmsg.innerHTML = '<p>Please enter your E-mail</p>';
		return false;
	}
});
$("#forgot").click(function () {
	create.style.display = 'none';
	document.getElementById('Fform').style.display = 'block';
	document.getElementById('logform').style.display = 'none';
	$("#exit").click(function () {
		document.getElementById('logform').style.display = 'block';
		document.getElementById('Fform').style.display = 'none';
	create.style.display = 'none';
	});
});