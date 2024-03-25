$(document).ready(function () {
    setInterval(function(){
        $('#content').load(window.location.href + " #content > *");
    }, 1000);
});