$(function() {
    $('#menu_btn').click(function() {
        document.getElementById('mobile_lists').style.display = 'block';
        document.getElementById('menu_btn_close').style.display = 'block';
        document.getElementById('menu_btn').style.display = 'none';
    })

    $('#menu_btn_close').click(function() {
        document.getElementById('mobile_lists').style.display = 'none';
        document.getElementById('menu_btn_close').style.display = 'none';
        document.getElementById('menu_btn').style.display = 'block';
    })

    $(window).resize(function() {
        document.getElementById('mobile_lists').style.display = 'none';
        document.getElementById('menu_btn_close').style.display = 'none';
        document.getElementById('menu_btn').style.display = 'block';
    });
});