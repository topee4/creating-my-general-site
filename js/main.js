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




function addEvents() {
    $('._header_navs').on('click', function () {
        
        $(this).addClass("_active");
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
             $(this).addClass("_active");
            }
        });
    }
}