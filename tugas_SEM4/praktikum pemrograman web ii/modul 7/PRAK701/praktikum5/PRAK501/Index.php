<!DOCTYPE html>
<head>
    <title>Selamat Datang di Website Ini!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        body {
            background-image: url('background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
        }

        h1 {
            padding: 10px 20px;
            color:rgb(100, 27, 40);
            margin: 6px;
        }

        .container {
            width: 400px;
            padding: 30px;
            background-color: #F3B7C5;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .btn {
            background-color: rgb(100, 27, 40);
            color: #F3B7C5;
            border: none;
            padding: 10px 20px;
            margin: 8px 0;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.4s ease-in-out, transform 0.2s ease-in-out, border-color 0.2s ease-in-out;
            width: 100%;
        }

        .btn:hover {
            background-color: #F3B7C5;
            color: rgb(100, 27, 40);
            border: 3px solid rgb(100, 27, 40);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bonjour</h1>
        <a href="Member.php"><button class="btn">Member</button></a>
        <br>
        <a href="Buku.php"><button class="btn">Buku</button></a>
        <br>
        <a href="Peminjaman.php"><button class="btn">Peminjaman</button></a>
    </div>
</body>
</html>