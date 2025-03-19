<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödenen Aidatlar</title>
    <link rel="stylesheet" href="../asset/css/admin/odenen_aidatlar.css">

</head>
<body>
<div class="container">
        <div class="div"><?php   include '../include/admin_back_button.php'; ?>
        <h2>Ödenen Aidatlar</h2>


        </div>
        
        <ul>
            <?php 
            include('../include/database.php');
            $sorgu = $db->query("SELECT * FROM odenen_aidatlar");
            $odenen_aidatlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            foreach ($odenen_aidatlar as $odenen_aidat) {
                echo "<li>Aidat Adı: " . $odenen_aidat['a_isim'] . " - Fiyat: " . $odenen_aidat['a_fiyat'] . " TL</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
include('../include/database.php');

if(isset($_GET['aidat_id'])) {
    $aidat_id = $_GET['aidat_id'];

    $kontrol_sorgusu = "SELECT COUNT(*) FROM odenen_aidatlar WHERE aidat_id = ?";
    $kontrol_statement = $db->prepare($kontrol_sorgusu);
    $kontrol_statement->execute([$aidat_id]);
    $odenen_sayisi = $kontrol_statement->fetchColumn();


    if ($odenen_sayisi > 0) {
        echo "Bu aidat zaten ödenmiş.";
        exit();
    }


    $ekleme_sorgusu = "INSERT INTO odenen_aidatlar (aidat_id, a_isim, a_fiyat) SELECT aidat_id, a_isim, a_fiyat FROM aidatlar WHERE aidat_id = ?";
    $ekleme_statement = $db->prepare($ekleme_sorgusu);
    $ekleme_statement->execute([$aidat_id]);


    $silme_sorgusu = "DELETE FROM aidatlar WHERE aidat_id = ?";
    $silme_statement = $db->prepare($silme_sorgusu);
    $silme_statement->execute([$aidat_id]);

    
    header("Location: ../uye/aidatlarım.php");
    exit();
}

$db = null;
?>


