<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $judul ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<h6 class="card-title"><?=$subjudul?></h6>
					<div class="card-tools">
						<button id="generate" onclick="generate(true)" class="btn btn-success">
							GENERATE TOKEN
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid h-100">
						<div class="row h-100 justify-content-center">
							<div class="col-4 input-group mb-3">
								<div class="input-group-prepend w-40">
									<span class="input-group-text">Otomatis ? </span>
								</div>
								<?php
								$arrVal = ["TIDAK","YA"];
								echo form_dropdown(
									'auto',
									$arrVal,
									null,
									'id="auto" class="form-control"'
								); ?>
							</div>
						</div>

						<div class="row h-100 justify-content-center">
							<div class="card col-4 bg-gradient-fuchsia p-4">
								<span class="text-center">TOKEN SAAT INI</span>
								<h1 class="text-center" id="token-view">- - - - - -</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	let tokenResponse;

	function generate(clicked) {
		if (clicked) {
			$('#auto').attr('disabled', true);
			$('#token-view').text("- - - - - -");
			$('#generate').attr('disabled', 'disabled').text('MEMBUAT TOKEN ..');
		}

		createToken(tokenResponse, function (result) {
			tokenResponse = result;
			console.log("result", tokenResponse);
			$('#token-view').text(tokenResponse.token);
			$('#generate').removeAttr('disabled').text('GENERATE TOKEN');
			$('#auto').removeAttr('disabled');
			$('#auto').val(tokenResponse.auto);
		});
	}

	function loadToken() {
		$.ajax({
			url: base_url + "cbttoken/loadtoken",
			type: "GET",
			success: function (response) {
				tokenResponse = response;
				console.log("load", tokenResponse);
				$('#token-view').text(response.token);
				$('#generate').removeAttr('disabled').text('GENERATE TOKEN');
				$('#auto').removeAttr('disabled');
				$('#auto').val(response.auto);

				//generate(false);
			},
			error: function (xhr, status, error) {
				console.log(xhr);
			}
		});
	}

	$(document).ready(function () {
		$('#auto').on('change', function () {
			var token = {};
			token ["token"] = tokenResponse.token;
			token ["auto"] = $(this).val();
			tokenResponse = token;

			console.log("option", tokenResponse);
			generate(false);
		});

		loadToken();
	});

</script>
