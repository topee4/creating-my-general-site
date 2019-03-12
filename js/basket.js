var basket = {}; //Корзина

$.getJSON('goods.json', function(data){
    var goods = {};
    goods = data; //Все товары в массиве
    checkBasket();
    showBasket();
    
function showBasket(){
        if($.isEmptyObject(basket)){
            //Корзина пуста
            $('#_title').html('Козрина пуста');
            $('#_title_p').html('Добавьте товар в корзину');
            $('._hide').hide();
        } else {
        var out = '';
        
        for(var index in basket){
            out+='<div class="_singleGoods">';
                out+='<button class="_delete" data-art="' + index + '">x</button>';
                out+='<p><h2>' + goods[index].name + '</h2></p>';
                out+='<hr>';
                out+='<img src="images/goods/' + goods[index].img + '">';
                out+='<p><u>Количество</u>: ' + '<button class="_minus" data-art="' + index + '">-</button> ' + basket[index] + ' <button class="_plus" data-art="' + index + '">+</button>' + '</p>';
                out+='<hr>';
                out+='<p>Цена: ' + goods[index].cost * basket[index] + '</p>';
            out+='</div>';
        }
        $('._out').html(out);
        $('._minus').on('click', minusGoods);
        $('._plus').on('click', plusGoods);
        $('._delete').on('click', deleteGoods);

        function minusGoods(){
            var article = $(this).attr('data-art');
            if(basket[article] <= 0){
                return false;
            }
            basket[article]--;
            saveBusketToLS();
            showBasket();
        }
        function plusGoods(){
            var article = $(this).attr('data-art');
            basket[article]++;
            saveBusketToLS();
            showBasket();
        }
        function deleteGoods(){
            var article = $(this).attr('data-art');
            delete basket[article];
            saveBusketToLS();
            showBasket();
        }

    }
}

});

function saveBusketToLS(){
    //Сохраняю корзину в localStorage
    localStorage.setItem('basket', JSON.stringify(basket));
}

function checkBasket(){
    if(localStorage.getItem('basket') != null){
        basket = JSON.parse(localStorage.getItem('basket'));
    }
}

function isEmpty(object){
    //Проверка корзины на пустоту
    for(var key in object)
    if(object.hasOwnProperty(key)) return true;
    return false;
}

function sendEmail(){
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if(ename != '' && email != '' && ephone != '') {
        if(isEmpty(basket)){
            $.post(
                "core/mail.php",
                {
                    "ename" : ename,
                    "email" : email,
                    "ephone" : ephone,
                    "basket" : basket
                },
                function(data){
                    if (data == 1){
                        alert('Заказ отправлен!');
                    } else {
                        alert('Повторите заказ!');
                    }
                }
            );
        } else {
            alert('Корзина пуста');
        }
    } else {
        alert('Заполните все поля!');
    }
}



$(document).ready(function(){
    $('._send-email').on('click', sendEmail);//Отправить письмо с заказом
});