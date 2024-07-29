function changeValue(newVal, id) {
	let left = document.getElementById("colleft" + id);
	left.innerHTML = 100 - newVal;
	left.innerHTML += "%";
	let vRed, vGreen, vBlue;
	vBlue = 0;
	if (newVal >= 50) {
		vRed = 4 * newVal - 200;
		vGreen = 0;
	} else {
		vGreen = 200 - 4 * newVal;
		vRed = 0;
	}
	left.style.color = "rgb(" + vRed + ", " + vGreen + ", " + vBlue + ")";
	let right = document.getElementById("colright" + id);
	right.innerHTML = newVal;
	right.innerHTML += "%";
	if (newVal < 50) {
		vRed = 200 - 4 * newVal;
		vGreen = 0;
	} else {
		vGreen = 4 * newVal - 200;
		vRed = 0;
	}
	right.style.color = "rgb(" + vRed + ", " + vGreen + ", " + vBlue + ")";
}