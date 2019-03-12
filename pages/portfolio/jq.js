$(document).ready(function(){
    $(document).scroll(function(){
        var currentScrollPosition = $(this).scrollTop();
        if(currentScrollPosition >= 0 && currentScrollPosition < 1100){
            $('.wrap_only_header').css({ transition: ".8s", transitionDelay: ".5s",
            opacity: ".9",
            borderStyle: "inset",
            borderWidth: "5px",
                borderRightColor: "rgb(147, 153, 88)",
                borderBottomColor: "rgb(147, 153, 88)",
                borderTopColor: "wheat",
                borderLeftColor: "wheat",
            borderRadius: "60px"});
            
            $('._home').addClass('current_');
            $('._about').removeClass('current_');
            $('._portfolio').removeClass('current_');
            $('._contact').removeClass('current_');
        }
        else if(currentScrollPosition >= 1100 && currentScrollPosition < 2244){
            $('.wrap_about_me').css({ transition: ".8s", transitionDelay: ".5s",
                opacity: ".9",
                borderStyle: "inset",
                borderWidth: "5px",
                    borderRightColor: "rgb(147, 153, 88)",
                    borderBottomColor: "rgb(147, 153, 88)",
                    borderTopColor: "wheat",
                    borderLeftColor: "wheat",
                borderRadius: "60px"});
            $('._home').removeClass('current_');
            $('._about').addClass('current_');
            $('._portfolio').removeClass('current_');
            $('._contact').removeClass('current_');
        }
        else if(currentScrollPosition >= 2244 && currentScrollPosition < 3422){
            $('.front, .back, .wrap__').css({ transition: ".8s",
            opacity: ".9",
            borderStyle: "inset",
            borderWidth: "5px",
                borderRightColor: "rgb(147, 153, 88)",
                borderBottomColor: "rgb(147, 153, 88)",
                borderTopColor: "wheat",
                borderLeftColor: "wheat",
            borderRadius: "60px"})
            $('.wrap__').css({ transition: ".8s", transitionDelay: ".5s"});
            
            $('._home').removeClass('current_');
            $('._about').removeClass('current_');
            $('._portfolio').addClass('current_');
            $('._contact').removeClass('current_');
        }
        else if(currentScrollPosition >= 3422 && currentScrollPosition < 4367){
            $('.wrap_contact, .wrap_footer').css({ transition: ".8s", transitionDelay: ".5s",
            opacity: ".9",
            borderStyle: "inset",
            borderWidth: "5px",
                borderRightColor: "rgb(147, 153, 88)",
                borderBottomColor: "rgb(147, 153, 88)",
                borderTopColor: "wheat",
                borderLeftColor: "wheat",
            borderRadius: "60px"});
            
            $('._home').removeClass('current_');
            $('._about').removeClass('current_');
            $('._portfolio').removeClass('current_');
            $('._contact').addClass('current_');
        }

        
    });

});




