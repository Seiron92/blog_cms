var textarea = document.getElementById('textarea');
var comments = document.getElementsByClassName('noc');
var commetsrecieved = document.getElementById('commetsrecieved');


    $('.writeForm').submit(function () {
        if ($.trim($(".title").val()) === "") {
            $(this).closest(".writePostIn").find('.errmsg2').html("<p>Don't leave anything empty</p>");
    
            return false;
        }
    });

    $(".update").on('click', function(event){
      event.stopPropagation();
      event.stopImmediatePropagation();
      $(this).closest(".cont").find('.leavemsg').show();
      $(this).closest(".cont").find('.closecomment').show();
      $(this).closest(".cont").find('.cmessage').hide();
      $(this).closest(".cont").find('.updateForm').show();
      $(this).closest(".mainCon").find('.cont').toggleClass("active");
      $(this).closest(".mainCon").find('.cont').toggleClass("cont");
      $(this).closest(".mainCon").find('.join').toggleClass("active2");
      $(this).closest(".mainCon").find('.join').toggleClass("join");
  });
  $(".closeUpd").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
	$(this).closest(".active").find('.leavemsg').hide();
	$(this).closest(".active").find('.closeUpd').hide();
	$(this).closest(".mainCon").find('.active').toggleClass("cont");
	$(this).closest(".mainCon").find('.cont').toggleClass("active");
	$(this).closest(".mainCon").find('.active2').toggleClass("join");
	$(this).closest(".mainCon").find('.join').toggleClass("active2");
});

/*SHOW COMMENTS ON CLICK */
$(".numberOfComments").on('click', function(event){
  event.stopPropagation();
event.stopImmediatePropagation();
$(this).closest(".cont").find('.updateForm').hide();
$(this).closest(".cont").find('.textarea1').hide();
$(this).closest(".cont").find('.reply').css('display', 'inline');
$(this).closest(".cont").find('.commentDelete').show();
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
/*CLOSE COMMENT SECTION */
$(".closecomment").on('click', function(event){
  event.stopPropagation();
  event.stopImmediatePropagation();
  $(this).closest(".active").find('.commentDelete').hide();
$(this).closest(".active").find('.cmessage').hide();
$(this).closest(".active").find('.cmessageRep').hide();
$(this).closest(".active").find('.leavemsg').hide();
$(this).closest(".active").find('.closecomment').hide();
$(this).closest(".active").find('.rep').hide();
$(this).closest(".mainCon").find('.active').toggleClass("cont");
$(this).closest(".mainCon").find('.cont').toggleClass("active");
$(this).closest(".mainCon").find('.active2').toggleClass("join");
$(this).closest(".mainCon").find('.join').toggleClass("active2");
});




$(".repOut").on('click', function(event){
  event.stopPropagation();
event.stopImmediatePropagation();

$(this).closest(".active").find('.updateForm').hide();
$(this).closest(".active").find('.commentDelete').hide();
$(this).closest(".active").find('.reply').hide();
$(this).closest(".active").find('.reply').css('display', 'none');
$(this).closest(".active").find('.leavemsg').show();
$(this).closest(".active").find('.closecomment').show();
$(this).closest(".active").find('.cmessageRep').show();
$(this).closest(".active").find('.cmessage').show();
$(this).closest(".active").find('.rep').show();
$(this).closest(".mainCon").find('.cont').toggleClass("active");
$(this).closest(".mainCon").find('.cont').toggleClass("cont");
$(this).closest(".mainCon").find('.join').toggleClass("active2");
$(this).closest(".mainCon").find('.join').toggleClass("join");
$(this).closest(".cont").find('.closecomment').animate({ scrollTop:1500});
});


var counter = 0;

for (var i=0; i<comments.length; i++){ 
  counter += parseFloat(comments[i].innerHTML);
  commetsrecieved.innerHTML = '<li>Comments recieved : <b>' +counter + '</b></li>';
}