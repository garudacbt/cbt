<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

$elapsed_id = $siswa->id_siswa . $jadwal->id_jadwal;
if (isset($elapsed->lama_ujian)) {
	$elapsed_time = $elapsed->lama_ujian;
	$reset = $elapsed->reset;
} else {
	$elapsed_time = 0;
	$reset = 0;
}

$durasi = $jadwal->durasi_ujian;
$sisa_waktu = $durasi - $elapsed_time;

$log_siswa = empty($log) ? json_encode([]) : json_encode($log);


if ($this->agent->is_browser()){
	$agent = $this->agent->browser().' '.$this->agent->version();
}elseif ($this->agent->is_mobile()){
	$agent = $this->agent->mobile();
}else{
	$agent = 'unknown';
}

if ($agent == 'unknown') {
	return 'error';
} else {
	$os = $this->agent->platform();
	$ip = $this->input->ip_address();
}

if (empty($log) || (!empty($log) && $agent == $log[0]->agent && $ip == $log[0]->address && $os == $log[0]->device)) :
?>
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-green border-bottom-0">
        <div class="mx-auto text-white text-center" style="line-height: 1">
            <span class="text-lg p-0"><?=$setting->nama_aplikasi?></span>
            <br>
            <small>Tahun Pelajaran: <?= $tp_active->tahun ?> Smt:<?= $smt_active->smt ?></small>
        </div>
    </nav>
<div class="content-wrapper" style="margin-top: -1px;">
	<div class="sticky">
	</div>
	<section class="content overlap pt-4">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-6">
					<div class="info-box bg-transparent shadow-none">
						<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
						<div class="info-box-content">
							<span class="text-white" style="font-size: 24pt; line-height: 0.7;"><b>PUSPENDIK</b></span>
							<span class="text-white">C B T   A p p l i c a t i o n</span>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="float-right mt-2 d-none d-md-inline-block">
						<div class="float-right ml-4">
							<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
						</div>
						<div class="float-left" style="line-height: 1.2">
							<span class="text-white"><b><?= $siswa->nama ?></b></span>
							<br>
							<span class="text-white"><?= $siswa->nis ?></span>
							<br>
							<span class="text-white"><?= $siswa->nama_kelas ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="card my-shadow">
						<div class="card-header p-4">
							<div class="card-title">
								SOAL NOMOR:
								<div id="nomor-soal" class="btn bg-primary no-hover ml-2 text-lg"></div>
							</div>
							<div class="card-tools">
								<button class="btn btn-outline-danger btn-oval-sm no-hover">
									<span class='mr-4 d-none d-md-inline-block'><b>Sisa Waktu</b></span>
									<span id="timer"><b>00:00:00</b></span>
								</button>
								<button data-toggle="modal" data-target="#daftarModal"
										class="btn btn-primary btn-oval-sm">
									<span class="d-none d-md-inline-block mr-2"><b>Daftar Soal</b></span>
									<i class="fa fa-th"></i>
								</button>
							</div>
						</div>
						<div class="card-body p-3">
							<div class="konten-soal-jawab" style="border: 1px solid; border-color: #D3D3D3">
								<div class="row p-2 mb-4 ml-1">
									<div id="konten-soal">
									</div>
								</div>
								<?= form_open('jawab', array('id' => 'jawab')) ?>
								<div class="row p-3">
									<div id="konten-jawaban" class="ml-4 col-12">
									</div>
								</div>
								<?= form_close() ?>
							</div>
						</div>
						<div class="card-footer">
							<div class="d-flex justify-content-between bd-highlight">
								<div class="bd-highlight">
									<button class="btn btn-primary btn-oval-sm" id="prev" onclick="prevSoal()">
										<i class="fa fa-arrow-circle-left"></i>
										<span class="ml-2 d-none d-md-inline-block"><b>Soal Sebelumnya</b></span>
									</button>
								</div>
                                <!--
								<div class="bd-highlight btn-oval-sm btn-warning no-hover pr-3 pl-3 pt-0 pb-0">
									<div class="icheck-red">
										<input type='checkbox' id="ragu" name='hasil_tampil' value='1'/>
										<label for="ragu" class="text-white">Ragu-ragu</label>
									</div>
								</div>
								-->
								<div class="bd-highlight">
									<button class="btn btn-primary btn-oval-sm" id="next" onclick="nextSoal()">
										<span class="mr-2 d-none d-md-inline-block"><b>Soal Berikutnya</b></span>
										<i class="fa fa-arrow-circle-right"></i>
									</button>
                                    <button class="btn btn-success btn-oval-sm" id="finish" onclick="selesai()">
                                        <span class="mr-2 d-none d-md-inline-block"><b>Selesai</b></span>
                                        <i class="fa fa-check-circle"></i>
                                    </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="daftarLabel">Daftar Nomor Soal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<span id="title-pg"><b>Nomor Soal Pilihan Ganda</b></span>
					<br>
					<br>
					<div class="d-flex flex-wrap justify-content-center grid-nomor-pg">
					</div>
					<br>
					<span id="title-essai"><b>Nomor Soal Essai</b></span>
					<br>
					<br>
					<div class="d-flex flex-wrap justify-content-center grid-nomor-essai">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
			</div>
		</div>
	</div>
