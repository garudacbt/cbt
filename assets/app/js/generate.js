let timer;
let jarak;
let updated;

function startInterval(func) {
    timer = setInterval(function(){
        generateToken(func);
    }, jarak * 60000); //1000*60*15 = 15 menit
    //if (func && (typeof f == "function")) {
    //    func(jarak);
    //}
}

function stopInterval(func) {
    if (timer != null) {
        clearInterval(timer);
    }
    if (func && (typeof f == "function")) {
        func('Timer Stopped');
    }
}

function getToken(func) {
	$.ajax({
		url: base_url + "cbttoken/loadtoken",
		type: "GET",
		success: function (response) {
		    globalToken = response;
		    jarak = response.jarak;
            updated = response.updated;
            //if (response.auto == '1') {
            //    startInterval(func);
            //} else {
            //    stopInterval(func);
            //}
            if (func && (typeof func == "function")) {
                func(response);
            }
		},
		error: function (xhr, status, error) {
			console.log(xhr);
		}
	});
}

function generateToken(f) {
    var tokenBaru        = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var charactersLength = characters.length;
    for ( var i = 0; i < 6; i++ ) {
        tokenBaru += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    var tkn = globalToken.token==='' ? '-' : globalToken.token;
    $.ajax({
        url: base_url + "cbttoken/generatetoken/"+tkn+"/"+tokenBaru+"/"+globalToken.auto,
        type: "GET",
        success: function () {
            console.log('tokenResult', tokenBaru);

            if (f && (typeof f == "function")) {
                var resultData = {};
                resultData ["token"] = tokenBaru;
                resultData ["auto"] = globalToken.auto;
                globalToken = resultData;

                f(resultData);
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
    //return result;
}