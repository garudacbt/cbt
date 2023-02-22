<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item">
            <span class="nav-link text-dark"><b>TP: <?= isset($tp_active) ? $tp_active->tahun : "Belum di set" ?> Smt: <?= isset($smt_active) ? $smt_active->nama_smt : "Belum di set" ?></b></span>
        </li>

        <!--
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarTahun" data-toggle="dropdown">
				TP: <?= isset($tp_active) ? $tp_active->tahun : "Belum di set" ?>
			</a>

			<?= form_open('dashboard/gantiTahun', array('id' => 'updatetp')) ?>
			<div class="dropdown-list dropdown-menu shadow animated--grow-in" aria-labelledby="navbarTahun">
				<h6 class="dropdown-header">
					Tahun Pelajaran
				</h6>
				<?php
        $no = 1;
        foreach ($tp as $row) : ?>
					<div class="dropdown-divider"></div>
					<?= form_hidden('id_tp[' . $no . ']', $row->id_tp) ?>
					<input type="hidden" name="tahun[<?= $no; ?>]" value="<?= $row->tahun; ?>" class="form-control">
					<button id="tahun<?= $row->id_tp; ?>" value="<?= $row->id_tp; ?>" class="tahun-dropdown dropdown-item"
							type="submit">
						<?php
            echo $row->tahun;
            if ($row->active == 1) {
                echo '<i class="fas fa-check fa-sm fa-fw text-success ml-3"></i>';
            };
            ?>
					</button>
					<?php
            $no++;
        endforeach;
        ?>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item text-center text-black" href="#">
					<i class="fas fa-calendar-alt fa-fw mr-2 text-black"></i>
					Edit Tahun
				</a>
			</div>
			<?= form_close() ?>
		</div>

		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarSemester" role="button" data-toggle="dropdown">
				Smt: <?= isset($smt_active) ? $smt_active->smt : "Belum di set" ?>
			</a>
			<?= form_open('dashboard/gantiSemester', array('id' => 'updatesmt')) ?>
			<div class="dropdown-list dropdown-menu shadow animated--grow-in" aria-labelledby="navbarSemester">
				<h6 class="dropdown-header">
					Semester Aktif
				</h6>
				<?php
        $no = 1;
        foreach ($smt as $r) : ?>
					<div class="dropdown-divider"></div>
					<?= form_hidden('id_smt[' . $no . ']', $r->id_smt) ?>
					<input type="hidden" name="smt[<?= $no; ?>]" value="<?= $r->smt; ?>" class="form-control">
					<button id="smt<?= $r->id_smt; ?>" value="<?= $r->id_smt; ?>" class="dropdown-item" type="submit">
						<?php
            echo $r->smt;
            if ($r->active == 1) {
                echo '<i class="fas fa-check fa-sm fa-fw text-success ml-3"></i>';
            };
            ?>
					</button>
					<?php
            $no++;
        endforeach;
        ?>
			</div>
			<?= form_close() ?>
		</div>

		<!--
	<li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Home</a>
	</li>
	<li class="nav-item d-none d-sm-inline-block">
		<a href="#" class="nav-link">Contact</a>
	</li>
	-->
    </ul>

    <!-- SEARCH FORM -->
    <!--
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <!--
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        -->
        <!-- Notifications Dropdown Menu -->
        <!--
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        -->
        <!--
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
			   aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-desktop fa-fw mr-2 text-gray-600"></i>
				<span class="text-gray-600">SERVER</span>
			</a>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
				<a class="dropdown-item" href="#">SERVER</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">LOKAL</a>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
				<i class="fas fa-th-large"></i>
			</a>
		</li>
		-->
        <li class="nav-item">
            <div id="live-clock" class="text-right"></div>
        </li>
    </ul>

</nav>