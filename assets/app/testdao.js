$(document).ready(function () {
	lists();
	$('#listTable').dataTable({
		"bPaginate": true,
		"bInfo": true,
		"bFilter": true,
		"bLengthChange": true,
		"pageLength": 10
	});
	// list all user in datatable
	function lists() {
		$.ajax({
			type: 'ajax',
			url: 'jurusan/tampilkanData',
			async: false,
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr id="' + data[i].id_jurusan + '">' +
						'<td>' + no++ + '</td>' +
						'<td>' + data[i].nama_jurusan + '</td>' +
						'<td>' + data[i].kode_jurusan + '</td>' +
						'<td style="text-align:right;">' +
						'<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord" data-id="' + data[i].id_jurusan + '" data-username="' + data[i].nama_jurusan + '"data-email="' + data[i].kode_jurusan + '">Edit</a>' + ' ' +
						'<a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord" data-id="' + data[i].id_jurusan + '">Delete</a>' +
						'</td>' +
						'</tr>';
				}
				$('#list').html(html);
			}

		});
	}
	// save new user record
	$('#saveForm').submit('click', function () {
		var name = $('#username').val();
		var Email = $('#email').val();
		var Password = $('#password').val();
		$.ajax({
			type: "POST",
			url: "user/simpanData",
			dataType: "JSON",
			data: { username: name, email: Email, password: Password },
			success: function (data) {
				$('#username').val("");
				$('#email').val("");
				$('#password').val("");
				$('#addModal').modal('hide');
				lists();
			}
		});
		return false;
	});
	// show edit modal form with user data
	$('#list').on('click', '.editRecord', function () {
		$('#editModal').modal('show');
		$("#userId").val($(this).data('id'));
		$("#usernameEdit").val($(this).data('username'));
		$("#emailEdit").val($(this).data('email'));
	});
	// save edit record
	$('#editForm').on('submit', function () {
		var id = $('#userId').val();
		var username = $('#usernameEdit').val();
		var email = $('#emailEdit').val();
		$.ajax({
			type: "POST",
			url: "user/update",
			dataType: "JSON",
			data: { id: id, username: username, email: email },
			success: function (data) {
				$("#userId").val("");
				$("#usernameEdit").val("");
				$('#emailEdit').val("");
				$('#editModal').modal('hide');
				lists();
			}
		});
		return false;
	});
	// show delete modal
	$('#list').on('click', '.deleteRecord', function () {
		var Id = $(this).data('id');
		$('#deleteModal').modal('show');
		$('#deleteId').val(Id);
	});
	// delete user record
	$('#deleteForm').on('submit', function () {
		var Id = $('#deleteId').val();
		$.ajax({
			type: "POST",
			url: "user/hapus",
			dataType: "JSON",
			data: { id: Id },
			success: function (data) {
				$("#" + Id).remove();
				$('#deleteId').val("");
				$('#deleteModal').modal('hide');
				lists();
			}
		});
		return false;
	});
});
