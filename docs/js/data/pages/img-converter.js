if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['img-converter'] = {
    title: 'Image Converter',
    desc: 'Mengkonversi format gambar untuk keperluan aplikasi.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-images"></i> Image Converter</h2>
        <p>Image Converter menyediakan fitur untuk mengkonversi format gambar yang digunakan dalam aplikasi GarudaCBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Menggunakan Image Converter</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Database > Image Converter</code></li>
            <li>Pilih gambar yang akan dikonversi</li>
            <li>Pilih format output:
                <ul style="margin-top:8px">
                    <li><strong>JPG</strong> — format kompresi standar</li>
                    <li><strong>PNG</strong> — format dengan transparansi</li>
                    <li><strong>WebP</strong> — format modern dengan ukuran kecil</li>
                </ul>
            </li>
            <li>Atur kualitas gambar (jika diperlukan)</li>
            <li>Klik <code class="inline">Konversi</code></li>
            <li>Download hasil konversi</li>
        </ol>

        <h3>Kegunaan Image Converter</h3>
        <ul>
            <li>Mengoptimalkan ukuran gambar untuk upload</li>
            <li>Mengubah format gambar untuk kompatibilitas</li>
            <li>Mengompres gambar untuk penghematan storage</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Gunakan format WebP untuk ukuran file yang lebih kecil dengan kualitas yang tetap baik.</div>
        </div>
    </div>`
};
