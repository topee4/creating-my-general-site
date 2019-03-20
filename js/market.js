var basket = {};
function init () {
    // $.getJSON('goods.json', goodsOut);
    $.post(
        "admin/core.php",
        {
            "action" : "loadGoods"
        },
        goodsOut
    );
}

$(document).ready(function(){
    
    init();
    checkBasket();
});

function goodsOut(data){
    // //Загружаю товары на страницу
    // data = JSON.parse(data);
    
    // var out = '';

    // for (var key in data){
    //     console.log(data[key]['img']);
    //     out+='<div class="_singleGoods">';
    //         out+='<img src="images/goods/' + data[key]['img'] + '">';
    //         out+='<h5>' + data[key]['name'] + '</h5>';
    //         out+='<p><u>Цена</u>: ' + data[key]['cost'] + '</p>';
    //         out+='<p>' + data[key]['description'] + '</p>';
    //         out+='<hr>';
    //         out+='<button class="_buy" data-name="' + data[key]['name'] + '" data-id="' + key + '">Купить' + '</button>';
    //     out+='</div>';
    // }
    // $('._out').html(out);
    $('button._buy').on('click', addToCart);
}

function addToCart(){
    

    //Добавляю товар в корзину
    //Имя товара
    //    var name = $(this).attr('data-name');
    var id = $(this).attr('data-id');
    console.log(id);

    if(basket[id] != undefined){
        basket[id]++;
    } else {
        basket[id] = 1;
    }   

    $(this).find(".hiddenCart").addClass("_flag");
    localStorage.setItem('basket', JSON.stringify(basket));



}
function checkBasket(){
    //Проверяю наличие корзины в localStorage
    if (localStorage.getItem('basket') != null) {
        basket = JSON.parse (localStorage.getItem('basket'));
    }
}

                                                                            
                                                                            //PAGINATOR SCRIPT
                                                                            


// var paginator = [];

// $(document).ready(function () {
//     append_events();
//     header_showmenu();
//     add_Events();
//     showpaginator();
//     $('#_main-logo').on('click', function () {
//         var checker = 'main';
//         paginator[0] = checker;
//         localStorage.setItem('paginator', JSON.stringify(paginator));
//     });
// });




// function add_Events() {
//     $('.paginat_btn').on('click', function () {
        
//         $(this).addClass("_active_pag");
//         var checker = $(this).attr("data-page");

//         if (paginator[0] != undefined) {
//             paginator[0] = checker;
//         } else {
//             paginator[0] = checker;
//         }
//         localStorage.setItem('paginator', JSON.stringify(paginator));
//     });
//     showpaginator();
// }


// function showpaginator() {
//     if (localStorage.getItem('paginator') != null) {
//         take = JSON.parse(localStorage.getItem('paginator'));
//         $.each($('.paginat_btn'), function () {
//             if ($(this).attr('data-page') == take[0]) {
//              $(this).addClass("_active_pag");
//             }
//         });
//     }
// }
