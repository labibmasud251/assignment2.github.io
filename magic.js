function clearIt() {
	document.getElementById("textInput").value='';
	document.getElementById("check").value = 1;	

}
function capitalize() {
	var check = document.getElementById("check").value;
	var str = document.getElementById("textInput").value;

	if(check == 1) {
		document.getElementById("textInput").value = str.toUpperCase();
		document.getElementById("check").value = 0;				
	}
	if(check == 0) {
		document.getElementById("textInput").value = str.toLowerCase();
		document.getElementById("check").value = 1;				
	}

}
function sort() {
	var str = document.getElementById("textInput").value;
	var array = str.split("\n");
	var sortArray = array.sort();
	var sortedStr = sortArray.join("\n");
	document.getElementById("textInput").value= sortedStr;
}
function reverse() {
	var str = document.getElementById("textInput").value;
	var array = str.split("\n");
	

	for(i = 0; i < array.length; i++){
		array[i] = array[i].split("").reverse().join("");
	}
	
	var reversedStr = array.join("\n")
	document.getElementById("textInput").value = reversedStr;
}
function strip() {
	var str = document.getElementById("textInput").value;
    
    var array = str.split("\n");
	str="";
	for(i = 0; i < array.length; i++){
		array[i] = array[i].trim();
        str+=array[i]+"\n";
	}
	
	var output = str.replace(/^\s*$[\n\r]{1,}/gm, '');
	document.getElementById("textInput").value = output;
}
function addNumber() {
	var str = document.getElementById("textInput").value;
	var array = str.split("\n");

	for(i = 1; i <= array.length; i++){
		array[i-1] = i + ". " + array[i-1];
	}
	var numberedStr = array.join("\n")
	document.getElementById("textInput").value = numberedStr;
}
function shuffle() {
	var str = document.getElementById("textInput").value;
	var array = str.split("\n");
	var size = array.length, temp, randomIndex;

	while (size !== 0) {
	    randomIndex = Math.floor(Math.random() * size);
	    size -= 1;

	    temp = array[size];
	    array[size] = array[randomIndex];
	    array[randomIndex] = temp;
	}
	var shuffledStr = array.join("\n");
	document.getElementById("textInput").value = shuffledStr;	
  	
}