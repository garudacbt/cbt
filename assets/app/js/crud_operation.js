$(document).ready(function () {
    listUsers();
    $('#listUserTable').dataTable({
        "bPaginate": true,
        "bInfo": true,
        "bFilter": true,
        "bLengthChange": true,
        "pageLength": 10
    });
    // list all user in datatable
    function listUsers() {
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
                $('#listUser').html(html);
            }

        });
    }
    // save new user record
    $('#saveUserForm').submit('click', function () {
        var Username = $('#username').val();
        var UserEmail = $('#email').val();
        var UserPassword = $('#password').val();
        $.ajax({
            type: "POST",
            url: "user/simpanData",
            dataType: "JSON",
            data: { username: Username, email: UserEmail, password: UserPassword },
            success: function (data) {
                $('#username').val("");
                $('#email').val("");
                $('#password').val("");
                $('#addUserModal').modal('hide');
                listUsers();
            }
        });
        return false;
    });
    // show edit modal form with user data
    $('#listUser').on('click', '.editRecord', function () {
        $('#editUserModal').modal('show');
        $("#userId").val($(this).data('id'));
        $("#usernameEdit").val($(this).data('username'));
        $("#emailEdit").val($(this).data('email'));
    });
    // save edit record
    $('#editUserForm').on('submit', function () {
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
                $('#editUserModal').modal('hide');
                listUsers();
            }
        });
        return false;
    });
    // show delete modal
    $('#listUser').on('click', '.deleteRecord', function () {
        var UserId = $(this).data('id');
        $('#deleteUserModal').modal('show');
        $('#deleteUserId').val(UserId);
    });
    // delete user record
    $('#deleteUserForm').on('submit', function () {
        var UserId = $('#deleteUserId').val();
        $.ajax({
            type: "POST",
            url: "user/hapus",
            dataType: "JSON",
            data: { id: UserId },
            success: function (data) {
                $("#" + UserId).remove();
                $('#deleteUserId').val("");
                $('#deleteUserModal').modal('hide');
                listUsers();
            }
        });
        return false;
    });
});