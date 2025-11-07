<!DOCTYPE html>
<html>
    <title>RSHP UNAIR</title>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    nav {
        background-color: #5559d2;
        color: white;
        padding: 5px ;
    }
    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: right;
    }
    nav ul li {
        margin: 0 15px;
        color: black;
    }
    nav ul li a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
    nav ul li a:hover {
        color: #393837;
        border-bottom: 2px solid #141001;
    }
    header {
        text-align: center;
        color: #f4f4f4;
        background-color: #5559d2;
        padding: 5px 0;
    }
    section {
        padding: 20px;
        margin: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px;
    }
    table p {
        text-align: justify;
        color: #555;
    }
    section h2 {
        color: #434345;
        text-align: center;
    }  
    h3 {
        color: #515154;
        text-align: left;
    } 
    footer {
        background-color: #5559d2;
        text-align: center;
        padding: 10px 0;
        position: relative;
        bottom: 0;
        width: 100%;
        color: #1c1b1b;
    }
    footer p {
        margin: 0;
        padding: 0;
        text-align: center;
    }
</style>

<body>
    <header>
        <h1>Rumah Sakit Hewan Pendidikan Universitas Airlangga</h1>
    </header>
    <nav>
        <ul>
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('struktur')); ?>">Struktur Organisasi</a></li>
            <li><a href="<?php echo e(route('layanan')); ?>">Layanan Umum</a></li>
            <li><a href="<?php echo e(route('visimisi')); ?>">Visi Misi dan Tujuan</a></li>
            <li><a href="<?php echo e(route('login')); ?>">login</a></li>
        </ul>
    </nav>

        <section id="visimisi">
        <h2>Visi Misi dan Tujuan</h2>
        <p><strong>Visi:</strong> Menjadi rumah sakit hewan pendidikan terkemuka yang memberikan pelayanan kesehatan hewan berkualitas tinggi.</p>
        <p><strong>Misi:</strong></p>
        <ul>
            <li>Menyediakan layanan kesehatan hewan yang profesional dan terpercaya.</li>
            <li>Mengembangkan ilmu pengetahuan dan teknologi di bidang kedokteran hewan.</li>
            <li>Meningkatkan kesadaran masyarakat tentang pentingnya kesehatan hewan.</li>
        </ul>
        <p><strong>Tujuan:</strong></p>
        <ul>
            <li>Meningkatkan kualitas pelayanan kesehatan hewan.</li>
            <li>Memberikan edukasi kepada masyarakat tentang perawatan hewan.</li>
            <li>Mendukung penelitian dan pengembangan di bidang kedokteran hewan.</li>
        </ul>
        </section>

            <footer>
        <p>Untuk informasi lebih lanjut, kunjungi website kami di <a href="https://www.unair.ac.id">www.unair.ac.id</a> </p>
        <p>Alamat: Jl. Airlangga No. 4-6, Surabaya, Jawa Timur, Indonesia </p>
        <p>Telepon: (031) 555-1234 </p>
        <p style="text-align: center;"></style>&copy; 2025 Rumah Sakit Hewan Pendidikan Universitas Airlangga </p>
    </footer>
</body>
</html>

<?php /**PATH C:\Users\meilanie\Documents\Semester 3\Framework\framework prak\laravel\laravelrshp\resources\views/visimisi.blade.php ENDPATH**/ ?>