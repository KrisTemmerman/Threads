/*
 * @author Joeri Hermans
 * @date 8 March 2010
 * @description Main javascript file for Threads.
 */

//Settings

//Host base address.
var base = "http://localhost:8888/threadsv21/src/";

//Dialog (This needs to be adjusted...)
var dialogOverlayHeight = screen.height;
var dialogHeight = $('.dialog_container').height();
var dialogTop = null;
dialogOverlayHeight = dialogOverlayHeight/2 - ((dialogOverlayHeight/2)/2);
dialogHeight = (dialogHeight/2) - 2;
dialogTop = dialogOverlayHeight - dialogHeight - 75;
if(dialogTop < 20){
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
	$('.dialog_buttons .ok').css({'display':'none'}).removeClass().addClass('ok');
	$('.dialog_buttons .close').css({'display':'none'}).removeClass().addClass('close');
	
}

//Check email pattern
function checkEmail(Str){
	
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(Str);
	
}

//Check if the string is not empty.
function checkLength(Str){
	
	if( Str.length != 0 ){
		return true;
	}
	return false;
	
}

/*
 * End Function
 */
	
/*
 * Begin Document Settings
 */

$('#dashFirst').load(base + 'dash-ra.php');
$('#dashSec').load(base + 'dash-rss.php');
$('#clientSec').load(base + 'client-search.php');

//When a user clicks the 'Add Content' - button.
$('.navAddContent').click(function(){
	
	var html = 
	'<ul class="addContentList">' +
		'<li id="addContentUser"><a href="#">Add User To Threads</a></li>' +
		'<li id="addContentClient"><a href="#">Add New Client</a></li>' +
		'<li id="addContentProduct"><a href="#">Add New Product</a></li>' +
		'<li id="addContentInvoice"><a href="#">Create New Invoice</a></li>' +
		'<li id="addContentFile"><a href="#">Upload A File</a></li>' +
		'<li id="addContentProject"><a href="#">Create New Project</a></li>'
	+ '</ul>';
	
	showDialog(html);
	
	$('#addContentUser').click(function(){
		
		$('.dialog_buttons .ok').addClass('addContentUser');
		var html = 
			'<label>Name</label><br /><input type="text" name="addContentUserName" /><br />' +
			'<label>Last Name</label><br /><input type="text" name="addContentUserLastName" /><br />' +
			'<label>Email</label><br /><input type="text" name="addContentUserEmail" /><br />' +
			'<label>Username</label><br /><input type="text" name="addContentUn" /><br />' +
			'<label>Password</label><br /><input type="text" name="addContentPw" /><br />' +
			'<label>Permission</label><br />' +
			'<select name="addContentUserPermission">' +
				'<option value="0">User</option>' +
				'<option value="1">Admin</option>' +
			'</select>';
			//Add select here
		$('.dialog_buttons .ok').css({'display':'inline-block'});
		var resetHtml = html;
		showDialog(html);
		
	});
	
});

$('.addContentUser').live('click',function(){
	
	var name = $('input[name="addContentUserName"]').val();
	var objName = $('input[name="addContentUserName"]');
	var lastName = $('input[name="addContentUserLastName"]').val();
	var objLastName = $('input[name="addContentUserLastName"]');
	var email = $('input[name="addContentUserEmail"]').val();
	var objEmail = $('input[name="addContentUserEmail"]');
	var username = $('input[name="addContentUn"]').val();
	var objUsername = $('input[name="addContentUn"]');
	var password = $('input[name="addContentPw"]').val();
	var objPassword = $('input[name="addContentPw"]');
	var permission = $('input[name="addContentUserPermission"]').val();
	if( checkLength(name) == false ){
		objName.addClass('error');
		return false;
	}
	objName.removeClass('error');
	if( checkLength(lastName) == false ){
		objLastName.addClass('error');
		return false;
	}
	objLastName.removeClass('error');
	if( checkEmail(email) == false ){
		objEmail.addClass('error');
		return false;
	}
	objEmail.removeClass('error');
	if( checkLength(username) == false ){
		objUsername.addClass('error');
		return false;
	}
	objUsername.removeClass('error');
	if( checkLength(password) == false ){
		objPassword.addClass('error');
		return false
	}
	objPassword.removeClass('error');
	$.post(base + "userAvailability.php",{'addContentUn':username,'addContentUserEmail':email},function(data){
		
		if( data == 'yes' ){
			
			html = '<p style="text-align:center;">A user with this email-address or username allready exist.</p>' + resetHtml;
			showDialog(html);
			$('input[name="addContentUserName"]').val(name);
			$('input[name="addContentUserLastName"]').val(lastName);
			$('input[name="addContentUserEmail"]').addClass('error');
			$('input[name="addContentUn"]').addClass('error');
			
		} else {
			
			$.ajax({
				type:'post',
				data:{'addContentUserName':name,'addContentUserLastName':lastName,'addContentUserEmail':email,'addContentUn':username,'addContentPw':password,'addContentUserPermission':permission},
				success: function(){
					$('.addContentUser').removeClass('addContentUser');
					$('.dialog_buttons .ok').css({'display':'none'});
					showDialog('<p>An email has been send to <strong>' + name + ' ' + lastName + '</strong> with his/her username and password.</p>');
				},
				error: function(){
					showDialog('<p>An error occured while inserting <strong>' + name + ' ' + lastName + '</strong> to the database.');
				}
			});
			
		}
		
	});
	
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