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

	var colorBg = ['', 'success', 'secondary', 'primary', 'warning', 'danger',
		'primary', "warning", "primary", "success", "primary", "success", "warning"
	];

	function load_log() {
		$.ajax({
			url: base_url + "dashboard/getlogsiswa/10",
			method:"GET",
			//data:{view:view},
			//dataType:"json",
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

	//setInterval(function(){
	//	load_log();
	//}, 10000);

});

function logout() {
	swal.fire({
		title: "Logout",
		text: "Anda yakin ingin logout?",
		icon: "question",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Logout!'
	}).then((result) => {
		if(result.value){
			location.href=base_url+"logout";
		}
	});
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
