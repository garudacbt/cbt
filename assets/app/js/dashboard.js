let halaman = 0;

function createTime(d) {
    var date = new Date(d);

    var jam = date.getHours();
    var menit = date.getMinutes();
    var sJam;
    var sMenit;

    if (jam < 10) sJam = '0' + jam;
    else sJam = '' + jam;

    if (menit < 10) sMenit = '0' + menit;
    else sMenit = '' + menit;

    var hari = daysdifference(d);
    var time;

    if (hari === 0) {
        time = sJam + ':' + sMenit;
    } else if (hari === 1) {
        time = 'kemarin ' + sJam + ':' + sMenit;
    } else {
        time = jQuery.timeago(d) + ', ' + sJam + ':' + sMenit;
    }
    return time;
}

function daysdifference(last) {
    var startDay = new Date(last);
    var endDay = new Date();

    var millisBetween = startDay.getTime() - endDay.getTime();
    var days = millisBetween / (1000 * 3600 * 24);

    return Math.round(Math.abs(days));
}

function addComments(id, comments, append) {
    var comm = '';
    $.each(comments, function (i, v) {
        var dari, foto, avatar;
        if (v.dari == '0') {
            dari = 'Admin';
            avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="40px" height="40px">' :
                '<div class="btn-circle-sm btn-success media-left pt-1" style="width: 43px; height: 40px">A</div>'
        } else {
            if (v.dari_group == '2') {
                dari = v.nama_guru;
                foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
            } else {
                dari = v.nama_siswa;
                foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
            }
        }

        comm += '<div class="media mt-1" id="parent-reply' + v.id_comment + '">'
            + avatar +
            '    <div class="w-100 ml-2">' +
            '        <div class="media-body border pl-3 bg-light" style="border-radius: 20px">' +
            '            <span class="text-xs text-muted"><b>' + dari + '</b></span>' +
            '            <div class="comment-text pb-1">' + v.text + '</div>' +
            '        </div>' +
            '        <div class="ml-2">' +
            '            <span class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</span>' +
            '            <span id="trigger-reply'+v.id_comment+'" class="btn btn-sm mr-2 text-muted action-collapse" data-toggle="collapse" aria-expanded="true"' +
            '                              aria-controls="collapse-reply' + v.id_comment + '"' +
            '                              href="#collapse-reply' + v.id_comment + '"><b>' + v.jml + ' balasan</b></span>' +
            '            <span class="btn btn-sm mr-2 text-muted btn-toggle-reply"' +
            '                  data-id="' + v.id_comment + '" data-toggle="modal" data-target="#balasanModal">' +
            '                <i class="fas fa-reply"></i> <b>Balas</b></span>' +
            '<span class="btn btn-sm text-muted" onclick="hapusKomentar('+v.id_comment+')" data-id="'+v.id_comment+'"><i class="fa fa-trash mr-1"></i> Hapus</span>'+
            '        </div>' +
            '<div id="collapse-reply' + v.id_comment + '" class="p-2 collapse toggle-reply" data-id="' + v.id_comment + '" data-parent="#parent-reply' + v.id_comment + '">';
        if (v.jml != '0') {
            comm += '<div id="konten-reply' + v.id_comment + '"></div>'+
                '<div id="loadmore-reply' + v.id_comment + '" onclick="getReplies('+v.id_comment+')" class="text-center mb-3 loadmore-reply">' +
                '       <div class="btn btn-default">Muat balasan lainnya ...</div>' +
                '</div>';
        } else {
            comm += '<div class="text-center" id="empty-comment">Tidak ada komentar</div>';
        }
        comm += '    <div id="loading-reply' + v.id_comment + '" class="text-center d-none">' +
            '        <div class="spinner-grow"></div>' +
            '    </div>' +
            '</div>'+
            '    </div>' +
            '</div>';
    });

    if (append) {
        $(`#konten${id}`).append(comm);
    } else {
        $(`#konten${id}`).prepend(comm);
    }

    $('.toggle-reply').on('shown.bs.collapse', function (e) {
        var konten = $(this);
        var id = konten.data('id');
        var list = $(this).find('.media').length;
        if (list === 0) $(`#loadmore-reply${id}`).click();
    });

    $('#empty-comment').remove();
}

