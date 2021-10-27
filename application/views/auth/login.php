<div id="background-carousel">
	<div class="item" style="background-image: url('https://images.unsplash.com/photo-1489403290543-f9908e831043');"></div>
</div>
<div class="container">
	<div class="info-box bg-transparent shadow-none">
        <?php
        $logo_app = $setting->logo_kanan == null ? base_url().'assets/img/favicon.png' : base_url().$setting->logo_kanan;
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
								<!--
								<div class="icheck-primary">
									<?= form_checkbox('remember', '', FALSE, 'id="remember"'); ?>
									<label for="remember">
										Remember Me
									</label>
								</div>
								-->
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

<script type="text/javascript">
	let base_url = '<?=base_url();?>';

	var i = 0;

	var img = ["wall1.jpg", "wall2.png", "wall3.jpg"];
    //var img = ["ma1.jpg", "ma2.jpg", "ma3.jpg"];

	var opacity = 0;
	var incOpacity = 1;
	var delay = 50;

	function changeBg() {
		opacity = 0;
		incOpacity = 1;

		$('.item').css("opacity", opacity);
		$('.item').css("background-image", "url("+base_url+"/assets/img/" + img[i] + " )");

		i++;
		// cek if i = max
		if(i === img.length) {
			i = 0;
		}

		fadeIn();

		setTimeout(changeBg, 10000);
	}

	// fungsi effek fade
	function fadeIn() {
		opacity = incOpacity / delay;
		if(incOpacity <= delay) {
			$('.item').css("opacity", opacity);
			setTimeout(fadeIn, 10);
			incOpacity++;
		}
	}
	// inisialisai fungsi gambar
	changeBg();
</script>
<script src="<?= base_url() ?>/assets/app/js/auth/login.js"></script>
