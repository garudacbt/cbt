<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow">
                <div class="card-header with-border">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button type="button" data-toggle="modal" data-target="#createAdminModal"
                                class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus"></i><span
                                    class="d-none d-sm-inline-block ml-1">Tambah Admin</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2 mb-3">
                    </div>
                </div>
                <div class="table-responsive px-4 pb-3" style="border: 0">
                    <table id="users" class="w-100 table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Created On</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo '<div class="form-group row">';
                echo form_label('First name:', 'first_name', array('class' => 'col-md-4 col-form-label'));
                echo form_error('first_name');
                echo form_input(array('name' => 'first_name', 'class' => 'col-md-7 form-control'),
                    set_value('first_name'), 'required');
                echo '</div>';
                echo '<div class="form-group row">';
                echo form_label('Last name:', 'last_name', array('class' => 'col-md-4 col-form-label'));
                echo form_error('last_name');
                echo form_input(array('name' => 'last_name', 'class' => 'col-md-7 form-control'),
                    set_value('last_name'), 'required');
                echo '</div>';
                echo '<div class="form-group row">';
                echo form_label('Email:', 'email', array('class' => 'col-md-4 col-form-label'));
                echo form_error('email');
                echo form_input(array('name' => 'email', 'class' => 'col-md-7 form-control'),
                    set_value('email'), 'required');
                echo '</div>';
                echo '<div class="form-group row">';
                echo form_label('Username:', 'username', array('class' => 'col-md-4 col-form-label'));
                echo form_error('username');
                echo form_input(array('name' => 'username', 'class' => 'col-md-7 form-control'),
                    set_value('username'), 'required');
                echo '</div>';
                echo '<div class="form-group row">';
                echo form_label('Password:', 'password', array('class' => 'col-md-4 col-form-label'));
                echo form_error('password');
                echo form_password(array('name' => 'password', 'class' => 'col-md-7 form-control'), '', 'required');
                echo '</div>';
                echo '<div class="form-group row">';
                echo form_label('Confirm password:', 'confirm_password', array('class' => 'col-md-4 col-form-label'));
                echo form_error('confirm_password');
                echo form_password(array('name' => 'confirm_password', 'class' => 'col-md-7 form-control'), '', 'required');
                echo '</div>';
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript">
    var user_id = '<?=$user->id?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/users/admin/data.js"></script>
