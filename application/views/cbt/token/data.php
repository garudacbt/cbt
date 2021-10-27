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
					</div>
				</div>
				<div class="card-body">
					<div class="container-fluid h-100">
						<div class="row h-100 justify-content-center d-none">
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
                        <div class="row h-100 justify-content-center">
                            <button id="generate" onclick="generate()" class="btn btn-success">
                                GENERATE NEW TOKEN
                            </button>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
    function generate() {
        generateToken(function (result) {
            console.log("result", result);
            $('#token-view').text(result.token);
            $('#generate').removeAttr('disabled').text('GENERATE TOKEN');
            $('#auto').removeAttr('disabled');
            $('#auto').val(result.auto);
        });
    }

    /*
    function createToken(t, f) {
        token = t;
        clearInterval(timer);
        if (token.auto==='1') {
            timer = setInterval(function(){
                generateToken(f);
            }, 1000*60*5); //1000*60*15 = 15 menit
        } else {
            generateToken(f);
        }
    }

    function generateToken(f) {
        var tokenBaru        = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var charactersLength = characters.length;
        for ( var i = 0; i < 6; i++ ) {
            tokenBaru += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        var tkn = token.token==='' ? '-' : token.token;
        $.ajax({
            url: base_url + "cbttoken/generatetoken/"+tkn+"/"+tokenBaru+"/"+token.auto,
            type: "GET",
            success: function () {
                console.log('tokenResult', tokenBaru);
                if (f && (typeof f == "function")) {
                    var resultData = {};
                    resultData ["token"] = tokenBaru;
                    resultData ["auto"] = token.auto;
                    token = resultData;
                    f(resultData);
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
        //return result;
    }

*/
    $(document).ready(function () {
		$('#auto').on('change', function () {
			var token = {};
			token ["token"] = globalToken.token;
			token ["auto"] = $(this).val();
            $('#auto').attr('disabled', true);
            $('#token-view').text("- - - - - -");
            $('#generate').attr('disabled', 'disabled').text('MEMBUAT TOKEN ..');

			generateToken(function (result) {
                $('#token-view').text(globalToken.token);
                $('#generate').removeAttr('disabled').text('GENERATE TOKEN');
                $('#auto').removeAttr('disabled');
                $('#auto').val(globalToken.auto);
            });
		});

		//loadToken();/
        var checkExist = setInterval(function() {
            if (globalToken != null) {
                //console.log('global', globalToken);
                $('#token-view').text(globalToken.token);
                $('#generate').removeAttr('disabled').text('GENERATE TOKEN');
                $('#auto').removeAttr('disabled');
                $('#auto').val(globalToken.auto);

                clearInterval(checkExist);
            }
        }, 500);

        /*
        Object.defineProperty(globalToken, "token", {
            get: function(){
                return this.token;
            },
            set: function(newToken){
                this.token=newToken;
                //this.auto=newValue.auto;
                //alert(this._year);
                //alert(this.edition);

                console.log('listener', globalToken);
                $('#token-view').text(newToken);
                $('#generate').removeAttr('disabled').text('GENERATE TOKEN');
                $('#auto').removeAttr('disabled');
                $('#auto').val(globalToken.auto);
            }
        });
        */
    });

</script>
