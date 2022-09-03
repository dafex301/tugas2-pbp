if (sessionStorage.getItem('timeLeft')) {
    var timeLeft = sessionStorage.getItem('timeLeft');
}
else {
    var timeLeft = 5 * 60;
}

function timeout() {
    var minute = Math.floor(timeLeft / 60);
    var second = timeLeft - (minute * 60);
    if (second < 10) {
        second = "0" + second;
    }
    var timeString = minute + ":" + second;
    document.getElementById("timer").innerHTML = timeString;
    if (timeLeft <= 0) {
        sessionStorage.clear('timeLeft');
        alert('Waktu Habis');
        window.location.href = "submit.php";
    } else {
        timeLeft--;
        sessionStorage.setItem('timeLeft', timeLeft);
        setTimeout("timeout()", 1000);
    }
}
setTimeout("timeout()", 1000);
