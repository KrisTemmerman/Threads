/*
 * @author Joeri Hermans
 * @date 8 March 2010
 * @description Main javascript file for Threads.
 */

//Settings

//Host base address.
var base = "http://192.168.1.2:8888/threadsv21/src/";

//Dialog
var dialogOverlayHeight = screen.height;
var dialogHeight = $('.dialog_container').height();
var dialogTop = null;
dialogOverlayHeight = dialogOverlayHeight/2 - ((dialogOverlayHeight/2)/2);
dialogHeight = (dialogHeight/2) - 2;
dialogTop = dialogOverlayHeight - dialogHeight - 75;
if(dialogTop < 10){
	dialogTop = 20;
}
$('.dialog_container').css({'top':dialogTop});

//End Settings

/*
 * Begin Functions
 * @date 9 March 2010
 */

function showAjax(){
	
	$('.ajax').show();
	
}

function hideAjax(){
	
	$('.ajax').hide();
	
}

//When AJAX starts => Show the loader.
$('*').ajaxStart(function(){
	
	showAjax();
	
});

//When AJAX stops => Hide the loader.
$('*').ajaxStop(function(){
	
	hideAjax();
	
});

function showDialog(html){
	
	$('.dialog_body').html(html);
	
	$('.dialog_container').css({'display':'inline-block'});
	
}

function hideDialog(){
	
	$('.dialog_container').hide();
	$('.dialog_buttons .ok').css({'display':'none'});
	$('.dialog_buttons .close').css({'display':'none'});
	
}

/*
 * End Function
 */

$(document).ready(function(){
	
	/*
	 * Begin Document Settings
	 */
	
	$('#dashFirst').load(base + 'dash-ra.php');
	$('#dashSec').load(base + 'dash-rss.php');
	$('#clientSec').load(base + 'client-search.php');
	
	//When a user clicks the 'Add Content' - button.
	$('.navAddContent').click(function(){
		
		var html = '<p>Ik ondersteun dit nog helemaal niet, jonge toch!</p>';
		
		showDialog(html);
		
	});
	
	/*
	 * End Document Settings
	 */
	
	/*
	 * Begin Extra Navigation Code
	 */
	
	$('#extraNavLeft li a').click(function(){
		
		$('#extraNavLeft *').removeClass('selected');
		$(this).addClass('selected');
		var page = $(this).attr('name');
		$('.moduleLeft').load(base + page);
		
	});
	
	$('#extraNavRight li a').click(function(){
		
		$('#extraNavRight *').removeClass('selected');
		$(this).addClass('selected');
		var page = $(this).attr('name');
		$('.moduleRight').load(base + page);
		
		
	});
	
	/*
	 * End Extra Navigation Code
	 */
	
});