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
				</div>
				<div class="card-body">
					<div class="container-fluid h-100">
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
	$(document).ready(function () {
		function loadToken() {
			$.ajax({
				url: base_url + "cbttoken/loadtoken",
				type: "GET",
				success: function (response) {
					tokenResponse = response;
					console.log("load", tokenResponse);
					$('#token-view').html('<b>'+response.token+'</b>');
				},
				error: function (xhr, status, error) {
					console.log(xhr);
				}
			});
		}

		loadToken();
	});

</script>
