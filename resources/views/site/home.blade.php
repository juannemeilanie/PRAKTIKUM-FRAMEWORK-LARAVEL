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
            <li><a href="{{ route('site.home') }}">Home</a></li>
            <li><a href="{{ route('site.struktur') }}">Struktur Organisasi</a></li>
            <li><a href="{{ route('site.layanan') }}">Layanan Umum</a></li>
            <li><a href="{{ route('site.visimisi') }}">Visi Misi dan Tujuan</a></li>
            <li><a href="{{ route('login') }}">login</a></li>
        </ul>
    </nav>

    <section id="home">
        <p style="text-align: center; color: #555;">
            <h2>Selamat Datang di Rumah Sakit Hewan Pendidikan Universitas Airlangga</h2>

        <table border="0" cellspacing="0" width="100%">
            <tr style="text-align: justify" >
                <td width="50%" style="padding: 20px;">
                    <p>Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu meningkatkan kualitas pelayanan, 
                        maka dari itu Rumah Sakit Hewan Pendidikan Universitas Airlangga mempunyai fitur pendaftaran online yang mempermudah untuk mendaftarkan hewan kesayangan anda
                    </p>
                </td>
                <td width="50%">
                    <img src="https://unair.ac.id/wp-content/uploads/2018/04/DSC_7114-min-scaled.jpg" width="450" height="300" style="border-radius: 10px;">
                </td>
            </tr>   
        </table>

        <h2>Jadwal Layanan</h2>
        <table border="1" cellspacing="0" width="100%">
            <tr style="background-color: rgb(0, 64, 255);">
                <th style="border: 1px solid #ccc; padding:5px; text-align: center;">Hari</th>
                <th style="border: 1px solid #ccc; padding:5px; text-align: center;">Jam Operasional</th>
            </tr>
            <tr style ="text-align: center;">
                <td style="border: 1px solid #ccc; padding:5px; ">Senin - Jumat</td>
                <td style="border: 1px solid #ccc; padding:5px; ">08:00 - 16:00</td>
            </tr>
            <tr style="text-align: center;">
                <td style="border: 1px solid #ccc; padding:5px; ">Sabtu</td>
                <td style="border: 1px solid #ccc; padding:5px;">08:00 - 12:00</td>  
            </tr>
        </table>
    </section>

    <footer>
        <p>Untuk informasi lebih lanjut, kunjungi website kami di <a href="https://www.unair.ac.id">www.unair.ac.id</a> </p>
        <p>Alamat: Jl. Airlangga No. 4-6, Surabaya, Jawa Timur, Indonesia </p>
        <p>Telepon: (031) 555-1234 </p>
        <p style="text-align: center;"></style>&copy; 2025 Rumah Sakit Hewan Pendidikan Universitas Airlangga </p>
    </footer>
</body>