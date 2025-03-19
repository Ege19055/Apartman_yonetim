<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödenen giderler</title>
    <link rel="stylesheet" href="../asset/css/admin/odenen_giderler.css">

</head>
<body>
<div class="container">
<div class="div"><?php include '../include/admin_back_button.php'; ?><h2>Ödenen Giderler</h2></div>
        <ul>
            <?php 
            include('../include/database.php');
            $sorgu = $db->query("SELECT * FROM odenen_giderler");
            $odenen_giderler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            foreach ($odenen_giderler as $odenen_gider) {
                echo "<li>gider Adı: " . $odenen_gider['g_isim'] . " - Fiyat: " . $odenen_gider['g_fiyat'] . " TL</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
include('../include/database.php');

if(isset($_GET['gider_id'])) {
    $gider_id = $_GET['gider_id'];

    $kontrol_sorgusu = "SELECT COUNT(*) FROM odenen_giderler WHERE gider_id = ?";
    $kontrol_statement = $db->prepare($kontrol_sorgusu);
    $kontrol_statement->execute([$gider_id]);
    $odenen_sayisi = $kontrol_statement->fetchColumn();


    if ($odenen_sayisi > 0) {
        echo "Bu gider zaten ödenmiş.";
        exit();
    }


    $ekleme_sorgusu = "INSERT INTO odenen_giderler (gider_id, g_isim, g_fiyat) SELECT gider_id, g_isim, g_fiyat FROM giderler WHERE gider_id = ?";
    $ekleme_statement = $db->prepare($ekleme_sorgusu);
    $ekleme_statement->execute([$gider_id]);


    $silme_sorgusu = "DELETE FROM giderler WHERE gider_id = ?";
    $silme_statement = $db->prepare($silme_sorgusu);
    $silme_statement->execute([$gider_id]);

    
    header("Location: ../uye/giderler.php");
    exit();
}

$db = null;
?>


