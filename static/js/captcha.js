var captcha;
function generatec() {

	// Clear old input
	document.getElementById("submit-cap").value = "";

	// Access the element to store
	// the generated captcha
	captcha = document.getElementById("image-cap");
	var uniquechar = "";

	const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of
	// 5 with random character
	for (let i = 1; i < 5; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function checkCap() {
	const usr_input = document
		.getElementById("submit-cap").value;
	
	// Check whether the input is equal
	// to generated captcha or not
	if (usr_input == captcha.innerHTML) {
		
		generate();
		return true;
	}
	else {
		alert('Sai mã xác nhận');
		generate();
		return false;
	}
}
