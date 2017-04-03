var edit_form = "<form action='update.php' class='edit-item' method='post'>"
					+"<input type='text' name='edit-item-field' id='edit-field'>"
					+"<input type='hidden' name='id-to-edit' id='edit-hidden'>"
					+"<input type='submit' value='Save' class='submit-change-btn'>"
					+"<a href='javascript:void(0);' class='cancel-edit-btn' onclick='cancel_edit()'>Cancel</a>"
				+"</form>";

var oldValue, thisCounter, fullForm;

function edit(counter, id) {
	thisCounter = counter;
	oldValue = document.getElementById(counter).innerHTML;

	document.getElementById(counter).innerHTML = edit_form;
	document.getElementById("edit-field").value = oldValue;
	document.getElementById("edit-hidden").value = id;
	fullForm = document.getElementById(counter).innerHTML;
	document.getElementById("edit-field").focus();
	document.getElementById("edit-btn" + counter).style.display = "none";
};

function cancel_edit() {
	document.getElementById(thisCounter).innerHTML = oldValue;
	document.getElementById("edit-btn" + thisCounter).style.display = "inline";
}

function show_edit_btn(counter) {
	if (document.getElementById(counter).innerHTML != fullForm) {
		var editId = "edit-btn" + counter;
		document.getElementById(editId).style.display = "inline";
	};
};

function hide_edit_btn(counter) {
	if (document.getElementById(counter).innerHTML != fullForm) {
		var editId = "edit-btn" + counter;
		document.getElementById(editId).style.display = "none";
	};
};