$(document).ready(function(){
	$('#myCarousel').carousel({
		interval: 1000 * 2,
		pause: 'none'
	});

    $('form#login input').on('change', function(){
        $(this).parent().removeClass('has-error');  
        $(this).next().next().text('');
    });

    $('form#login').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();

        var infobox = $('#infoMessage');
        infobox.addClass('info-box align-items-center justify-content-center bg-gradient-info').text('Checking...');

        var btnsubmit = $('#submit');
        btnsubmit.attr('disabled', 'disabled').val('Wait...');

        $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){
            infobox.removeAttr('class').text('');
            btnsubmit.removeAttr('disabled').val('Login');
            console.log('login', data);
            if(data.status){
                infobox.addClass('info-box align-items-center justify-content-center bg-gradient-success').text('Login Sukses');
                var go = base_url + data.url;
                window.location.href = go;
            }else{
                if(data.invalid){
                    $.each(data.invalid, function(key, val){
                    $('[name="'+key+'"').parent().addClass('has-error');
                    $('[name="'+key+'"').next().next().text(val);
                    if(val == ''){
                        $('[name="'+key+'"').parent().removeClass('has-error');  
                        $('[name="'+key+'"').next().next().text('');
                    }
                    });
                }
                    if(data.failed){
                        infobox.addClass('info-box align-items-center justify-content-center bg-gradient-danger').text(data.failed);
                    }
                }
            }
        });
    });

    $('#toggle-password').on('click', function (e) {
        // toggle the type attribute
        const type = $('#password').attr('type') === 'password' ? 'text' : 'password';
        $('#password').attr('type', type);
        // toggle the eye / eye slash icon
        $(this).toggleClass('fa-eye-slash fa-eye');
    });
});
