var basket = {};
function init () {
    // $.getJSON('goods.json', goodsOut);
    $.post(
        "market_core/core.php",
        {
            "action" : "loadFruits"
        },
        goodsOut
    );
}


$(document).ready(function(){
    init();
    checkBasket();
});

function goodsOut(data){
    //Загружаю товары на страницу
    data = JSON.parse(data);
    var out = '';

    for (var key in data){
        out += '<div class="col-4 mt-3 mb-3">';
                    out += '<div class="_wrap">';
                        out += '<div class="_contents text-center">';
                            out += '<div class="card border-dark mb-3">';
                                out += '<div class="p-5 _card_img"><img src="images/goods/' + data[key]['img'] + '" width="100%"></div>';
                                out += '<div class="_card_h"><h5 style="font-size: 25px; box-shadow: 0px 0px 1px black; color: #ffc900">' + data[key]['name'] + '</h5></div>';
                                out += '<div class="_card_p"><p><u>Цена</u>: <strong style="font-size: 25px;"> ' + data[key]['cost'] + '</strong></p></div>';
                                out += '<div class="_card_p"><p>Описание: <i>' + data[key]['description'] + '</i></p></div>';
                                out += '<hr>';
                                out += '<div class="_card_btn">';
                                    out += '<button type="button" class="btn btn-warning _buy" style="color: lightyellow;" data-name="' + data[key]['name'] + '" data-id="' + data[key]['id'] + '">В корзину';
                                    out += '<div class="hiddenCart">';
                                        out += '<span>Добавлено<br> в корзину</span>';
                                    out += '</div>';
                                    out += '</button>';
                                out += '</div>';
                            out += '</div>';
                        out += '</div>';
                    out += '</div>';
                out += '</div>';
// out += '                </div>';
//         out+='<div class="_singleGoods">';
//             out+='<img src="images/goods/fruits/' + data[key]['img'] + '">';
//             out+='<h5>' + data[key]['name'] + '</h5>';
//             out+='<p><u>Цена</u>: ' + data[key]['cost'] + '</p>';
//             out+='<p>' + data[key]['description'] + '</p>';
//             out+='<hr>';
//             out+='<button class="_buy" data-name="' + data[key]['name'] + '" data-id="' + key + '">Купить' + '</button>';
//         out+='</div>';
    }
    $('._out').html(out);
    $('button._buy').on('click', addToCart);
}

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