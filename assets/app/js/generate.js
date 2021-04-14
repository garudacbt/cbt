var timer;
var token;

function getToken() {
	$.ajax({
		url: base_url + "cbttoken/loadtoken",
		type: "GET",
		success: function (response) {
			token = response;
			console.log("getToken", token);
		},
		error: function (xhr, status, error) {
			console.log(xhr);
		}
	});
}

function createToken(t, f) {
	token = t;
	clearInterval(timer);
	if (token.auto==='1') {
		timer = setInterval(function(){
			generateToken(f);
		}, 1000*60*15); //1000*60*15 = 15 menit
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
