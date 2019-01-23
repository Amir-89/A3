// JavaScript Document
function checkRePassword(document) {
    var pwd = document.getElementById("password");
    var pwd_msg = document.getElementById('pwd_msg');
    var repwd = document.getElementById("rePassword");
    if (pwd.value != repwd.value) {
        pwd_msg.innerHTML = "The two passwords should be same.";
        repwd.value = "";
        pwd.focus();
        return false;
    }
    else {
        pwd_msg.innerHTML = "";
    }
    return true;
}

/*function checkZIPCode(document) {
    var zip = document.getElementById("zip");
    var zip_msg = document.getElementById("zip_msg");
    var isNum = /^[0-9]{4}$/.test(zip.value); // 4 digits
    if(!isNum) {
        zip_msg.innerHTML = "4 digits are required.";
        zip.focus();
        return false;
    }
    else {
        zip_msg.innerHTML = "";
    }
    return true;
}*/
function reset_frm(document) {
    document.getElementById('pwd_msg').innerHTML = "";
    document.getElementById("zip_msg").innerHTML = "";
}
function validateInfo(document) {
    if ( checkRePassword(document) && checkZIPCode(document) )
    {
        return true;
    }
    return false;
}

	function passwordCheck(document){
		var password=document.getElementById("password");
		var error_msg=document.getElementById("password_check");
		if (password.value.length <= 5) {
			error_msg.innerHTML="Please enter more than 6 characters";
			password.focus();
			return false; }
		else {
			password_check.innerHTML=""
			return true;
			}
	}


function checkGPA(document) {
    var gpa = document.getElementById("gpa").value;
    var gpa_msg = document.getElementById("gpa_msg");
    //var isNum = /^[0.00-9.00]$/.test(gpa.value); 
    if(isNaN(gpa) || gpa>7 || gpa<0) {
        gpa_msg.innerHTML = "GPA should be between 0 and 7";
        gpa.focus();
        return false;
    }
    else {
        gpa_msg.innerHTML = "";
    }
    return true;
}


function checkAge(document) {
    var age = document.getElementById("age").value;
    var age_msg = document.getElementById("age_msg");
    //var isNum = /^[0.00-9.00]$/.test(gpa.value); 
    if(isNaN(age) || age>100 || age<0) {
        age_msg.innerHTML = "Incorrect Age";
        age.focus();
        return false;
    }
    else {
        age_msg.innerHTML = "";
    }
    return true;
}