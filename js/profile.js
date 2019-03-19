$(document).ready(function(){
    $('._prof').on('click', function(){
        $('._prof').removeClass('_active_prof');
        $(this).addClass('_active_prof');
        $view = $(this).attr('data-view');
                
       $.each($('._flag_prof'), function(){
        if($(this).attr('data-view') == $view){
            $(this).removeClass('d-none');
        } else {
            $(this).addClass('d-none');
        }
       });
    });
});