function addReplies(id, replies, append) {
    //console.log('replies', replies);
    var repl = '';
    $.each(replies, function (i, v) {
        var sudahAda = $(`.media${v.id_reply}`).length;
        if (!sudahAda) {
            var dari, foto, avatar;
            if (v.dari == '0') {
                dari = 'Admin';
                avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="35px" height="35px">' :
                    '<div class="btn-circle-sm btn-success media-left pt-1 mr-2" style="width: 37px">A</div>';
            } else {
                if (v.dari_group == '2') {
                    dari = v.nama_guru;
                    foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                } else {
                    dari = v.nama_siswa;
                    foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                }
            }

            repl +=
                '<div class="media mt-1 media'+v.id_reply+'">'
                + avatar +
                '    <div class="w-100">' +
                '        <div class="media-body border pl-3" style="border-radius: 17px; background-color: #dee2e6">' +
                '            <span class="text-xs text-muted"><b>'+dari+'</b></span>' +
                '            <div class="comment-text">' + v.text +
                '            </div>' +
                '        </div>' +
                '        <div class="ml-2">' +
                '            <small class="btn-sm mr-2 text-muted">'+createTime(v.tanggal)+'</small>' +
                '            <span class="btn btn-sm text-muted" onclick="hapusReply('+v.id_reply+')" data-id="'+v.id_reply+'">' +
                '                <i class="fa fa-trash mr-1"></i> Hapus' +
                '            </span>'+
                '        </div>' +
                '    </div>' +
                '</div>';
        }
    });

    if (append) {
        $(`#konten-reply${id}`).append(repl);
    } else {
        $(`#konten-reply${id}`).prepend(repl);
    }
    //console.log('added', 'reply'+id);
}

function getComments(id) {
    $(`#loading${id}`).removeClass('d-none');
    $(`#loadmore${id}`).addClass('d-none');
    var $count = $(`#loadmore${id}`), page = $count.data('count');
    if (!page) page = 0;

    setTimeout(function () {
        $.ajax({
            url: base_url + "pengumuman/getcomment/" + id + "/" + page,
            type: "GET",
            success: function (response) {
                console.log("result", response);
                page += 1;
                currentPage = page;
                $count.data('count', page);

                if (response.length === 5) {
                    $(`#loadmore${id}`).removeClass('d-none');
                }
                $(`#loading${id}`).addClass('d-none');
                addComments(id, response, true)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
            }
        });
    }, 500);
}

function getReplies(id) {
    $(`#loading-reply${id}`).removeClass('d-none');
    $(`#loadmore-reply${id}`).addClass('d-none');
    var $count = $(`#loadmore-reply${id}`), page = $count.data('count');
    if (!page) page = 0;

    setTimeout(function () {
        $.ajax({
            url: base_url + "pengumuman/getreplies/" + id + "/" + page,
            type: "GET",
            success: function (response) {
                console.log("result", response);
                page += 1;
                currentPage = page;
                $count.data('count', page);

                //n >= start && n <= end
                if (response.length === 5) {
                    $(`#loadmore-reply${id}`).removeClass('d-none');
                }
                $(`#loading-reply${id}`).addClass('d-none');
                addReplies(id, response, true)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
            }
        });
    }, 500);
}

