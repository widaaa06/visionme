<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard VisionMe</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f7fb;
        }

        .sidebar{
            position:fixed;
            width:250px;
            height:100vh;
            background:#4facfe;
            padding:20px;
            color:white;
        }

        .sidebar h2{
            margin-bottom:40px;
            text-align:center;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar ul li{
            margin:20px 0;
        }

        .sidebar ul li a{
            text-decoration:none;
            color:white;
            font-size:16px;
            transition:0.3s;
        }

        .sidebar ul li a:hover{
            padding-left:10px;
        }

        .main-content{
            margin-left:250px;
            padding:30px;
        }

        .header{
            background:white;
            padding:20px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            margin-bottom:25px;
        }

        .header h1{
            color:#333;
        }

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card h3{
            margin-bottom:10px;
            color:#444;
        }

        .card p{
            color:#777;
            font-size:14px;
        }

        .logout-btn{
            margin-top:40px;
        }

        .logout-btn button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#ff4d4d;
            color:white;
            cursor:pointer;
            font-size:15px;
        }

        .logout-btn button:hover{
            background:#e60000;
        }

    </style>
</head>
<body>

    <div class="sidebar">

        <h2>VisionMe</h2>

        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Tes Mata</a></li>
            <li><a href="#">Artikel</a></li>
            <li><a href="#">Riwayat</a></li>
            <li><a href="#">Profil</a></li>
        </ul>

        <div class="logout-btn">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>

    </div>

    <div class="main-content">

        <div class="header">
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            <p>Dashboard Pemeriksaan Mata VisionMe</p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Tes Buta Warna</h3>
                <p>Lakukan pemeriksaan buta warna secara mandiri.</p>
            </div>

            <div class="card">
                <h3>Tes Ketajaman</h3>
                <p>Cek kemampuan penglihatan mata Anda.</p>
            </div>

            <div class="card">
                <h3>Artikel Kesehatan</h3>
                <p>Baca informasi kesehatan mata terbaru.</p>
            </div>

            <div class="card">
                <h3>Riwayat Pemeriksaan</h3>
                <p>Lihat hasil pemeriksaan sebelumnya.</p>
            </div>

        </div>

    </div>

</body>
</html>