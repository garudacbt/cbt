const cur_url = window.location.href;

if (!localStorage.getItem('ada_jadwal_ujian') && cur_url.indexOf('dashboard') === -1) {
    window.location.href = base_url + '/dashboard';
} else {
    adaJadwalUjian = localStorage.getItem('ada_jadwal_ujian');
}

let timerToken, timerUpdate;
let timerTokenRemaining, timerTokenOnGoing;
let forceGenerate = 0;
let timeOffset;

$(document).ready(function () {
    // cek token
    loadTokenFromServer();
});

function loadTokenFromServer() {
    $.ajax({
        url: base_url + "cbttoken/loadtoken",
        type: "GET",
        success: function (response) {
            globalToken = response;
            localStorage.setItem('token', JSON.stringify(response));
            //console.log('global', globalToken);
            createIntervalToken();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

function createIntervalToken() {
    const durasi = Number(globalToken.jarak);
    const perdetik = 1000;
    const permenit = 60 * perdetik;
    const perjam = 60 * permenit;
    const t_dur = durasi * (1000 * 60);

    //let elapsed = globalToken.elapsed;
    //const t_elapsed = elapsed.split(':');
    //let t_jam = Number(t_elapsed[0]);
    //let t_mnt = Number(t_elapsed[1]);
    //let t_dtk = Number(t_elapsed[2]);

    let updated = new Date(globalToken.updated);
    let time_c = new Date();
    let time_s = new Date(globalToken.now.date);
    let diff = time_s - time_c;

    updateViews();
    //initTimeout();

    function updateViews() {
        if (timerToken) {
            clearTimeout(timerToken);
            timerToken = null;
        }
        let now = new Date();
        now.setMilliseconds(now.getMilliseconds() + diff);
        var rem = now.getTime() - updated.getTime();
        const t_remaining = t_dur - rem;

        const viewTimer = $('#interval');
        if (viewTimer.length) viewTimer.addClass('d-none');

        const inputToken = $('#token-input');
        if (inputToken.length) inputToken.val(globalToken.token);

        const viewToken = $('#token-view');
        if (viewToken.length) viewToken.text(globalToken.token);

        const infoTimer = $('#info-interval');
        if (infoTimer.length) infoTimer.addClass('d-none');
        if (globalToken.auto == '1' && adaJadwalUjian != '0') {
            if (infoTimer.length) infoTimer.removeClass('d-none');
            if (viewTimer.length) viewTimer.removeClass('d-none');
            if (t_remaining < 0) {
                timerTokenRemaining = 'Membuat token baru...';
                //timerTokenOnGoing = zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk);
                //elapsed = timerTokenOnGoing;
                generateToken();
            } else {
                /*
                t_dtk++;
                if (t_dtk > 59) {
                    t_dtk = 0;
                    t_mnt++;
                }
                if (t_mnt > 59) {
                    t_mnt = 0;
                    t_jam++;
                }
                 */

                const r_jam = Math.floor(t_remaining / perjam);
                const r_mnt = Math.floor((t_remaining % perjam) / permenit);
                const r_dtk = Math.floor((t_remaining % permenit) / perdetik);

                timerTokenRemaining = zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk);
                //timerTokenOnGoing = zeroPad(t_jam) + ':' + zeroPad(t_mnt) + ':' + zeroPad(t_dtk);
                //elapsed = timerTokenOnGoing;
                timerToken = setTimeout(updateViews, 1000);
            }
        }
        if (viewTimer.length) viewTimer.html(timerTokenRemaining);
    }

    function initTimeout() {
        if (timerUpdate) {
            clearTimeout(timerUpdate);
            timerUpdate = null;
        }

        if (globalToken.auto == '1' && adaJadwalUjian != '0') {
            console.log('pending...', globalToken.timeout)
            forceGenerate = 0;
            if (globalToken.timeout <= 0) {
                generateToken();
            } else {
                setTimeout(generateToken, globalToken.timeout)
            }
        }
    }
}

function zeroPad(no) {
    return no < 10 ? '0' + no : no;
}

function generateToken() {
    ajaxcsrf();
    $.ajax({
        url: base_url + "cbttoken/generatetoken/",
        type: "GET",
        async: false,
        cache: false,
        data: 'data='+JSON.stringify(globalToken)+'&force='+forceGenerate,
        success: function (response) {
            console.log('tokenResult', response);
            localStorage.setItem('token', JSON.stringify(response));
            globalToken = response;
            createIntervalToken();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}