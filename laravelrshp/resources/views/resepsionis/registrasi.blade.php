<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Resepsionis</title>
    <style>
/* ===== Basic Layout ===== */
body {
    font-family: 'Poppins', Arial, sans-serif;
    margin: 0;
    background-color: #f4f5fb;
}

/* ===== Navbar ===== */
nav {
    background: linear-gradient(90deg, #4f52d6, #6b6ee2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 25px;
    color: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

nav .logo {
    font-size: 20px;
    font-weight: 600;
}

.nav-links {
    list-style: none;
    display: flex;
    align-items: center;
    margin: 0;
    padding: 0;
}

.nav-links li {
    position: relative;
}

.nav-links a,
.nav-links button {
    color: #fff;
    text-decoration: none;
    padding: 10px 16px;
    display: inline-block;
    transition: 0.3s;
    font-weight: 500;
    background: none;
    border: none;
    cursor: pointer;
}

.nav-links a:hover,
.nav-links button:hover {
    background: rgba(255,255,255,0.15);
    border-radius: 6px;
}

/* ===== Dropdown ===== */
.dropdown:hover .dropdown-menu {
    display: block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 42px;
    left: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    min-width: 220px;
    z-index: 10;
}

.dropdown-menu li {
    list-style: none;
}

.dropdown-menu a {
    color: #333;
    padding: 10px 15px;
    display: block;
    transition: background 0.25s ease;
    border-radius: 5px;
}

.dropdown-menu a:hover {
    background: #5559d2;
    color: white;
}

/* ===== Content ===== */
.content {
    text-align: center;
    margin-top: 60px;
}

.content h2 {
    color: #222;
    margin-bottom: 10px;
}

.content p {
    color: #666;
    font-size: 16px;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    nav {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        flex-direction: column;
        width: 100%;
    }

    .dropdown-menu {
        position: static;
        box-shadow: none;
        background: transparent;
    }

    .dropdown-menu a {
        color: white;
        background: none;
    }

    .dropdown-menu a:hover {
        background: rgba(255,255,255,0.15);
    }
}

    </style>
</head>
<body>
    <nav>
        <div class="logo">🐾 RS Hewan</div>

        <ul class="nav-links">
            <li class="dropdown">
                <a href="#">Registrasi ▾</a>
                <ul class="dropdown-menu">
                    <li><a href="../registrasi/registrasi.php">Registrasi Umum</a></li>
                    <li><a href="registrasi_pemilik.php">Registrasi Pemilik</a></li>
                    <li><a href="registrasi_pet.php">Registrasi Pet</a></li>
                </ul>
            </li>

            <li><a href="../resepsionis/temu_dokter.php">Temu Dokter</a></li>
            <li><a href="/rshpoop/login/logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Selamat Datang di Data Master</h2>
        <p>Pilih menu di atas untuk melanjutkan.</p>
    </div>
</body>
</html>