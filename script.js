function start() {
	let navBody = document.getElementById("Body");
	const leftAttrs = ["", "Heart on Sleeve", "Confident", "Cautious", "Library", "Wolf Pack", "Peacemaker", "Spiritual", "Leader",
			  "Guard dog", "Compassionate"];
	const rightAttrs = ["", "Poker Face", "Needs Reassurance", "Daring", "Dojo", "Lone Wolf", "Firebrand", "Skeptical", "Facilitator",
			  "Alley cat", "Dispassionate"];
	navBody.innerHTML = "";
	let currentDiv;
	for (let i = 1; i <= 10; ++i) {
		currentDiv = document.createElement("div");
		currentDiv.classList.add('range-slider-container');
		let table = document.createElement("table");
		table.setAttribute("border", 0);
		table.setAttribute("width", 550);
		let trTop = document.createElement("tr");
		trTop.setAttribute("height", 40);
		let tdSpacer = document.createElement("td");
		tdSpacer.innerHTML = "&nbsp;&nbsp;";
		let tdLeft = document.createElement("td");
		tdLeft.setAttribute("style", "text-align: left;");
		tdLeft.setAttribute("width", "50%");
		tdLeft.innerHTML += leftAttrs[i] + " ";
		let spanLeft = document.createElement("span");
		spanLeft.id = "colleft" + i;
		spanLeft.setAttribute("style", "font-weight:bold;");
		spanLeft.innerHTML = "50%";
		tdLeft.appendChild(spanLeft);
		let tdRight = document.createElement("td");
		tdRight.setAttribute("style", "text-align: right;");
		tdRight.setAttribute("width", "50%");
		let spanRight = document.createElement("span");
		spanRight.id = "colright" + i;
		spanRight.setAttribute("style", "font-weight:bold;");
		spanRight.innerHTML = "50%";
		tdRight.appendChild(spanRight);
		tdRight.innerHTML += " " + rightAttrs[i];
		trTop.appendChild(tdSpacer);
		trTop.appendChild(tdLeft);
		trTop.appendChild(tdRight);
		trTop.appendChild(tdSpacer);
		let trBottom = document.createElement("tr");
		trBottom.setAttribute("height", 50);
		let tdSlider = document.createElement("td");
		tdSlider.setAttribute("colspan", 4);
		let inputSlider = document.createElement("input");
		inputSlider.type = "range";
		inputSlider.setAttribute("min", 0);
		inputSlider.setAttribute("max", 100);
		inputSlider.setAttribute("inputid", i);
		inputSlider.id = "input" + i;
		inputSlider.addEventListener("change", function (event) {
			let inp = event.target;
			let inputid = inp.getAttribute("inputid");
			let val = document.getElementById("input" + inputid).value;
			changeValue(val, inputid);
		});
		tdSlider.appendChild(inputSlider);
		trBottom.appendChild(tdSlider);
		table.appendChild(trTop);
		table.appendChild(trBottom);
		currentDiv.appendChild(table);
		navBody.appendChild(currentDiv);
	}
}

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