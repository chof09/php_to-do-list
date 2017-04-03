var edit_form = "<form action='update.php' class='edit-item' method='post'>"
					+"<input type='text' name='edit-item-field' id='edit-field'>"
					+"<input type='hidden' name='id-to-edit' id='edit-hidden'>"
					+"<input type='submit' value='Save' class='submit-change-btn'>"
				+"</form>";

function edit(counter, id) {
	var oldValue = document.getElementById(counter).innerHTML;
	document.getElementById(counter).innerHTML = edit_form;
	document.getElementById("edit-field").value = oldValue;
	document.getElementById("edit-hidden").value = id;
	document.getElementById("edit-field").focus();
	document.getElementById("edit-btn" + counter).innerHTML = "";
};

function show_edit_btn(number) {
	var editId = "edit-btn" + number;
	document.getElementById(editId).style.display = "inline";
};

function hide_edit_btn(number) {
	var editId = "edit-btn" + number;
	document.getElementById(editId).style.display = "none";
};