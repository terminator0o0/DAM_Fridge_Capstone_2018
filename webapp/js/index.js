/*Index page*/

function init_page() {
	$("#ForgetPasswordContainer").hide();
	$("#SignUpContainer").hide();
}

function userClickEvent(Event) {
	var pressed = Event.data.pressed;

	if (pressed == "forgetPassword") {
		$("#SignInContainer").hide('slow');
		$("#ForgetPasswordContainer").show('slow');
	} else if (pressed == "register") {
		$("#SignInContainer").hide('slow');
		$("#SignUpContainer").show('slow');
	}
	else {
		console.log('None pressed');
	}
}

$("#ForgetPasswordLink").on("click", {
	pressed: "forgetPassword"
}, userClickEvent);

$("#SignUpLink").on("click", {
	pressed: "register"
}, userClickEvent);

$(document).ready(function() {
	init_page();
});