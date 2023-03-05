const cur_url = window.location.href;

if (!localStorage.getItem('ada_jadwal_ujian') && cur_url.indexOf('dashboard') === -1) {
    window.location.href = base_url + '/dashboard';
} else {
    adaJadwalUjian = localStorage.getItem('ada_jadwal_ujian');
}

import { getServerDate } from "./serverDate.js";

let timerTokenRemaining;
let isIddle = true;
let intervalSync, intervalUpdate;
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
            letInterval();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

function zeroPad(no) {
    return no < 10 ? '0' + no : no;
}

export function generateToken() {
    ajaxcsrf();
    $.ajax({
        url: base_url + "cbttoken/generatetoken/",
        type: "GET",
        async: false,
        cache: false,
        data: 'data='+JSON.stringify(globalToken)+'&force='+forceGenerate,
        success: function (response) {
            localStorage.setItem('token', JSON.stringify(response));
            globalToken = response;
            letInterval();
        },
        error: function (xhr, status, error) {
            console.log(xhr);
        }
    });
}

let lastSample = {};

const synchronize = async () => {
    lastSample = await getServerDate();
};

const perdetik = 1000;
const permenit = 60 * perdetik;
const perjam = 60 * permenit;

const updateClocks = () => {
    const { offset, uncertainty } = lastSample;
    const clientDate = new Date();
    const serverDate = new Date(clientDate.getTime() + offset);

    if (offset != undefined) {
        var up = new Date(globalToken.updated);
        const t_dur = Number(globalToken.jarak) * (1000 * 60);

        const t_ongoing = serverDate.getTime()-up.getTime();

        const t_remaining = t_dur - t_ongoing;
        const r_jam = Math.floor(t_remaining / perjam);
        const r_mnt = Math.floor((t_remaining % perjam) / permenit);
        const r_dtk = Math.floor((t_remaining % permenit) / perdetik);

        timerTokenRemaining = zeroPad(r_jam) + ':' + zeroPad(r_mnt) + ':' + zeroPad(r_dtk);
        const viewTimer = $('#interval');
        const inputToken = $('#token-input');
        const viewToken = $('#token-view');
        const infoTimer = $('#info-interval');
        if (globalToken.auto == '1' && adaJadwalUjian != '0') {
            if (infoTimer.length) infoTimer.removeClass('d-none');
            if (viewTimer.length) viewTimer.removeClass('d-none');
        }
        if (t_ongoing >= t_dur) {
            timerTokenRemaining = '...';
            if (isIddle) {
                isIddle = false;
                forceGenerate = 0;
                generateToken();
            }
        }
        if (viewTimer.length) viewTimer.html(timerTokenRemaining);
        if (inputToken.length) inputToken.val(globalToken.token);
        if (viewToken.length) viewToken.text(globalToken.token);
        isIddle = t_ongoing > 50000;
    }
};

function letInterval() {
    if (intervalSync) {
        clearInterval(intervalSync);
        intervalSync = null;
    }
    if (intervalUpdate) {
        clearInterval(intervalUpdate);
        intervalUpdate = null;
    }

    const viewTimer = $('#interval');
    if (viewTimer.length) viewTimer.addClass('d-none');
    const infoTimer = $('#info-interval');
    if (infoTimer.length) infoTimer.addClass('d-none');

    synchronize();
    updateClocks();
    if (globalToken.auto == '1' && adaJadwalUjian != '0') {
        intervalSync = setInterval(synchronize, 10 * 60 * 1000);
        intervalUpdate = setInterval(updateClocks, 1000);
    }
}