</div>

<script>
    var arrJawaban = [];
	var log = JSON.parse('<?= $log_siswa ?>');
	var idSiswa = <?= $siswa->id_siswa ?>;
	var idJadwal = <?= $jadwal->id_jadwal ?>;
	//console.log(log[0]);
	if (log.length === 0) {
		$.ajax({
			url: base_url + "siswaview/savelogujian/" + idSiswa + "/" +idJadwal,
			method: 'GET',
			success: function (data) {
				console.log(data);
			}, error: function (xhr, status, error) {
				console.log('error');
			}
		});
	}

	var jumOpsi = <?= $jadwal->opsi ?>;
	var bank_id = <?= $jadwal->id_bank ?>;
	var ID = <?= $elapsed_id ?>;
	var elapsed = <?= $elapsed_time ?>;

	var interval;
	let durasi = <?= $durasi ?>;
	let sisa = <?= $sisa_waktu ?>;
	let reset = <?= $reset ?>;

	let jmlPg = <?= $jadwal->tampil_pg?>;
	let jmlEssai = <?= $jadwal->tampil_esai?>;
	let acakSoal = <?= $jadwal->acak_soal ?>;
	let acakOpsi = <?= $jadwal->acak_opsi ?>;

    let lcurrentTime = localStorage.getItem('current' + ID);
    let ltargetTime = localStorage.getItem('target' + ID);
    let currentTime;
    let targetTime;
    let itemSoal;

    if (reset === 1 || (ltargetTime == null && lcurrentTime == null)) {
		elapsed = 0;
		currentTime = new Date();
		targetTime = new Date(currentTime.getTime() + (durasi * 60000));

		localStorage.setItem('current' + ID, currentTime);
		localStorage.setItem('target' + ID, targetTime);

		itemSoal = JSON.parse(localStorage.getItem('soal' + ID));
        console.log('reset === 1 || (ltargetTime == null && lcurrentTime == null)');
	} else if (reset === 2) {
		currentTime = new Date();
		targetTime = new Date(currentTime.getTime() + (sisa * 60000));

		localStorage.setItem('current' + ID, currentTime);
		localStorage.setItem('target' + ID, targetTime);
        itemSoal = JSON.parse(localStorage.getItem('soal' + ID));
        console.log('reset=2');
	} else {
        if (elapsed == 0) {
            currentTime = new Date();
            targetTime = new Date(currentTime.getTime() + (durasi * 60000));
            localStorage.setItem('current' + ID, currentTime);
            localStorage.setItem('target' + ID, targetTime);
            //itemSoal = JSON.parse(localStorage.getItem('soal' + ID));
            console.log('elapsed=0');
        } else {
            if (ltargetTime == null || lcurrentTime == null) {
                currentTime = new Date();
                targetTime = new Date(currentTime.getTime() + (durasi * 60000));
                localStorage.setItem('current' + ID, currentTime);
                localStorage.setItem('target' + ID, targetTime);
                console.log('ltargetTime == null || lcurrentTime == null');
            } else {
                currentTime = new Date(lcurrentTime);
                targetTime = new Date(ltargetTime);
                itemSoal = JSON.parse(localStorage.getItem('soal' + ID));
                console.log('lainnya');
            }
        }
	}

	//var test = new Date();
    //var test2 = new Date(test.getTime() + (durasi * 60000));
    //console.log(new Date(test.getTime()));
    //console.log(currentTime);
    //console.log(targetTime);

	if (!checkComplete()) {
		interval = setInterval(checkComplete, 1000);
	}

	function saveElapsedTime() {
	    elapsed += 1;
		$.ajax({
			url: base_url + "siswaview/savetimer?id_siswa=" + idSiswa + "&id_jadwal=" + idJadwal + "&elapsed=" + elapsed + "&id_durasi=" + ID,
			method: 'GET',
			success: function (data) {
				console.log(data.status);
			}, error: function (xhr, status, error) {
				console.log('error');
			}
		});
	}

	function checkComplete() {
		//console.log('target', targetTime);
		var now = new Date().getTime();
		var distance = targetTime - now;

		if (distance < 0) {
			clearInterval(interval);
			document.getElementById("timer").innerHTML = "WAKTU SUDAH HABIS";
			window.location.href = base_url + 'siswaview/cbt'
			//alert("Time is up");
		} else {
			//var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			if (hours < 10) {
				hours = '0' + hours;
			}

			if (minutes < 10) {
				minutes = '0' + minutes;
			}

			if (seconds < 10) {
				seconds = '0' + seconds;
			}

			document.getElementById("timer").innerHTML = "<b>" + hours + ":" + minutes + ":" + seconds + "</b>";

			if (seconds == '01') {
				saveElapsedTime();
			}
		}
	}

	document.onbeforeunload = function () {
		localStorage.setItem('current' + ID, currentTime);
	};

	window.onbeforeunload = function () {
		return 'Are you sure you want to leave?';
	};

	function createQueueNumber() {
		let arrSoal = [];

		let arrNumPg = [];
		for (let i = 0; i < jmlPg; i++) {
			arrNumPg.push(i+1);
		}

		if (acakSoal===1) {
			arrNumPg = shuffle(arrNumPg);

			for (let j = 0; j < arrNumPg.length; j++) {
				var itemA = {};
				itemA ["nomorTampil"] = j+1;
				itemA ["nomorSoal"] = arrNumPg[j];
				itemA ["jawaban"] = '';
				itemA ["type"] = 1;
				arrSoal.push(itemA);
			}
		} else {
			for (let k = 0; k < jmlPg; k++) {
				var itemB = {};
				itemB ["nomorTampil"] = k + 1;
				itemB ["nomorSoal"] = k + 1;
				itemB ["jawaban"] = '';
				itemB ["type"] = 1;
				arrSoal.push(itemB);
			}
		}

		let arrNumEss = [];
		for (let i = 0; i < jmlEssai; i++) {
			arrNumEss.push(i+1);
		}

		if (acakSoal===1) {
			arrNumEss = shuffle(arrNumEss);

			for (let j = 0; j < arrNumEss.length; j++) {
				var itemC = {};
				itemC ["nomorTampil"] = j+1;
				itemC ["nomorSoal"] = arrNumEss[j];
				itemC ["jawaban"] = '';
				itemC ["type"] = 2;
				arrSoal.push(itemC);
			}
		} else {
			for (let k = 0; k < jmlEssai; k++) {
				var itemD = {};
				itemD ["nomorTampil"] = k + 1;
				itemD ["nomorSoal"] = k + 1;
				itemD ["jawaban"] = '';
				itemD ["type"] = 2;
				arrSoal.push(itemD);
			}
		}

		localStorage.setItem('soal' + ID, JSON.stringify(arrSoal));

	}

	function shuffle(array) {
		var currentIndex = array.length, temporaryValue, randomIndex;
		// While there remain elements to shuffle...
		while (0 !== currentIndex) {
			// Pick a remaining element...
			randomIndex = Math.floor(Math.random() * currentIndex);
			currentIndex -= 1;
			// And swap it with the current element.
			temporaryValue = array[currentIndex];
			array[currentIndex] = array[randomIndex];
			array[randomIndex] = temporaryValue;
		}
		return array;
	}

	var currentItem;
	function loadSoalNomor(datas) {
		var key;
		var nomorSoal;
		var nomorTampil;
		var type;
		if (datas == null) {
			key = currentItem.pos;
			nomorSoal = itemSoal[currentItem.pos-1].nomorSoal;
			nomorTampil = itemSoal[currentItem.pos-1].nomorTampil;
			type = itemSoal[currentItem.pos-1].type;
		} else {
			key = $(datas).data('pos');
			nomorSoal = $(datas).data('nomorsoal');
			nomorTampil = $(datas).data('nomortampil');
			type = $(datas).data('type');
		}
		//console.log(key, nomorSoal, type);

		$('#daftarModal').modal('hide').data('bs.modal', null);
		$('#daftarModal').on('hidden', function () {
			$(this).data('modal', null);  // destroys modal
		});

		$.ajax({
			url: base_url + 'siswaview/loadNomorSoal/'+ ID + '/'+ bank_id + '/' + nomorSoal + '/' + type,
			type: 'GET',
            cache: false,
			success: function (response) {
                //console.log('sel',response.selesai);
                if (response.selesai) {
                    window.location.href = base_url + 'siswaview/cbt';
                } else {
                    var soal = response.soal;
                    //console.log(soal);
                    currentItem = {};
                    currentItem['pos'] = key;
                    currentItem['nomorSoal'] = nomorSoal;
                    currentItem['nomorTampil'] = nomorTampil;
                    currentItem['type'] = type;
                    localStorage.setItem('currentNomor' + ID, JSON.stringify(currentItem));

                    if (type == 2) {
                        if (soal != null) {
                            var item = itemSoal.findIndex(obj => obj.type == type, obj => obj.nomorSoal == nomorSoal);
                            itemSoal[item].jawaban = soal.jawaban_siswa;

                            localStorage.setItem('soal' + ID, JSON.stringify(itemSoal));
                            createModalContent();
                        }
                    }
                    setContent(soal);
                }
			},
			error: function (xhr, error, status) {
				console.log(xhr.responseText);
			}
		});
	}

	function prevSoal() {
		currentItem.pos = currentItem.pos-1;
		loadSoalNomor(null);
	}

	function nextSoal() {
		if (currentItem.pos < itemSoal.length) {
			currentItem.pos = currentItem.pos+1;
			loadSoalNomor(null);
		}
	}

	function setContent(item) {
	    //console.log(item);
		var values = ['A', 'B', 'C', 'D', 'E'];
		var opsi = ['opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'opsi_e'];

		$('#nomor-soal').html('<b>'+itemSoal[currentItem.pos-1].nomorTampil+'</b>');
		if (item != null) {
			$('#konten-soal').html(item.soal);

			var jawaban = '';
			if (itemSoal[currentItem.pos - 1].type === 1)  {
				for (let i = 0; i < jumOpsi; i++) {
					var jwbSiswa = item.jawaban_siswa != null ? item.jawaban_siswa.toUpperCase() : '';
					var checked = values[i] ===  jwbSiswa ? 'checked' : '';

					jawaban += '<label class="container-jawaban font-weight-normal">' + item[opsi[i]] +
						'<input type="radio" name="jawaban" value="'+values[i]+'" ' +
						'data-jawaban="'+values[i]+'" data-nomor="'+itemSoal[currentItem.pos - 1].nomorSoal+'" ' +
						'data-jenis="'+itemSoal[currentItem.pos - 1].type+'" onclick="submitJawaban(this)" '+checked+'>' +
						'<span class="checkmark shadow">'+values[i]+'</span>' +
						'</label>'
				}
				$('#konten-jawaban').html(jawaban);
			} else {
				var jwban = item.jawaban_siswa != null ? item.jawaban_siswa : '';
				$('#konten-jawaban').html('<div class="pr-4">' +
					'<label>JAWABAN:</label><br>' +
					'<textarea class="w-100 pl-1" type="text" name="jawaban" rows="4" placeholder="Tulis jawaban disini">'+jwban+'</textarea><br>' +
					'<button class="btn btn-success float-right" type="submit">Simpan Jawaban</button></div>');
			}
		} else {
			$('#konten-soal').html('Soal belum dibuat');
			$('#konten-jawaban').html('Soal belum dibuat');
		}

		if (itemSoal[currentItem.pos - 1].nomorTampil === 1 && itemSoal[currentItem.pos - 1].type === 1) {
			$('#prev').attr('disabled', 'disabled');
		} else {
			$('#prev').removeAttr('disabled');
		}

        if (itemSoal[currentItem.pos - 1].nomorTampil === itemSoal.length) {
            $('#next').hide();
            $('#finish').show();
        } else {
            $('#next').show();
            $('#finish').hide();
        }

		/*
		Mousetrap.bind('enter', function() {
			nextSoal()
		});

		Mousetrap.bind('right', function() {
			nextSoal()
		});

		Mousetrap.bind('left', function() {
			prevSoal()
		});

		Mousetrap.bind('a', function() {
			$('#A').click()
		});

		Mousetrap.bind('b', function() {
			$('#B').click()
		});

		Mousetrap.bind('c', function() {
			$('#C').click()
		});

		Mousetrap.bind('d', function() {
			$('#D').click()
		});

		Mousetrap.bind('e', function() {
			$('#E').click()
		});

		Mousetrap.bind('space', function() {
			$('input[type=checkbox]').click()
			radaragu();
		});
		*/
	}

	function submitJawaban(opsi) {
		var jawaban = $(opsi).data('jawaban');
		var nomor = $(opsi).data('nomor');
		var jenis = $(opsi).data('jenis');
		//console.log(jawaban, nomor, jenis);

		var item = itemSoal.findIndex((obj => obj.nomorSoal == nomor));
		itemSoal[item].jawaban = jawaban;

		localStorage.setItem('soal' + ID, JSON.stringify(itemSoal));
		createModalContent();

		$('#jawab').submit();
	}

	function createModalContent() {
	    arrJawaban = [];
		var gridNomorPg = '';
		var gridNomorEssai = '';
		$.each(itemSoal, function (key, entry) {
			var color = entry.jawaban === '' ? 'outline-secondary' : 'primary';
			if (entry.type === 1) {
				gridNomorPg += '<div class="mb-4">' +
					'<div class="d-flex flex-column" style="width: 70px; height: 60px;">' +
					'<button class="btn btn-'+color+' border border-dark" ' +
					'data-pos="'+(key+1)+'" data-nomortampil="'+entry.nomorTampil+'" ' +
					'data-nomorsoal="'+entry.nomorSoal+'" data-type="1" ' +
					'onclick="loadSoalNomor(this)" ' +
					'style="width: 50px; height: 50px; ">' +
					'<span style="font-size: 14pt"><b>'+entry.nomorTampil+'</b></span>' +
					'</button>';
				if (entry.jawaban !== '') {
				    arrJawaban.push(entry.jawaban);
					gridNomorPg += '<div id="jawab" class="badge badge-pill badge-success border border-dark"' +
						'  style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">'+entry.jawaban+'</div>';
				}
				gridNomorPg += '</div></div>';
			} else {
				gridNomorEssai += '<div class="mb-4">' +
					'<div class="d-flex flex-column" style="width: 70px; height: 60px;">' +
					'<button class="btn btn-'+color+'" ' +
					'data-pos="'+(key+1)+'" data-nomortampil="'+entry.nomorTampil+'" ' +
					'data-nomorsoal="'+entry.nomorSoal+'" data-type="2" ' +
					'onclick="loadSoalNomor(this)" ' +
					'style="width: 50px; height: 50px;">' +
					'<span style="font-size: 14pt"><b>'+entry.nomorTampil+'</b></span>' +
					'</button>';
				gridNomorEssai += '</div></div>';
			}
		});

		$('.grid-nomor-pg').html(gridNomorPg);
		$('.grid-nomor-essai').html(gridNomorEssai);

		if (jmlEssai === 0) {
			$('#title-essai').addClass('d-none');
		}
	}

	$(document).ready(function () {
	    console.log('essai', jmlEssai);
		if (itemSoal == null) {
			createQueueNumber();
			itemSoal = JSON.parse(localStorage.getItem('soal' + ID));
		}

		currentItem = JSON.parse(localStorage.getItem('currentNomor' + ID));
		//currentItem = null;
		if (currentItem == null) {
			currentItem = {};
			currentItem['pos'] = 1;
			currentItem['nomorSoal'] = itemSoal[currentItem.pos-1].nomorSoal;
			currentItem['nomorTampil'] = itemSoal[currentItem.pos-1].nomorTampil;
			currentItem['type'] = 1;

			localStorage.setItem('currentNomor' + ID, JSON.stringify(currentItem));
		}

		createModalContent();

		loadSoalNomor(null);

		if (elapsed < 1) {
            saveElapsedTime();
        }

        $('#jawab').on('submit', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			$.ajax({
				url: base_url + 'siswaview/savejawaban',
				type: 'POST',
				data: $(this).serialize() +
					'&id=' + ID +
					'&id_bank=' + bank_id +
					'&nomor=' + itemSoal[currentItem.pos-1].nomorSoal +
					'&jenis=' + itemSoal[currentItem.pos-1].type,
				success: function (response) {
					console.log(response);
				},
				error: function (xhr, error, status) {
					console.log(xhr.responseText);
				}
			});
		});
	});

    function selesai() {
        if (arrJawaban.length === (parseInt(jmlPg) + parseInt(jmlEssai))) {
            swal.fire({
                title: "Kamu yakin?",
                text: "Kamu akan menyelesaikan ujian",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Selesaikan!"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: base_url + 'siswaview/selesaiujian/'+idSiswa+'/'+idJadwal,
                        type: "GET",
                        success: function (respon) {
                            console.log(respon);
                            if (respon.status) {
                                window.location.href = base_url + 'siswaview/cbt';
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak bisa menyelesaikan ujian",
                                    icon: "error"
                                });
                            }
                        },
                        error: function () {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menyelesaikan ujian",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        } else {
            swal.fire({
                title: "BELUM SELESAI!",
                text: "Masih ada soal yang belum dikerjakan",
                icon: "error",
                confirmButtonColor: "#3085d6",
            });
        }
    }

</script>

<?php else: ?>
	<div class="content-wrapper" style="margin-top: -1px;">
		<div class="sticky">
		</div>
		<section class="content overlap pt-4">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-6">
						<div class="info-box bg-transparent shadow-none">
							<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
							<div class="info-box-content">
								<span class="text-white" style="font-size: 24pt; line-height: 0.7;"><b>PUSPENDIK</b></span>
								<span class="text-white">C B T   A p p l i c a t i o n</span>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="float-right mt-2 d-none d-md-inline-block">
							<div class="float-right ml-4">
								<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
							</div>
							<div class="float-left" style="line-height: 1.2">
								<span class="text-white"><b><?= $siswa->nama ?></b></span>
								<br>
								<span class="text-white"><?= $siswa->nis ?></span>
								<br>
								<span class="text-white"><?= $siswa->nama_kelas ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="card my-shadow">
							<div class="card-body p-3">
								<div class="alert alert-danger text-center p-5">
									<h2><i class="icon fas fa-ban"></i> WARNING..!!</h2>
									<div class="text-lg">
										Ujian tidak bisa dilanjutkan
										<br>
										hubungi proktor
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php endif; ?>
