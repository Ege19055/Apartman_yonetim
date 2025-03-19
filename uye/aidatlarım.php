<?php
 include('../include/database.php');

if(isset($_GET['aidat_id'])) {
    $aidat_id = $_GET['aidat_id'];

    $silme_sorgusu = "DELETE FROM aidatlar WHERE aidat_id = ?";
    $silme_statement = $db->prepare($silme_sorgusu);
    $silme_statement->execute([$aidat_id]);


    header("Location: aidatlarim.php");
    exit();
}
     
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aidatlarım</title>
    <link rel="stylesheet" href="../asset/css/uye/aidatlarim.css">
</head>
<body>
    <h2>Aidatlarım</h2>
  <div class="div">
  <?php  include '../include/uye_back_button.php';      ?>
  <ul>
        <?php 
        $sorgu = $db->query("SELECT * FROM aidatlar");
        $aidatlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
        foreach ($aidatlar as $aidat) {
            echo "<li>Aidat Adı: " . $aidat['a_isim'] . " - Fiyat: " . $aidat['a_fiyat'] . " TL ";
            echo "<a href='../admin/odenen_aidatlar.php?aidat_id=" . $aidat['aidat_id'] . "'>Öde</a>";
            echo "</li>";
             
        
            
        }
  
        ?>
     
    </ul>
  </div>
</body>
</html>

