<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 21/10/2020
 * Time: 17:56
 */
?>

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
			<div class="card my-shadow">
				<div class="card-header">
					<div class="card-title">
						<h6><?= $subjudul ?></h6>
					</div>
				</div>
				<div class="card-body">
                    <?php
                    //echo '<pre>';
                    //var_dump($tables);
                    //echo '</pre>';
                    ?>
					<table id="database" class="table table-striped table-bordered table-hover table-sm">
						<thead>
						<tr>
							<th width="50" height="50" class="text-center p-0 align-middle">No.</th>
							<th class="text-center p-0 align-middle">Tabel</th>
                            <th class="text-center p-0 align-middle">Keterangan</th>
							<th class="text-center p-0 align-middle">Total Data</th>
							<th class="text-center p-0 align-middle">Aksi</th>
						</tr>
						</thead>
						<tbody>
                        <?php
                        $no = 1;
                        foreach ($tables as $table=>$info) :?>
                        <tr>
                            <td class="text-center align-middle"><?=$no?></td>
                            <td class="align-middle"><?=$table?></td>
                            <td class="align-middle"><?=$info['ket']?></td>
                            <td class="align-middle text-center"><?=$info['size']?></td>
                            <td class="text-center p-0 align-middle">Aksi</td>
                        </tr>
                        <?php $no++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function backupData() {
		$.ajax({
			type: "GET",
			url: base_url+'dbmanager/backupdata',
			success: function (response) {
				console.log(response);
				updateProgress(100, response.message);

				swal.fire({
					title: "Berhasil",
					text: "Semua file data berhasil dibackup",
					icon: "success"
				}).then(result => {
					if(result.value){
						window.location.href = base_url+'dbmanager';
					}
				})
			}
		});
	}

	function hapus(src) {
		swal.fire({
			title: "Anda yakin?",
			html: "File <b>" + src + "</b> akan dihapus!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus!"
		}).then(result => {
			if (result.value) {
			$.ajax({
				url: base_url + 'dbmanager/hapusbackup/'+ src,
				type: "GET",
				success: function (respon) {
					console.log(respon);
					if (respon.status) {
						swal.fire({
							title: "Berhasil",
							text: respon.message,
							icon: "success"
						}).then(result => {
							if(result.value){
							window.location.href = base_url + 'dbmanager';
						}
					})
					} else {
						swal.fire({
							title: "Gagal",
							text: respon.message,
							icon: "error"
						});
					}
				},
				error: function (xhr) {
					console.log(xhr.responseText);
					swal.fire({
						title: "Gagal",
						text: "Ada data yang sedang digunakan",
						icon: "error"
					});
				}
			});
		}
	})
	}

    $(document).ready(function(){
    });

</script>
