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

    localStorage.setItem('basket', JSON.stringify(basket));
}
function checkBasket(){
    //Проверяю наличие корзины в localStorage
    if (localStorage.getItem('basket') != null) {
        basket = JSON.parse (localStorage.getItem('basket'));
    }
}