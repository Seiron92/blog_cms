var inputName = $("#pname");
var inputLast = $("#plname");
var inputEmail =  $("#pemail");
var text =  $("#ptext");
var label = $("#label");
var image = $("#Pimage");
var subbut = $("#subbut");
var updt = $("#updP");


var hasBeenClicked = false;
jQuery('#updP').click(function(){
    hasBeenClicked = true;


  if((hasBeenClicked)){
    $("#pname").attr("readonly", false);
    $("#plname").attr("readonly", false);
    $("#pemail").attr("readonly", false);
    $("#ptext").attr("readonly", false);
    $("#label").css("display","block");
    $("#Pimage").css("display","block");
    $("#subbut").css("display","block");
    $("#updP").css("display","none");
/*STYLES */
$("#pname").css("border","2px solid white");
$("#plname").css("border","2px solid white");
$("#pemail").css("border","2px solid white");
$("#ptext").css("background"," white");
$("#ptext").css("color", "#ff9472");
$("#pname").css("cursor","text");
$("#plname").css("cursor","text");
$("#pemail").css("cursor","text");
$("#ptext").css("cursor","text");


  }else {
    $("#pname").attr("readonly", true);
    $("#plname").attr("readonly", true);
    $("#pemail").attr("readonly", true);
    $("#ptext").attr("readonly", true);
    $("#label").css("display","none");
    $("#Pimage").css("display","none");
    $("#subbut").css("display","none");
    $("#updP").css("display","block");

};

});
$("#pname").attr("readonly", true);
$("#plname").attr("readonly", true);
$("#pemail").attr("readonly", true);
$("#ptext").attr("readonly", true);
$("#label").css("display","none");
$("#Pimage").css("display","none");
$("#subbut").css("display","none");
$("#updP").css("display","block");
