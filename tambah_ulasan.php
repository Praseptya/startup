<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ulasan</title>
    <link rel="stylesheet" href="css/tambahulasan_style.css">
</head>

<body>
    <header>
        <h1><i>IIFOOD PALOOZA</i></h1>
        <a href="detail_makanan.php?id=<?php echo $_GET['id']; ?>" class="back-button">Kembali</a>
    </header>
    <div class="search-bar"></div>

    <div class="review-form">
        <h3>Tambahkan Ulasan:</h3>
        <form action="submit_review.php" method="post">
            <label for="user">Nama:</label>
            <input type="text" id="user" name="user" required>

            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1⭐</option>
                <option value="2">2⭐</option>
                <option value="3">3⭐</option>
                <option value="4">4⭐</option>
                <option value="5">5⭐</option>
            </select>

            <label for="comment">Ulasan:</label>
            <textarea id="comment" name="comment" required></textarea>

            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input type="submit" value="Submit">
        </form>
    </div>

    <footer>
        <img src="logo.png" alt="logo">
    </footer>
</body>

</html>