function addPosts(response) {
    var card = '';

    if (response.length > 0) {
        $.each(response, function (i, v) {
            var dari, foto, avatar;
            if (v.dari == '0') {
                dari = 'Admin';
                avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="50px" height="50px">' :
                    '<div class="btn-circle btn-success media-left pt-1 align-middle">A</div>';
            } else {
                if (v.dari_group == '2') {
                    dari = v.nama_guru;
                    foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                } else {
                    dari = v.nama_siswa;
                    foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                }
            }

            card += '<div class="card card-default">' +
                '    <div class="card-body" id="parent'+v.id_post+'">' +
                '        <div class="media">' +
                avatar +
                '                <div class="media-body ml-3">' +
                '                    <span class="font-weight-bold"><b>'+dari+'</b></span>' +
                '                    <br/>' +
                '                    <span class="text-gray">' + createTime(v.tanggal) + '</span>' +
                '                </div>' +
                '        </div>' +
                '        <div class="mt-2">' + v.text + '</div>' +
                '        <div class="text-muted">' +
                '            <button type="button" class="btn btn-default btn-sm mr-2 btn-toggle"' +
                '                    data-id="'+v.id_post+'" data-toggle="modal"' +
                '                    data-target="#komentarModal"><i class="fas fa-reply mr-1"></i> Tulis komentar' +
                '            </button>' +
                '            <button type="button" id="trigger'+v.id_post+'" class="btn btn-default btn-sm mr-2 action-collapse"' +
                '                    data-toggle="collapse" aria-expanded="true"' +
                '                    aria-controls="collapse-'+v.id_post+'"' +
                '                    href="#collapse-'+v.id_post+'">' +
                '                <i class="fa fa-commenting-o mr-1"></i>'+v.jml+' komentar' +
                '            </button>' +
                '            <button type="button" class="btn btn-default btn-sm" onclick="hapusPost('+v.id_post+')" data-id="'+v.id_post+'">' +
                '                <i class="fa fa-trash mr-1"></i> Hapus' +
                '            </button>' +
                '        </div>' +
                '    </div>' +
                '    <div id="collapse-'+v.id_post+'" class="p-2 collapse toggle-comment"' +
                '         data-id="'+v.id_post+'" data-parent="#parent'+v.id_post+'">' +
                '        <hr class="m-0">' +
                '        <div id="konten'+v.id_post+'" class="p-4">' +
                '        </div>' +
                '        <div id="loading'+v.id_post+'" class="text-center d-none">' +
                '            <div class="spinner-grow"></div>' +
                '        </div>';
            if (v.jml=='0'){
                card += '<div class="text-center" id="empty-comment">Tidak ada komentar</div>';
            } else {
                card += '<div id="loadmore'+v.id_post+'"' +
                    '     onclick="getComments('+v.id_post+')"' +
                    '     class="text-center mt-4 loadmore">' +
                    '    <div class="btn btn-default">Muat komentar lainnya ...</div>' +
                    '</div>';
            }
            card += '</div>' +
                '</div>';
        });
    } else {
        card = '<div class="card card-default">' +
            '<div class="card-body">' +
            ' <p>Tidak ada pengumuman</p>' +
            '</div></div>';
    }

    $('#pengumuman').html(card);

    $('.toggle-comment').on('shown.bs.collapse', function (e) {
        var konten = $(this);
        var id = konten.data('id');
        var list = $(this).find('.media').length;
        if (list === 0) $(`#loadmore${id}`).click();
    });

    $('#komentarModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id-post").val(id);

        var isVisible = $(`#collapse-${id}`).hasClass('show');
        if (!isVisible) {
            $(`#trigger${id}`).click();
        }
    });

    $('#balasanModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $("#id-comment").val(id);

        var isVisible = $(`#collapse-reply${id}`).hasClass('show' );
        if (!isVisible) {
            $(`#trigger-reply${id}`).click();
        }
    });

    $('#komentar').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        //console.log("data", $(this).serialize());
        var id = $(this).find('input[name=id_post]').val();

        $.ajax({
            url: base_url + "pengumuman/savekomentar",
            data: $(this).serialize(),
            method: 'POST',
            dataType: "JSON",
            success: function (response) {
                console.log("result", response);
                $('#komentarModal').modal('hide').data('bs.modal', null);
                $('#komentarModal').on('hidden', function () {
                    $(this).data('modal', null);
                });
                addComments(id, response, false)
                //window.location.href = base_url + 'pengumuman';
            },
            error: function (xhr, status, error) {
                $('#komentarModal').modal('hide').data('bs.modal', null);
                $('#komentarModal').on('hidden', function () {
                    $(this).data('modal', null);
                });
                showDangerToast('Error, komentar tidak terkirim');
            }
        });
    });

    $('#balasan').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        //console.log("data", $(this).serialize());
        var id = $(this).find('input[name=id_comment]').val();

        $.ajax({
            url: base_url + "pengumuman/savebalasan",
            data: $(this).serialize(),
            method: 'POST',
            dataType: "JSON",
            success: function (response) {
                console.log("result", response);
                $('#balasanModal').modal('hide').data('bs.modal', null);
                $('#balasanModal').on('hidden', function () {
                    $(this).data('modal', null);
                });
                //window.location.href = base_url + 'pengumuman';
                addReplies(id, response, false)
            },
            error: function (xhr, status, error) {
                $('#balasanModal').modal('hide').data('bs.modal', null);
                $('#balasanModal').on('hidden', function () {
                    $(this).data('modal', null);
                });
                showDangerToast('Error, balasan tidak terkirim');
            }
        });
    });

}

function getPosts() {
    $(`#loading-post`).removeClass('d-none');
    $(`#loadmore-post`).addClass('d-none');

    setTimeout(function () {
        $.ajax({
            url: base_url + "pengumuman/getpost/" + halaman,
            type: "GET",
            success: function (response) {
                console.log("result", response);
                halaman += 1;

                if (response.length === 5) {
                    $(`#loadmore-post`).removeClass('d-none');
                }
                $(`#loading-post`).addClass('d-none');
                addPosts(response)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
            }
        });
    }, 500);
}

