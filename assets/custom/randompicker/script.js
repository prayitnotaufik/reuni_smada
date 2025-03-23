let names = [];

function add() {
	let name = document.getElementById("name").value;
	function capitalize(str) {
		return (
			str
				.toLowerCase()
				.split(" ")
				// Return all words inside a string with capitalized first letter
				.map(function (word) {
					return word[0].toUpperCase() + word.substr(1);
				})
				.join(" ")
		);
	}

	names.push(" " + capitalize(name));
	// Empty input every time button is clicked
	name.value = "";
	for (i = 0; i < names.length; i++) {
		document.getElementById(
			"name-list"
		).innerHTML = `The players are ${names}.`;
	}
	// Empty the input field every time button is clicked
	document.getElementById("name").value = "";
}

function draw() {
	let index = Math.floor(Math.random() * names.length);
	let winner = names[index].toUpperCase();
	document.getElementById("result").innerHTML = `And the winner is ${winner}!`;
}

function clearAll() {
	names.length = 0;
	document.getElementById("name").value = "";
	document.getElementById("name-list").innerHTML = "";
	document.getElementById("result").innerHTML = "";
}
