document.addEventListener('DOMContentLoaded', function(){
    $(function (){
        var showMenu = false;
        $('.burger').click(function(){
            showMenu = !showMenu;
            if(showMenu){
                $('.header').addClass('header_open-mobile-menu');
                $('.burger').addClass('burger_is-active');
                $('body').addClass('no-scroll');
            }else{
                $('.header').removeClass('header_open-mobile-menu');
                $('.burger').removeClass('burger_is-active');
                $('body').removeClass('no-scroll');
            }
        });

        $('.close-modal').click(function () {
           $('.modal').css({'display' : 'none'});
        });

        $('.callback').click(function () {
            $('.modal').css({'display' : 'flex'});
        })
    });

    /*var $form = $('.callback-form__form');
    $form.on('submit', function(e) {
        e.preventDefault();

        var $form = $(this);
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'send_form',
                data: $form.serialize(),
            },
            type: $form.attr('method') || 'POST',
            context: this,
            success: function(response) {
                console.log(response);
                //window.location = 'sbasibo';
            },
            error: function() {
                alert('Ошибка отправки формы')
            }
        });
    });*/
});