<?php
 include('../include/database.php');

if(isset($_GET['gider_id'])) {
    $gider_id = $_GET['gider_id'];

    $silme_sorgusu = "DELETE FROM giderler WHERE gider_id = ?";
    $silme_statement = $db->prepare($silme_sorgusu);
    $silme_statement->execute([$gider_id]);


    header("Location: aidatlarim.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giderlerim</title>
    <link rel="stylesheet" href="../asset/css/uye/aidatlarim.css">
</head>
<body>

<h2>Giderlerim</h2>

    <ul>
    <?php include '../include/uye_back_button.php'; ?>  
        <?php 
        $sorgu = $db->query("SELECT * FROM giderler");
        $giderler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
        foreach ($giderler as $gider) {
            echo "<li>Gider Adı: " . $gider['g_isim'] . " - Fiyat: " . $gider['g_fiyat'] . " TL ";
            echo "<a href='../admin/odenen_giderler.php?gider_id=" . $gider['gider_id'] . "'>Öde</a>";
            echo "</li>";
                 
        }
        
        ?>
    </ul>
</body>
</html>

