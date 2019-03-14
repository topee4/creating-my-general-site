var basket = {}; //Корзина

$.getJSON('items.json', function(data){
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
            out+='<div class="col-4 mt-3 mb-3">';
            out+='<div class="_wrap">';
                out+='<div class="_contents _hide">';
                    out+='<div class="card border-dark mb-3 text-center">';
                        out+='<button type="button" class="btn btn-warning _delete m-auto" data-art="' + index + '">x</button>';
                        out+='<div class="p-5"><img src="images/goods/' + goods[index].img + '" width="100%"></div>';
                        out+='<h5>' + goods[index].name + '</h5>';
                        out+='<p><u>Количество</u>: ' + '<button type="button" class="btn btn-light _minus" data-art="' + index + '">-</button> ' + basket[index] + ' <button type="button" class="btn btn-light _plus" data-art="' + index + '">+</button></p>';
                        out+='<p>Цена: <strong style="font-size: 25px;">' + goods[index].cost * basket[index] + '</strong></p>';
                    out+='</div>';
                out+='</div>';
            out+='</div>';
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
                "templates/mail.php",
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