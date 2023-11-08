<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Selamat Datang di Katalog Produk</h2>
        <br>
        <div class="row">
            <?php
            $host = "localhost";
            $dbuser = "postgres";
            $dbpass = "postgres";
            $port = "5432";
            $dbname = "postgres";
            $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

            $query = "SELECT * FROM product";
            $result = $pdo->query($query);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='col-md-3 mb-3'>";
                echo "<div class='card'>";
                echo '<img src="' . $row['image'] . '" alt="Gambar Barang" class="card-img-top">';
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['name_product'] . "</h5>";
                echo "<p class='card-text'>Price: Rp " . $row['price'] . "</p>";
                echo "<a href='detail_produk.php?id=" . $row['id'] . "' class='btn btn-primary btn-block'>Lihat Detail</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
