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
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('struktur') }}">Struktur Organisasi</a></li>
            <li><a href="{{ route('layanan') }}">Layanan Umum</a></li>
            <li><a href="{{ route('visimisi') }}">Visi Misi dan Tujuan</a></li>
            <li><a href="{{ route('login') }}">login</a></li>
        </ul>
    </nav>

      <section id="layanan">
        <h2>Layanan Umum</h2>
            <p>Rumah Sakit Hewan Pendidikan Universitas Airlangga melakukan layanan-layanan, baik atas kehendak klien atau rujukan dokter hewan praktisi sebagai berikut:</p>
        <h3>Poliklinik</h3>
            <p>Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap. 
                Poliklinik melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, serta pelayanan kesehatan lainnya seperti permintaan surat keterangan sehat. 
                Tindakan observasi dan diagnosis, juga bisa diteguhkan dengan berbagai macam pemeriksaan yang bisa kami lakukan, misalnya pemeriksaan sitologi, dermatologi, hematologi, atau pemeriksaan radiologi, ultrasonografi, bahkan pemeriksaan elektrokardiografi. 
                Bilamana diperlukan pemeriksaan-pemeriksaan lain yang diperlukan seperti pemeriksaan kultur bakteri, atau pemeriksaan jaringan/histopatologi, dan lain-lain kami bekerja sama dengan Fakultas Kedokteran Hewan Universitas Airlangga untuk membantu melakukan pemeriksaan-pemeriksaan tersebut. 
                Selain itu kami mempunyai rapid test untuk pemeriksaan cepat, untuk meneguhkan diagnosa penyakit-penyakit berbahaya pada kucing seperti panleukopenia, calicivirus, rhinotracheitis, FIP, dan pada anjing seperti parvovirus, canine distemper.
            </p>
            <p>Layanan kesehatan hewan di poliklinik yang kami lakukan antara lain:</p>
            <ul>
                <li>Rawat jalan</li>
                <li>Vaksinasi</li>
                <li>Akupuntur</li>
                <li>Kemoterapi</li>
                <li>Fisioterapi</li>
                <li>Mandi terapi</li>
            </ul>
        <h3>Rawat Inap</h3>
            <p>Rawat inap dilakukan pada pasien-pasien yang berat atau parah dan membutuhkan perawatan intensif. 
                Pasien akan diobservasi dan mendapat perawatan intensif dibawah pengawasan dokter dan paramedis yang handal. 
                Sebelum rawat inap, klien wajib mengisi inform konsen yang artinya klien telah diberi penjelasan yang detail tentang kondisi penyakit pasien dan menyetujui rencana terapi yang akan dijalankan sepengetahuan klien.
                Klien juga diberitahu biaya yang dibebankan untuk semua layanan. RSHP menerima pembayaran tunai maupun kartu debit bank.
            </p>
        <h3>Bedah</h3>
            <ul>
                <li>Tindakan Bedah Minor</li>
                    <ul>
                        <li>Jahit Luka</li>
                        <li>Kastrasi</li>
                        <li>Othematoma</li>
                        <li>Scaling - root planning</li> 
                        <li>Ekstraksi gigi</li>  
                    </ul>
                <li>Tindakan Bedah Mayor</li>
                    <ul>
                        <li>Gastrotomi; Entrotomi; Enterektomi; Salivary mucocele</li>
                        <li>Ovariohisterektomi; Sectio caesar; Piometra</li>
                        <li>Sistotomi; Urethrostomi</li>
                        <li>Fraktur tulang</li>
                        <li>Hernia diafragmatika</li>
                    </ul>
            </ul>
        <h3>Pemeriksaan</h3>
            <ul>
                <li>Pemeriksaan Sitologi</li>
                <li>Pemeriksaan Dermatologi</li>
                <li>Pemeriksaan Hermatologi</li>
                <li>Pemeriksaan Radiografi</li>
                <li>Pemeriksaan Ultrasonografi</li>
            </ul>
            <p>Selain layanan medis, Rumah Sakit Hewan Pendidikan Universitas Airlangga juga melayani grooming pada hewan kesayangan.</p>
        
    </section>

        <footer>
        <p>Untuk informasi lebih lanjut, kunjungi website kami di <a href="https://www.unair.ac.id">www.unair.ac.id</a> </p>
        <p>Alamat: Jl. Airlangga No. 4-6, Surabaya, Jawa Timur, Indonesia </p>
        <p>Telepon: (031) 555-1234 </p>
        <p style="text-align: center;"></style>&copy; 2025 Rumah Sakit Hewan Pendidikan Universitas Airlangga </p>
    </footer>
</body>
</html>