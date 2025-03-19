<!DOCTYPE html>
<html lang="en">
<head> <?phpinclude '../include/uye_back_button.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyuruları Görüntüle</title>
   <link rel="stylesheet" href="../asset/css/uye/uye_duyuru.css">
</head>
<body>
    <div class="container">
        <?php include '../include/uye_back_button.php'; ?>
        <h1>Duyurular</h1>
        <?php
  
        include('../include/database.php');
        $sql = "SELECT * FROM duyuru_tablosu";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $duyurular = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($duyurular) {
            foreach ($duyurular as $duyuru) {
                echo '<div class="duyuru">';
                echo "<strong>Duyuru: </strong>" . htmlspecialchars($duyuru['duyuru_metni']) . "<br>";
                echo "<small><em>Tarih: </em>" . $duyuru['tarih'] . "</small>";
                echo '</div>';
            }
        } else {
            echo "<p>Herhangi bir duyuru bulunamadı.</p>";
        }

        ?>
    </div>
</body>
</html>
