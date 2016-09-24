function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    
    if (charCode != 46 && charCode > 31 &&(charCode < 48 || charCode > 57 )) {
        return false;
    }
    
    return true;
};

function showResult(){
    var num=document.getElementById("number").value;
    var selected=document.getElementById("selection");
    var i=selected.selectedIndex;
    var unit=selected.options[i].text;

    if(unit=="lb to kg"){
        var res=num*0.4536;
          document.getElementById("result").innerHTML=res+" kg";
    }
    
    else if(unit=="kg to lb"){
         var res=num*2.2046;
          document.getElementById("result").innerHTML=res+" lb";
     }
}    

