if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['faq'] = {
    title: 'FAQ',
    desc: 'Pertanyaan yang sering diajukan tentang GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-question-circle"></i> Pertanyaan yang Sering Diajukan</h2>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Umum</h3>
        <details>
            <summary><strong>Bagaimana cara mereset password admin?</strong></summary>
            <p>Login ke phpMyAdmin, buka tabel users, cari user admin, dan ganti password dengan hash baru atau hubungi developer.</p>
        </details>
        <details>
            <summary><strong>Apakah GarudaCBT gratis?</strong></summary>
            <p>Ya, GarudaCBT adalah open source dan dapat digunakan secara gratis untuk keperluan pendidikan.</p>
        </details>

        <h3>CBT</h3>
        <details>
            <summary><strong>Siswa tidak dapat login ke ujian, apa yang harus dilakukan?</strong></summary>
            <p>Pastikan token benar, waktu ujian masih berlangsung, dan koneksi internet stabil. Cek juga status akun siswa apakah aktif.</p>
        </details>
        <details>
            <summary><strong>Bagaimana cara memperpanjang waktu ujian?</strong></summary>
            <p>Buka menu Monitoring, pilih siswa yang ingin diperpanjang waktunya, dan klik tombol Perpanjang Waktu.</p>
        </details>

        <h3>E-Learning</h3>
        <details>
            <summary><strong>Materi tidak muncul di siswa, kenapa?</strong></summary>
            <p>Pastikan materi ditugaskan ke kelas yang benar dan status materi aktif. Cek juga tahun ajaran dan semester yang aktif.</p>
        </details>

        <h3>Rapor</h3>
        <details>
            <summary><strong>Nilai tidak muncul di rapor, apa yang salah?</strong></summary>
            <p>Pastikan nilai pengetahuan dan keterampilan sudah diinput, KKM sudah diatur, dan setting rapor sudah dikonfigurasi dengan benar.</p>
        </details>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Jika pertanyaan Anda tidak terjawab di sini, hubungi support melalui email atau forum komunitas.</div>
        </div>
    </div>`
};
