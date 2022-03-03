<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$kelas_pilih = unserialize($materi->materi_kelas);

$dataFileAttach = [];
$att = @unserialize($materi->file);
if ($att !== false) {
	$dataFileAttach = unserialize($materi->file);
} else {
	if ($materi->file != null) {
		$file = $materi->file;
		if (strpos($file, 'http') == false) {
			$file = base_url('uploads/materi/').$materi->file;
		}
		$src_file = [
			'src' => $file,
			'size' => '',
			'type' => mime_content_type(str_replace(base_url(), '', $file)),
			'name' => $materi->file
		];
		array_push($dataFileAttach, $src_file);
	}
}

if (empty($kelas_pilih)) {
	$arrKelasSelected[] = [
		'mapel' => '0', 'kelas' => '0'
	];
} else {
	foreach ($kelas_pilih as $m) {
		$arrKelasSelected[] = [
			'mapel' => $materi->id_mapel, 'kelas' => $m
		];
	}
}

?>

<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-6">
					<h1><?= $judul ?></h1>
				</div>
				<div class="col-6">
					<button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
						<i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
					</button>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
            <div class="alert alert-default-warning align-content-center" role="alert">
                Untuk memulai membuat MATERI PEMBELAJARAN, pastikan setiap Guru sudah diatur mapelnya
            </div>

            <div class="card card-default my-shadow mb-4">
				<?= form_open('', array('id' => 'formmateri')) ?>
				<div class="card-header">
					<h6 class="card-title"><?= $subjudul ?></h6>
					<div class="card-tools">
						<button type="submit" class="btn btn-primary btn btn-sm float-right ml-1">Simpan</button>
					</div>
				</div>
				<div class="card-body">
					<input type="hidden" class="form-control" name="id_materi" value="<?= $id_materi ?>">
                    <input type="hidden" class="form-control" name="jenis" value="<?= $jenis ?>">
					<div id="input-materi" class="row">
						<div class="col-md-3 mb-3">
							<label>Kode</label>
							<input name="kode_materi" value="<?=$materi->kode_materi?>" type="text" class="form-control form-control-sm" required>
						</div>
						<div class="col-md-3 mb-3">
							<label>Guru</label>
							<?php echo form_dropdown(
								'guru',
								$gurus,
								$id_guru,
								'id="guru" class="select2 form-control" required'
							); ?>
						</div>
						<div class='col-md-3 mb-3'>
							<label>Mapel</label>
							<select name="mapel" id="mapel" class="select2 form-control w-100" required=""></select>
						</div>
						<div class='col-md-3 mb-3'>
							<label>Kelas</label>
							<select name="kelas[]" id="kelas" class="select2 form-control" multiple="multiple"
									data-placeholder="Pilih Kelas" required=""></select>
						</div>
						<div class="col-12 mb-3">
							<label>Judul Materi</label>
							<input type="text" class="form-control" name="judul" aria-describedby="helpId"
								   value="<?= $materi->judul_materi ?>" placeholder="Judul materi" required>
						</div>
						<div class="col-12 mb-3">
							<label>Isi Materi</label>
							<textarea id="text-materi" name='isi_materi' class='editor'
                                      spellcheck="false" autocomplete="off"
									  data-id="<?= $this->security->get_csrf_hash() ?>"
									  data-name="<?= $this->security->get_csrf_token_name() ?>"
									  rows='10' cols='80' style='width:100%;'>
                            </textarea>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
				<?= form_open_multipart('', array('id' => 'formfile')) ?>
				<div class="card card-default m-4">
					<div class="card-header">
						<h6 class="card-title">File Pendukung</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<ul id="media-list" class="clearfix">
								<li class="myupload">
                                    <span>
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <input name="file_uploads" type="file" id="picupload"
											   class="picupload">
                                    </span>
								</li>
							</ul>
						</div>
					</div>
					<div class="card-footer">
						Info:
					</div>
					<div class="overlay d-none"><i class="fas fa-2x fa-sync-alt fa-spin mr-4"></i> Memuat file ...</div>
				</div>
				<?= form_close(); ?>

                <div class="overlay" id="loading">
                    <div class="spinner-grow"></div>
                </div>
			</div>
	</section>
