var memory = [];

$(document).ready(function () {
    addEvents();
    showMemory();
    $('#_main-logo').on('click', function () {
        var checker = 'main';
        memory[0] = checker;
        localStorage.setItem('memory', JSON.stringify(memory));
    });
//ACTIVE MENU SCRIPT
    append_events();
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

////////// MENU ACTIVE SCRIPT ///////////
var header_menu = [];
function append_events() {
    $('._header-menu').removeClass('_active_menu');
    $('._header-menu').on('click', function () {
        
        $(this).addClass("_active_menu");
        var checkMenu = $(this).attr("data-menu");

        if (header_menu[0] != undefined) {
            header_menu[0] = checkMenu;
        } else {
            header_menu[0] = checkMenu;
        }
        localStorage.setItem('header_menu', JSON.stringify(header_menu));
    });
    showHeader_menu();
}


function showHeader_menu() {
    if (localStorage.getItem('header_menu') != null) {
        take = JSON.parse(localStorage.getItem('header_menu'));
        $.each($('._header-menu'), function () {
            if ($(this).attr('data-menu') == take[0]) {
             $(this).addClass("_active_menu");
            }
        });
    }
}
////// PAGINATOR SCRIPT /////////

var paginator = [];

$(document).ready(function () {
    add_Events();
    showpaginator();
    $('#_main-logo').on('click', function () {
        var checker = 'main';
        paginator[0] = checker;
        localStorage.setItem('paginator', JSON.stringify(paginator));
    });
});




function add_Events() {
    $('.paginat_btn').on('click', function () {
        
        $(this).addClass("_active_pag");
        var checker = $(this).attr("data-page");

        if (paginator[0] != undefined) {
            paginator[0] = checker;
        } else {
            paginator[0] = checker;
        }
        localStorage.setItem('paginator', JSON.stringify(paginator));
    });
    showPaginator();
}


function showPaginator() {
    if (localStorage.getItem('paginator') != null) {
        take = JSON.parse(localStorage.getItem('paginator'));
        $.each($('.paginat_btn'), function () {
            if ($(this).attr('data-page') == take[0] && $(this).val() == $(this).attr('data-page') ) {
             $(this).addClass("_active_pag");
            }
        });
    }
}