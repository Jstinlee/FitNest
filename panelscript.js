$(window, document, undefined).ready(function() {

	//For Input Label

  $('input, textarea').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  if ($('input, textarea').val())
    $('input, textarea').addClass('used');
  else
    $('input, textarea').removeClass('used');


	//Div expand collapse

	$(".header").click(function () {

		$header = $(this);
		//getting the next element
		$content = $header.next();
		//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
		$content.slideToggle(500);

	});

	var parent, ink, d, x, y;
	$(".papercard .paper .header").click(function(e){
		parent = $(this);
		//create .ink element if it doesn't exist
		if(parent.find(".ink").length == 0)
			parent.prepend("<span class='ink'></span>");

		ink = parent.find(".ink");
		//incase of quick double clicks stop the previous animation
		ink.removeClass("animate");

		//set size of .ink
		if(!ink.height() && !ink.width())
		{
			//use parent's width or height whichever is larger for the diameter to make a circle which can cover the entire element.
			d = Math.max(parent.outerWidth(), parent.outerHeight());
			ink.css({height: d, width: d});
		}

		//get click coordinates
		//logic = click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center;
		x = e.pageX - parent.offset().left - ink.width()/2;
		y = e.pageY - parent.offset().top - ink.height()/2;

		//set the position and add class .animate
		ink.css({top: y+'px', left: x+'px'}).addClass("animate");
		
	});
});

$(document).ready(function(){

    $('#div2').hide();

});


$(function(){
    
	$('.showSingle').click(function(){

        $('.targetDiv').hide();
        $('#div'+$(this).attr('target')).show();
    });
	
});

//Change image when upload new image at update profile page.

$(function () {
  $(":file").change(function () {
	  if (this.files && this.files[0]) {
		  var reader = new FileReader();
		  reader.onload = imageIsLoaded;
		  reader.readAsDataURL(this.files[0]);
	  }
  });
});

function imageIsLoaded(e) {
  $('#myImg').attr('src', e.target.result);
};



//Hide content when swap tab
function swapTab(event, tabName) {
    var i, tabcontent, tabtitle;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tabtitle = document.getElementsByClassName("tabtitle");
    for (i = 0; i < tabtitle.length; i++) {
        tabtitle[i].className = tabtitle[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("default").click();
document.getElementById("default").focus();

//check whether password entered twice is same
function check() {
    if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password Matched';

    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password does not match';

    }
    if(document.getElementById('password').value != document.getElementById('confirm_password').value){
        document.getElementById("updateBtn").disabled = true;
    }
    else{
      document.getElementById("updateBtn").disabled = false;
    }

}