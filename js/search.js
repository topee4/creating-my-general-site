var basket = {};
// function init () {
    // $.getJSON('goods.json', goodsOut);
//     $.post(
//         "market_core/core.php",
//         {
//             "action" : "loadFruits"
//         },
//         goodsOut
//     );
// }


$(document).ready(function(){
    // init();
    checkBasket();
    $('button._buy').on('click', addToCart);
});

// function goodsOut(data){
//     //Загружаю товары на страницу
//     data = JSON.parse(data);
//     var out = '';

//     for (var key in data){
//         console.log(data[key]['img']);
//         out+='<div class="_singleGoods">';
//             out+='<img src="images/goods/fruits/' + data[key]['img'] + '">';
//             out+='<h5>' + data[key]['name'] + '</h5>';
//             out+='<p><u>Цена</u>: ' + data[key]['cost'] + '</p>';
//             out+='<p>' + data[key]['description'] + '</p>';
//             out+='<hr>';
//             out+='<button class="_buy" data-name="' + data[key]['name'] + '" data-id="' + key + '">Купить' + '</button>';
//         out+='</div>';
//     }
//     $('._out').html(out);
    
// }

function addToCart(){
    //Добавляю товар в корзину
    //Имя товара
    //    var name = $(this).attr('data-name');
    var id = $(this).attr('data-id');

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