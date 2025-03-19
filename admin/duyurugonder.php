<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyuru Gönder</title>
 <link rel="stylesheet" href="../asset/css/admin/admin_duyuru.css">

</head>
<body>
    <div class="container">
        <div class="div">
            <?php include '../include/admin_back_button.php'; ?><h1>Duyuru Gönder</h1>
        </div>
        
        <form action="duyurugonder.php" method="post">
            <div class="form-group">
                <label for="duyuru_metni">Duyuru Metni:</label>
                <textarea id="duyuru_metni" name="duyuru" placeholder="Duyuru metnini buraya yazınız..." required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Duyuru Gönder</button>
            </div>
        </form>
        <?php
        include('../include/database.php');

        if(isset($_POST['duyuru'])) {
            $duyuru = $_POST['duyuru'];

            $sql = "INSERT INTO duyuru_tablosu (duyuru_metni) VALUES (:duyuru)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':duyuru', $duyuru);

            if ($stmt->execute()) {
                echo "<p class='success-message'>Duyuru başarıyla eklendi</p>";
            } else {
                echo "<p class='error-message'>Duyuru eklenirken bir hata oluştu</p>";
            }
        }
        
        ?>
    </div>
</body>
</html>