</div>

<?= form_open('', array('id' => 'csrf')) ?>
<?= form_close(); ?>

<script>
	const kls = JSON.parse('<?=json_encode($kelas)?>');
    var jenis = '<?=$jenis?>';
	var arrJadwal = [];
	var arrKelas = [];
	var arrKelasMapel = [];
	var dataFiles = [];
	var arrFileAttach = JSON.parse('<?= json_encode($dataFileAttach)?>');
	dataFiles = $.merge(dataFiles, arrFileAttach);

	$.map(kls, function (value, index) {
		item = {};
		item ["id"] = index;
		item ["kelas"] = value;
		arrKelas.push(item);
		//return [index];
	});

	$(document).ready(function () {

        $('#text-materi').summernote({
            tabsize: 2,
            minHeight: 200,
            /*
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'file', 'removeFile']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            placeholder: 'Tulis isi materi disini',
            */
            callbacks: {
                /*
                onImageUpload: function (image) {
                    var idtextarea = $(this);
                    uploadFileSummernote(image[0]);
                },
                onMediaDelete: function (target) {
                    deleteImage(target[0].src);
                },
                onFileUpload: function (file) {
                    uploadFileSummernote(file[0]);
                },
                */
                onInit: function() {
                    console.log('Summernote is launched');
                    $('#loading').addClass('d-none');
                },
                //onChange: function(contents, $editable) {
                //    console.log('onChange:', contents, $editable);
                //}
            }
        });
        var isiMateri = `<?=$materi->isi_materi?>`;
        var checkMateri = isiMateri == null ? '' : isiMateri;
        var sMateri = $($.parseHTML(checkMateri));


        sMateri.find(`img`).each(function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url+curSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        $('#text-materi').summernote('code', sMateri);



	    console.log('kls',arrKelas);
		$('#kelas').select2();
		$('#guru').select2();
		createPreviewFile();

		onChangeGuru('<?=$id_guru?>');
		console.log(dataFiles);

		$('#guru').on('change', function () {
			onChangeGuru($(this).val());
		});

		$('#mapel').on('change', function (e) {
			//console.log('change mapel', $(this).val());
			onChangeMapel($(this).val());
		});

		$('#kelas').on('select2:select select2:unselect', function (e) {
			onChangeKelas($(this).val(), e);
		});

		$("#picupload").on('change', function (e) {
			var form = new FormData($("#formfile")[0]);
			//console.log('nama file', names_files);
			uploadAttach(base_url + 'kelasmateri/uploadfile', form);
			//createPreviewFile($(this), e)
		});

		$('#formmateri').submit(function (e) {
			e.stopPropagation();
			e.preventDefault();
			var dataUpload = new FormData($('#formmateri')[0]);
			dataUpload.append('attach', JSON.stringify(dataFiles));
			console.log(dataUpload);

			$.ajax({
				method: 'POST',
				url: base_url + 'kelasmateri/savemateri',
				enctype: 'multipart/form-data',
				data: dataUpload,
				cache: false,
				contentType: false,
				processData: false,
				success: function (data) {
					if (data.status === 'error') {
						showDangerToast(data.status);
					} else {
					    showSuccessToast('Berhasil disimpan');
						//setTimeout(function () {
						//	window.history.back();
							//showSuccessToast(data.status)
						//}, 1000);
					}
				}, error: function (data) {
					showDangerToast('Gagal membuat materi');
					console.log(data.responseText);
				}
			});
		});

		$('body').on('click', '.remove-pic', function() {
			$(this).parent().parent().parent().remove();
			var removeItem = $(this).attr('data-id');

			for (var i = 0; i < dataFiles.length; i++) {
				var cur = dataFiles[i];
				if (cur.name === removeItem) {
					dataFiles.splice(i, 1);
					deleteImage(cur.src);
					break;
				}
			}
			console.log(dataFiles);
		});

	});

	function onChangeGuru(idGuru) {
		var selMapel = $('#mapel');
		selMapel.html('').select2({data: null}).trigger('change');
		$.ajax({
			type: 'GET',
			url: base_url + 'kelasmateri/dataaddkelas/' + idGuru,
			//data: data,
			success: function (data) {
				arrKelasMapel = [];
				selMapel.append(new Option('Pilih Mapel :', '', false, false));
				for (let i = 0; i < data.length; i++) {
					var selected = '<?=$materi->id_mapel?>' === data[i].id_mapel;
					selMapel.append(new Option(data[i].nama_mapel, data[i].id_mapel, false, selected));
					$.map(data[i].kelas_mapel, function (value, index) {
						if (value.kelas != null) {
							for (let l = 0; l < arrKelas.length; l++) {
								if (arrKelas[l].id === value.kelas) {
									item = {};
									item ['mapel'] = data[i].id_mapel;
									item ["id"] = arrKelas[l].id;
									item ["kelas"] = arrKelas[l].kelas;
									arrKelasMapel.push(item);
								}
							}
						}
					});
					if (selected) {
						onChangeMapel('<?=$materi->id_mapel?>');
					}
				}
				selMapel.trigger('change');
			}
		});
	}

	function onChangeMapel(mapel) {
		var selKelas = $('#kelas');
		selKelas.html('').select2({data: null}).trigger('change');

		var kelas = JSON.parse('<?= json_encode($arrKelasSelected) ?>');
		var as = [];
		for (let i = 0; i < kelas.length; i++) {
			if (kelas[i].mapel === mapel) {
				as.push(kelas[i].kelas);
			}
		}

		for (let j = 0; j < arrKelasMapel.length; j++) {
			if (arrKelasMapel[j].id != null && arrKelasMapel[j].mapel === mapel) {
				var select = jQuery.inArray(arrKelasMapel[j].id, as) > -1;
				selKelas.append(new Option(arrKelasMapel[j].kelas, arrKelasMapel[j].id, false, select));
			}
		}
		selKelas.trigger('change');
	}

	function onChangeKelas(kelas, e) {
		arrJadwal = [];
		var selMapel = $('#mapel');
		console.log(selMapel.val(), kelas);
		$.ajax({
			methode: 'GET',
			url: base_url + 'kelasmateri/dataaddjadwal?mapel='+selMapel.val()+'&kelas='+kelas,
			success: function (data) {
				for (let i = 0; i < data.length; i++) {
					arrJadwal.push(data[i].id_jadwal);
				}
				console.log('result', arrJadwal);
			}
		});
	}

	function uploadFileSummernote(file) {
		var name = $('#text-materi').attr('data-name');
		var hash = $('#text-materi').attr('data-id');

		let data = new FormData();
		data.append("file_uploads", file);
		data.append(name, hash);
		$.ajax({
			type: "POST",
			url: base_url + 'kelasmateri/uploadfile',
			data: data,
			enctype: 'multipart/form-data',
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			xhr: function () { //Handle progress upload
				let myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
				return myXhr;
			},
			success: function (reponse) {
				if (reponse.status) {
					let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
					let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
					let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
					let elem;

					if (listMimeImg.indexOf(file.type) > -1) {
						//Picture
						$('.editor').summernote('editor.insertImage', reponse.src);
					} else if (listMimeAudio.indexOf(file.type) > -1) {
						//Audio
						elem = document.createElement("audio");
						elem.setAttribute("src", reponse.src);
						elem.setAttribute("controls", "controls");
						elem.setAttribute("preload", "metadata");
						$('.editor').summernote('editor.insertNode', elem);
					} else if (listMimeVideo.indexOf(file.type) > -1) {
						//Video
						elem = document.createElement("video");
						elem.setAttribute("src", reponse.src);
						elem.setAttribute("controls", "controls");
						elem.setAttribute("preload", "metadata");
						$('.editor').summernote('editor.insertNode', elem);
					} else {
						//Other file type
						elem = document.createElement("a");
						let linkText = document.createTextNode(file.name);
						elem.appendChild(linkText);
						elem.title = file.name;
						elem.href = reponse.filename;
						$('.editor').summernote('editor.insertNode', elem);
					}
				}
			}, error: function (data) {
				//showDangerToast('Gagal membuat materi');
				console.log(data);
			}
		});
	}

	function progressHandlingFunction(e) {
		if (e.lengthComputable) {
			//Log current progress
			console.log((e.loaded / e.total * 100) + '%');

			//Reset progress on complete
			if (e.loaded === e.total) {
				console.log("Upload finished.");
			}
		}
	}

	function uploadAttach(action, data) {
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: action,
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			timeout: 600000,
			success: function (data) {
				console.log('result', data.filename);
				//dataFiles.push(data.src);
				//$('#files-attach').val(JSON.stringify(names_files));
				var item = {};
				item ['size'] = data.size;
				item ["type"] = data.type;
				item ["src"] = data.src;
				item ["name"] = data.filename;
				dataFiles.push(item);
				console.log(data.type);
				createPreviewFile();

                $('#formmateri').submit();
			},
			error: function (e) {
				console.log("error", e.responseText);
				$.toast({
					heading: "ERROR!!",
					text: "file tidak terbaca",
					icon: 'error',
					showHideTransition: 'fade',
					allowToastClose: true,
					hideAfter: 5000,
					position: 'top-right'
				});
			}
		});
	}

	function deleteImage(src) {
	    var csrf = $('#csrf').serialize() + '&src=' + src;
	    console.log(csrf);
		$.ajax({
			data: csrf,
			type: "POST",
			url: base_url + "kelasmateri/deletefile",
			cache: false,
			success: function (response) {
				console.log(response);
                $('#formmateri').submit();
			}
		});
	}

	function createPreviewFile(/*elem, event*/) {
		//var files = event.target.files;
		for (var j = 0; j < dataFiles.length; j++) {
			let file = dataFiles[j];
			//names_files.push(elem.get(0).files[j].name);
			var div = document.createElement("li");
			div.setAttribute("id", "f-" + file.name);
			if (!$("#f-" + file.name).length) {
				if (file.type.match('image')) {
					div.innerHTML = "<img src='" + base_url + file.src + "'/>" +
						"<div  class='post-thumb'>" +
						"<div class='inner-post-thumb'>" +
						"<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
						"<i class='fa fa-times' aria-hidden='true'></i></a>" +
						"<div>" +
						"</div>";
					$("#media-list").prepend(div);
				} else if (file.type.match('video')) {
					div.innerHTML = "<video src='" + base_url + file.src + "'></video>" +
						"<div class='post-thumb'>" +
						"<div  class='inner-post-thumb'>" +
						"<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
						"<i class='fa fa-times' aria-hidden='true'></i></a>" +
						"<div>" +
						"</div>";
					$("#media-list").prepend(div);
				} else {
					div.innerHTML = "<img src='" + base_url + "/assets/app/img/document_file.png'>" +
						"<div class='post-thumb'>" +
						"<div  class='inner-post-thumb'>" +
						"<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
						"<i class='fa fa-times' aria-hidden='true'></i></a>" +
						"<div>" +
						"</div>";
					$("#media-list").prepend(div);
				}
			}

		}
		console.log(dataFiles);

    }

	var entityMap = {
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		"'": '&#39;',
		'/': '&#x2F;',
		'`': '&#x60;',
		'=': '&#x3D;'
	};

	function escapeHtml (string) {
		return String(string).replace(/[&<>"'`=\/]/g, function (s) {
			return entityMap[s];
		});
	}
</script>

