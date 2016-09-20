function displayjoke() {
	alert("How many programmers does it take to change a light bulb?\n\nNone. It's a hardware problem.");
}
var joke  = document.getElementById('joke');
joke.addEventListener ('click', displayjoke, true);
