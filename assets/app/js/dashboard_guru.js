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
