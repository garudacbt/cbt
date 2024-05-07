<div class="container pt-4">
    <div class="info-box bg-transparent shadow-none">
        <?php
        $logo_app = $setting->logo_kanan == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kanan;
        ?>
        <img src="<?= $logo_app ?>" width="60" height="60">
        <div class="info-box-content ml-2" style="text-shadow: 1px 1px 2px #000000">
            <h5 class="info-box-text text-white text-wrap"><b><?= $setting->nama_aplikasi ?></b></h5>
            <span class="info-box-text text-white"><?= $setting->alamat ?></span>
        </div>
    </div>
    <div class="container-fluid h-100">
        <div class="row h-100 justify-content-center">
            <div class="login-box">
                <div class="login-logo text-white" style="text-shadow: 1px 1px 2px #000000">
                    <b>S</b>elamat <b>D</b>atang
                </div>

                <div class="card form-signin">
                    <div class="card-body">
                        <p class="login-box-msg">L O G I N</p>
                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?= form_open("auth/cek_login", array('id' => 'login')); ?>
                        <div class="input-group mb-3 has-feedback">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <?= form_input($identity, '', 'required'); ?>
                            <div class="help-block"></div>
                        </div>
                        <div class="input-group mb-3 has-feedback">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <?= form_input($password, '', 'required'); ?>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span id="toggle-password" class="fas fa-eye-slash" style="cursor: pointer"></span>
                                </div>
                            </div>
                            <div class="help-block"></div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-cyan">
                                    <input type='checkbox' id="cbt-only" name='cbt-only'
                                           value='1' checked="checked"/>
                                    <label for="cbt-only">Login CBT</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <?= form_submit('submit', lang('login_submit_btn'), array('id' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat')); ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <?= form_close(); ?>
                        <!--
				<a href="<?= base_url() ?>auth/forgot_password" class="text-center"><?= lang('login_forgot_password'); ?></a>
				-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/app/js/jquery.backstretch.js"></script>
<script type="text/javascript">
    let base_url = '<?=base_url();?>';
    var img = ["wall1.jpg", "wall2.png", "wall3.jpg"];

    $.backstretch([
        base_url + 'assets/img/' + img[0],
        base_url + 'assets/img/' + img[1],
        base_url + 'assets/img/' + img[2]
    ], {
        fade: 1000,
        duration: 10000
    });

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

            const arrForm = $(this).serializeArray()
            const cbtOnly = arrForm.find(function (obj) {
                return obj.name === 'cbt-only'
            })
            localStorage.setItem('garudaCBT.login', cbtOnly !== undefined ? '1' : '0')

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

                    const isLogin = localStorage.getItem('garudaCBT.login')
                    const isCbtMode = isLogin ? isLogin === '1' : false
                    let go = base_url + data.url;
                    if (isCbtMode && data.role === 'siswa') {
                        go = 'siswa/cbt'
                    }
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
</script>
