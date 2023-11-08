<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>

    <!-- Tambahkan link stylesheet Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];
        } else {
            header("Location: error.php");
            exit;
        }

        $host = "localhost";
        $dbuser = "postgres";
        $dbpass = "postgres";
        $port = "5432";
        $dbname = "postgres";
        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);

        $query = "SELECT * FROM product WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<h2 class='mb-4 text-center'>" . $row['name_product'] . "</h2>";
            echo '<img src="' . $row['image'] . '" alt="Gambar Barang" class="rounded mx-auto d-block mb-4" width="200" height="200">';
            echo "<p class='mb-4 text-center'>Price: Rp" . $row['price'] . "</p>";
            echo "<p class='mb-4'>Description: " . $row['description'] . "</p>";
        }
        ?>
    </div>

    <div class="container mt-5">
        <?php
        $query = "SELECT * FROM review WHERE product_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        echo "<h3 class='mb-4'>Ulasan Pembeli:</h3>";
        while ($review = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<p class='card-text'>" . $review['review'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Tambahkan skrip JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
