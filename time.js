var time = new Date();
var hours = time.getHours();

if (hours < 12){
    document.getElementById("time").innerHTML="Good morning!";
}

else if (hours >= 18){
    document.getElementById("time").innerHTML="Good evening!";
}

else if (hours >= 12){
    document.getElementById("time").innerHTML="Good afternoon!";
}
