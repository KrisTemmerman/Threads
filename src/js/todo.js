/*
 * @author Joeri Hermans
 * @date 11 March 2010
 * @description Javascript file for Dashboard ToDo.
 */

function nextDate(str){
	var myArray = [];
	myArray = str.split("-");
	var day = parseInt(myArray[2]) + 1;
	var date = myArray[0].toString() + '-' + myArray[1].toString() + '-' + day.toString();
	$('.moduleLeft').load(base + 'dash-todo.php',{'todoDate':date});
	return false;
}

function previousDate(str){
	
	var myArray = [];
	myArray = str.split("-");
	var day = parseInt(myArray[2]) - 1;
	var date = myArray[0].toString() + '-' + myArray[1].toString() + '-' + day.toString();
	$('.moduleLeft').load(base + 'dash-todo.php',{'todoDate':date});
	return false;
	
}

$(document).ready(function(){
	
	//Show modal when the user clicks the delete button.
	$('.todo_container .body .day ul li .delete').click(function(){
		var id = $(this).attr('id').replace('tododelete-','');
		var parent = $(this).parent();
		var value = parent.children(".item").text();
		$('.dialog_buttons .ok').css({'display':'inline-block'});
		showDialog('<p>Are you sure you want to delete this ToDo?</p><p style="text-align:center;"><strong>"' + value + '"</strong></p>');
		$('dialog_buttons .close').click(function(){
			hideDialog();
			return false;
		});
		$('.dialog_buttons .ok').click(function(){
			hideDialog();
			$.ajax({
				type:'post',
				data:{'todoRemoveId':id},
				success: function(){
					parent.remove();
				},
				error: function(){
					showDialog('<p>An error ocurred while updating this todo. Please try again.</p>');
				}
			});
			return false;
		});
	});
	
	//Handles the action when the user clicks on a ToDo.
	$('.todo_container .body .day ul li .item').click(function(){
		var id = $(this).attr('id').replace('todoid-','');
		var current = $(this);
		if( $(this).hasClass('done') ){
			$.ajax({
				type:'post',
				data:{'todoRemoveDoneId':id},
				success: function(){
					current.removeClass('done');
				},
				error: function(){
					showDialog('<p>An error ocurred while updating this todo. Please try again.</p>');
				}
			});
		} else {
			$.ajax({
				type:'post',
				data:{'todoAddDoneId':id},
				success: function(){
					current.addClass('done');
				},
				error: function(){
					showDialog('<p>An error ocurred while updating this todo. Please try again.</p>');
				}
			});
		}
		return false;
	});
	
	$('.ToDoInsert').focus(function(){
		var value = $(this).val();
		$(this).val('');
		$(this).blur(function(){
			if( $(this).val() == '' ){
				$(this).val(value);
			}
		});
	});
		
	$('.ToDoInsert').bind('keypress', function(e) {
		 if (e.keyCode == 13) { //When the user hits the return button.
			 var value = $(this).val();
			 var date = $('#todoDateRefer').val();
			 var current = $(this);
			 $(this).attr("disabled", true);
			 $.ajax({
				 type:'post',
				 data:{'ToDoAddListItem':value,'ToDoAddListItemDate':date},
				 success: function(){
					 current.attr("disabled", false);
					 $('.moduleLeft').load(base + 'dash-todo.php',{'ToDoDateRefer':date});
				 },
				 error: function(){
					 showDialog('<p>An error ocurred while updating this todo. Please try again.</p>');
					 return false;
				 }
			 });
			 return false;
		 }
	});
	
}); //End Document Ready.