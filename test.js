window.onload=function(){
    var str="1254.1015454166245845"
    var total=0;
    for(var i=0;i<str.length;i++){
        if(str.charAt(i)=="."){
//            document.write(i);
            total++;
        }
    }
    if(total>1){
        document.write("Multiple Dot");
    }
    
}

