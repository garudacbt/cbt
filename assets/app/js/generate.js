var adaJadwalUjian;
const cur_url = window.location.href;

if (!localStorage.getItem('ada_jadwal_ujian') && cur_url.indexOf('dashboard') === -1) {
    window.location.href = base_url + '/dashboard';
} else {
    adaJadwalUjian = localStorage.getItem('ada_jadwal_ujian');
}

let globalToken;
let timerToken;

function getToken(func) {
    $.ajax({
        url: base_url + "cbttoken/loadtoken",
        type: "GET",
        success: function (response) {
            globalToken = response;
            if (func && (typeof func == "function")) {
                func(response);
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

$(document).ready(function () {
    // cek token
    if (!localStorage.getItem('token')) {
        // token tidak ada
        getToken(function (tokenResult) {
            globalToken = tokenResult;
            localStorage.setItem('token', JSON.stringify(tokenResult));
            createIntervalToken();
        })
    } else {
        // token ada
        globalToken = JSON.parse(localStorage.getItem('token'));
        createIntervalToken();
    }
});

function createIntervalToken() {
    if (timerToken) {
        clearInterval(timerToken);
    }
    if (globalToken.auto == '1' && adaJadwalUjian != '0') {
        var mulai = globalToken.updated == null ? new Date(): new Date(globalToken.updated);
        const now = getDiffMinutes(mulai);
        var mnt = Number(globalToken.jarak);

        mnt = mnt - now.m;
        var scn = 60 - now.s;
        if (scn > 0) {
            mnt = mnt -1;
        }
        var t_scnd = (mnt * 60000) + (scn * 1000);
        console.log('w', t_scnd);
        timerToken = setInterval(function(){
            generateToken();
        }, t_scnd);
    }
}

function generateToken(f) {
    ajaxcsrf();
    var tokenBaru        = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var charactersLength = characters.length;
    for ( var i = 0; i < 6; i++ ) {
        tokenBaru += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    globalToken.token = tokenBaru;

    $.ajax({
        url: base_url + "cbttoken/generatetoken/",
        type: "GET",
        data: 'data='+JSON.stringify(globalToken),
        success: function (response) {
            //console.log('tokenResult', response);
            localStorage.setItem('token', JSON.stringify(response));
            globalToken = response;
            createIntervalToken();
            console.log('new_token: generated');
            if (f && (typeof f == "function")) {
                f(response);
            }
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

function setTimerToken(block, time_end, function_result) {
    let timer,
        start,
        end,
        _second = 1000,
        _minute = _second * 60,
        _hour = _minute * 60,
        _day = _hour * 24,
        now,
        set_storage = () => {
            let n = new Date();
            now = Math.round(n.getTime() / 1000);
        },
        update_settings = () => {
            start = end = now;

            end = new Date(+end * 1000);
            end.setDate(end.getDate() + time_end[0]);
            end.setHours(end.getHours() + time_end[1]);
            end.setMinutes(end.getMinutes() + time_end[2]);
            end.setSeconds(end.getSeconds() + time_end[3]);
            end = +end;
        },
        get_timer = function (distance) {
            let days = Math.floor(distance / _day),
                hours = Math.floor((distance % _day) / _hour),
                minutes = Math.floor((distance % _hour) / _minute),
                seconds = Math.floor((distance % _minute) / _second);

            if (days < 10) days = '0' + days;
            if (hours < 10) hours = '0' + hours;
            if (minutes < 10) minutes = '0' + minutes;
            if (seconds < 10) seconds = '0' + seconds;

            //return [days, hours, minutes, seconds];
            return [minutes, seconds];
        },
        create_markup = (timer) => {
            let markup = '';

            for (let i = 0; i < timer.length; i++) {
                markup +=  timer[i];
                markup += i != timer.length - 1 ? ':' : '';
            }

            return markup;
        },
        set_values = () => {
            let now = new Date(),
                distance = end - +now;

            if (distance <= 0) {
                function_result(block, true);
                clearInterval(timer);
            } else {
                let timer = get_timer(distance),
                    markup = create_markup(timer);
                block.html(markup);
                function_result(markup, false);
            }
        },
        init = () => {
            //set_timer.count = 1;
            //set_timer.count == undefined ? set_timer.count = 1 : set_timer.count++;

            set_storage();
            update_settings();

            timer = setInterval(set_values, 1000);

            return timer;
        };

    return init();
}

function getDiffMinutes(startTime) {
    var endTime = new Date();
    endTime.setHours(endTime.getHours() - startTime.getHours());
    endTime.setMinutes(endTime.getMinutes() - startTime.getMinutes());
    endTime.setSeconds(endTime.getSeconds() - startTime.getSeconds());

    return {h:endTime.getHours(), m:endTime.getMinutes(), s:endTime.getSeconds()}
}