function formatTanggal(date) {
    var dateArray = date.split(' '),
        year = dateArray[0].split('-')[0],
        month = dateArray[0].split('-')[1],
        day = dateArray[0].split('-')[2],
        hour = dateArray[1].split(':')[0],
        minutes = dateArray[1].split(':')[1];

    var hari = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
    var bulan = ['Jan', 'Feb', 'Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];

    var d = new Date(month+"/"+day+"/"+year);
    var curr_day = d.getDay();
    var curr_date = d.getDate();

    var curr_month = d.getMonth();
    var curr_year = d.getFullYear();

    return  hari[curr_day] + ", " + curr_date + "  " + bulan[curr_month] + " " + curr_year + " " + hour + ":" + minutes;
}

function hapusPost(idPost) {
    swal.fire({
        title: "Hapus Pengumuman",
        text: "Pengumuman ini akan dihapus",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "HAPUS"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: base_url + "pengumuman/hapuspost/"+idPost,
                type: "GET",
                success: function (data) {
                    console.log("result", data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Pengumuman dihapus",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Pengumuman tidak dihapus",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Pengumuman tidak dihapus",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        }
    });
}

function hapusKomentar(idKomentar) {
    swal.fire({
        title: "Hapus Komentar",
        text: "Komentar ini akan dihapus",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "HAPUS"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: base_url + "pengumuman/hapuskomentar/"+idKomentar,
                type: "GET",
                success: function (data) {
                    console.log("result", data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Komentar dihapus",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                $(`#parent-reply${idKomentar}`).remove();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Komentar tidak dihapus",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Komentar tidak dihapus",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        }
    });
}

function hapusReply(idReply) {
    swal.fire({
        title: "Hapus Balasan",
        text: "Balasan ini akan dihapus",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "HAPUS"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: base_url + "pengumuman/hapusbalasan/"+idReply,
                type: "GET",
                success: function (data) {
                    console.log("result", data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Balasan dihapus",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                $(`.media${idReply}`).remove();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Balasan tidak dihapus",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Balasan tidak dihapus",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        }
    });
}

function hapusLogAktivitas() {
    swal.fire({
        title: "Hapus Log",
        text: "Semua log aktifitas akan dihapus",
        icon: "info",
        showCancelButton: true,
        confirmButtonText: "HAPUS"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: base_url + "dashboard/hapuslog/",
                type: "GET",
                success: function (data) {
                    console.log("result", data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Semua log dihapus",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.reload(true);
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Gagal menghapus log",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Gagal menghapus log",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        }
    });
}

/*
 * SEMUA
 * log_type:
 * 1 = login
 * 2 = logout
 * 3 = add
 * 4 = edit
 * 5 = hapus
 *
 * SISWA
 * 6  = membuka materi
 * 7  = menutup materi
 * 8  = mengerjakan tugas
 * 9  = mengirimkan tugas
 * 10 = mengerjakan ujian
 * 11 = menyelesaikan ujian
 * 12 = melihat nilai
 */

$(document).ready(function(){
	Pace.restart();
    ajaxcsrf();

    $("#tbl-penilaian").rowspanizer({
        columns: [0, 1, 2],
        vertical_align: "middle"
    });

    var colorBg = ['success', 'success', 'secondary', 'primary', 'warning', 'danger',
		'primary', "warning", "primary", "success", "primary", "success", "warning"
	];

	function load_log() {
		$.ajax({
			url: base_url + "dashboard/getlog/10",
			method:"GET",
			success:function(data) {
				//console.log(data);
				var ul = '<ul class="products-list product-list-in-card pl-2 pr-2">';
				$.each(data, function (key, value) {
					var nama = value.id_group === '1' ? value.first_name : value.first_name +' '+ value.last_name; //value.id_group === '1' ? value.name : (value.id_group === '2' ? value.nama_guru : value.nama);
					var clr = colorBg[value.log_type];
					var tgl = formatTanggal(value.log_time);//new Date('02/12/2018');
					ul += '  <li class="item">' +
						'    <div class="media" style="line-height: 1">' +
						'      <button class="btn btn-circle-sm btn-'+clr+' media-left">' +
						 nama.charAt(0).toUpperCase()+
						'      </button>' +
						'      <div class="media-body ml-2">' +
						'        <span class="float-right text-xs text-muted">'+tgl+'</span>' +
						'        <span>'+nama+'</span>' +
						'        <br />' +
						'        <span class="text-'+clr+' text-sm">'+value.log_desc+'</span class="product-description">' +
						'      </div>' +
						'    </div>' +
						'  </li>';

				});
				ul += '</ul>';
				$('#log-list').html(ul);
			}
		});
	}

	load_log();
	getPosts();
	/*
	$("select").closest("form").on("reset",function(ev){
		var targetJQForm = $(ev.target);
		setTimeout((function(){
			$(this).find("select").trigger("change");
		}).bind(targetJQForm),0);
	});

	$('form').on('reset', function(){
		var inputs = $('form select, form input, form textarea');
		$(this).find('.help-block').text('');
		inputs.closest('.form-group').removeClass('has-error has-success');
	});

	$('.select2').select2();

	/*
	setInterval(function() {
		var date = new Date();
		var h = date.getHours(), m = date.getMinutes(), s = date.getSeconds();
		h = ("0" + h).slice(-2);
		m = ("0" + m).slice(-2);
		s = ("0" + s).slice(-2);

		var time = h + ":" + m + ":" + s ;
		$('.live-clock').html(time);
	}, 1000);
	*/
});
