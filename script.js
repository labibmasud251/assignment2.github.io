window.onload=function(){

    var quotes=["Enjoy The Work, You Most. Do The Best,You Can",
                "Don't watch the clock; do what it does. Keep going.",
                "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
                "Fortune Favours The Brave",
                "Start where you are. Use what you have. Do what you can.",
                "Do not take life too seriously. You will never get out of it alive.",
                "Start by doing what's necessary; then do what's possible; and suddenly you are doing the impossible.",
                "A creative man is motivated by the desire to achieve, not by the desire to beat others.",
                "Ever tried. Ever failed. No matter. Try Again. Fail again. Fail better.",
                "People who think they know everything are a great annoyance to those of us who do.",
                "Get your facts first, then you can distort them as you please.",
                "Always do whatever's next.",
                "Atheism is a non-prophet organization.",
                "Hapiness is not something ready made. It comes from your own actions."];


    var arr_index=(Math.floor(Math.random()*13));
    
    document.getElementById("quote").innerHTML=quotes[arr_index];

};

function myFunction(){

    var quotes=["Enjoy The Work, You Most. Do The Best,You Can",
                "Don't watch the clock; do what it does. Keep going.",
                "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
                "Fortune Favours The Brave",
                "Start where you are. Use what you have. Do what you can.",
                "Do not take life too seriously. You will never get out of it alive.",
                "Hapiness is not something ready made. It comes from your own actions."];


    var arr_index=(Math.floor(Math.random()*7));
    
    document.getElementById("quote").innerHTML=quotes[arr_index];

};

function btn1(){
        document.getElementById("innerbox").style.backgroundColor="#B71C1C";
        document.getElementById("innerbox").style.borderColor="#000";
        document.getElementById("innerbox").style.color="#fff";
        document.getElementById("innerbox").style.fontFamily="fantasy";
    }

function btn2(){
        document.getElementById("innerbox").style.backgroundColor="#8E24AA ";
        document.getElementById("innerbox").style.borderColor="#000";
        document.getElementById("innerbox").style.color="#c8e6c9";
        document.getElementById("innerbox").style.fontFamily="cursive"
    }
function btn3(){
        document.getElementById("innerbox").style.backgroundColor="#6200EA";
        document.getElementById("innerbox").style.borderColor="##000";
        document.getElementById("innerbox").style.color="#f0f4c3";
        document.getElementById("innerbox").style.fontFamily="monoscape";
    }
function btn4(){
        document.getElementById("innerbox").style.backgroundColor="#1DE9B6";
        document.getElementById("innerbox").style.borderColor="#004D40";
        document.getElementById("innerbox").style.color="#4a148c";
        document.getElementById("innerbox").style.fontFamily="sans-serif";
    }
function btn5(){
        document.getElementById("innerbox").style.backgroundColor="#CDDC39";
        document.getElementById("innerbox").style.borderColor="#1B5E20";
        document.getElementById("innerbox").style.color="#fff";
        document.getElementById("innerbox").style.fontFamily="cursive";
    }
function btn6(){
        document.getElementById("innerbox").style.backgroundColor="#004d40";
        document.getElementById("innerbox").style.borderColor="#3f51b5";
        document.getElementById("innerbox").style.color="#f0f4c3";
        document.getElementById("innerbox").style.fontFamily="fantasy";
}
