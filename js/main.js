var memory = [];

$(document).ready(function () {
    addEvents();
    showMemory();
    $('#_main-logo').on('click', function () {
        var checker = 'main';
        memory[0] = checker;
        localStorage.setItem('memory', JSON.stringify(memory));
    });
});
$(document).ready(function(){
    $("#profile_menu").popover({
      html: true,
      content: '<div m-auto><a href="profile"><button style="width: 100%" type="button" class="btn btn-dark">profile</button></a><hr><form action="logout" method="POST"><button style="width: 100%" type="submit" name="do_logout" class="btn btn-dark">Выйти</button></form></div>',
      trigger: 'click',
      placement: 'bottom'
    });
});





function addEvents() {
    $('._header_navs').on('click', function () {
        
        $(this).addClass("active");
        var checker = $(this).attr("data-check");

        if (memory[0] != undefined) {
            memory[0] = checker;
        } else {
            memory[0] = checker;
        }
        localStorage.setItem('memory', JSON.stringify(memory));
    });
    showMemory();
}


function showMemory() {
    if (localStorage.getItem('memory') != null) {
        take = JSON.parse(localStorage.getItem('memory'));
        $.each($('._header_navs'), function () {
            if ($(this).attr('data-check') == take[0]) {
             $(this).addClass("active");
            }
        });
    }
}