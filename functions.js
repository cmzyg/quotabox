function textareaValue() {
	var description = document.getElementById('description');
	if(description.value == '') {
		description.value = 'Description (Optional)';
	}
}

function textareaNoValue() {
	var description = document.getElementById('description');
	if(description.value == 'Description (Optional)') {
		description.value = '';
	}
}


function changeBorderName() {
	document.getElementById('name').style.borderColor = "green";
}

function returnBorderName() {
	document.getElementById('name').style.borderColor = "#828282";
}

function changeBorderSurname() {
	document.getElementById('surname').style.borderColor = "green";
}

function returnBorderSurname() {
	document.getElementById('surname').style.borderColor = "#828282";
}

function changeBorderEmail() {
	document.getElementById('email').style.borderColor = "green";
}

function returnBorderEmail() {
	document.getElementById('email').style.borderColor = "#828282";
}

function changeBorderPassword() {
	document.getElementById('password').style.borderColor = "green";
}

function returnBorderPassword() {
	document.getElementById('password').style.borderColor = "#828282";
}

function changeBorderDescription() {
	document.getElementById('description').style.borderColor= "green";
}

function returnBorderDescription() {
	document.getElementById('description').style.borderColor = "#828282";
}


function changeValueName() {
	var name = document.getElementById('name');
	var error = document.getElementById('hidden_error_name');
	if(name.value == 'Name') {
		name.value = '';
		name.style.border = "2px solid red";
		error.style.display = "block";
		error.style.color = "red";
	}
}

function returnValueName() {
	var name = document.getElementById('name');
	if(name.value == '') {
		name.value = 'Name';
	}
}

function changeValueSurname() {
	var name = document.getElementById('surname');
	if(name.value == 'Last Name') {
		name.value = '';
	}
}

function returnValueSurname() {
	var name = document.getElementById('surname');
	if(name.value == '') {
		name.value = 'Last Name';
	}
}

function changeValueEmail() {
	var name = document.getElementById('email');
	if(name.value == 'Email') {
		name.value = '';
	}
}

function returnValueEmail() {
	var name = document.getElementById('email');
	if(name.value == '') {
		name.value = 'Email';
	}
}

function changeValuePassword() {
	var name = document.getElementById('password');
	if(name.value == 'Password') {
		name.value = '';
	}
}

function returnValuePassword() {
	var name = document.getElementById('password');
	if(name.value == '') {
		name.value = 'Password';
	}
}




  function validateForm()
{
var errors_count = 0;
var name = document.forms["form1"]["name"].value;
var surname = document.forms["form1"]["surname"].value;
var password = document.forms["form1"]["password"].value;
var email = document.forms["form1"]["email"].value;
var hidden_error_name = document.getElementById('hidden_error_name2');
var hidden_error_surname = document.getElementById('hidden_error_surname2');
var hidden_error_password = document.getElementById('hidden_error_password2');
var hidden_error_email = document.getElementById('hidden_error_email2');

if (name == null || name == "") {
	hidden_error_name.style.display="inline";
    errors_count++;
}
if (surname == null || surname == "") {
	hidden_error_surname.style.display="inline";
    errors_count++;
}
if (email == null || email == "") {
	hidden_error_email.style.display="inline";
    errors_count++;
}
if (password == null || password == "") {
	hidden_error_password.style.display="inline";
    errors_count++;
}

return errors_count == 0;

}





  function validateLogin()
{
var errors_count = 0;
var email = document.forms["login_form"]["email"].value;
var password = document.forms["login_form"]["password"].value;

var hidden_error_email_login = document.getElementById('hidden_error_email_login2');
var hidden_error_password_login = document.getElementById('hidden_error_password_login2');

if (email == null || email == "") {
	hidden_error_email_login.style.display="inline";
    errors_count++;
}

if (password == null || password == "") {
	hidden_error_password_login.style.display="inline";
    errors_count++;
}

return errors_count == 0;

}

function removeError() {
	var name = document.getElementById('name');
	var surname = document.getElementById('surname');
	var email = document.getElementById('email');
	var password = document.getElementById('password');
	var hidden_error_name = document.getElementById('hidden_error_name2');
    var hidden_error_surname = document.getElementById('hidden_error_surname2');
    var hidden_error_password = document.getElementById('hidden_error_password2');
    var hidden_error_email = document.getElementById('hidden_error_email2');
	if(name.value !== null && name.value !== "") {
		hidden_error_name.style.display="none";
	}
	if(surname.value !== null && surname.value !== "") {
		hidden_error_surname.style.display="none";
	}
	if(password.value !== null && password.value !== "") {
		hidden_error_password.style.display="none";
	}
	if(email.value !== null && email.value !== "") {
		hidden_error_email.style.display="none";
	}
}

