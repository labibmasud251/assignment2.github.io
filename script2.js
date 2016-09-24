function isNumber(evt) {
    
    
        evt = (evt) ? evt : window.event;
    var check=checkDot(evt);
    if(check===true){
        var charCode = (evt.which) ? evt.which : evt.keyCode;

        if (charCode != 44 &&charCode!=45 && charCode > 31 &&(charCode < 48 || charCode > 57 )) {
            return false;
        }

        return true;
    }
    
    else{
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    
    if (charCode != 44&&charCode!=46 &&charCode!=45 && charCode > 31 &&(charCode < 48 || charCode > 57 )) {
        return false;
    }
    
    return true;
    }
    
};

function checkDot(str){
    var total=0;
    for(var i=0;i<str.length;i++){
        if(str.charAt(i)=="."){
//            document.write(i);
            
            total++;
        }
    }
    if(total>0){
        return true;
//    document.getElementById("temp").innerHTML="Multiple Dot";
    }
//document.getElementById("temp").innerHTML="Single Dot";
    return false;
}

function calc() {
	var userInput = document.getElementById("userinput").value;
	var array = userInput.split(",");
	var sum = 0;
	var avg = 0;
	var reverse = [];
	if(userInput != '') {
		for (var i = 0; i < array.length; i++) {
			sum = sum + parseFloat(array[i]);
		}
		avg = sum/array.length;
		var max = Math.max.apply(null, array)
		var min = Math.min.apply(null, array)

		array.reverse();
		for (var i = 0; i < array.length; i++) {
			array[i] = parseFloat(array[i]);
		}		
		var showReversed = array.join();
		
		if (!isNaN(avg)) {
			document.getElementById("showSum").innerHTML = "Summation: " + sum;
			document.getElementById("showAvg").innerHTML = "Average: " + avg;
			document.getElementById("showMax").innerHTML = "Maximum: " + max;
			document.getElementById("showMin").innerHTML = "Minimum: " + min;
			document.getElementById("showRev").innerHTML = "Reverse: " + showReversed;		
		}
		sum = 0;
	}
	else {
			document.getElementById("showSum").innerHTML = '';
			document.getElementById("showAvg").innerHTML = '';
			document.getElementById("showMax").innerHTML = '';
			document.getElementById("showMin").innerHTML = '';
			document.getElementById("showRev").innerHTML = '';
	}
}