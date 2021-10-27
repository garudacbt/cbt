<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                <div>
                    <h1>Garuda</h1>
                    <h2>Gabungan Aplikasi Rapor, Ujian, dan Pembelajaran</h2>
                    <?php if ($res != '1') :?>
                    <p>Belum lengkap: <?=$msg?></p>
                    <?php endif; ?>
                    <a href="<?= base_url('install/steps/'.$res) ?>" class="download-btn"><i class="fa fa-download"></i> Install Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="fade-up">
                <img src="<?=base_url()?>/assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>
