<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyuruları Görüntüle ve Yönet</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/css/uye/uye_duyuru.css">

</head>
<body>
    <div class="container"><div class="div"><?php include '../include/admin_back_button.php'; ?>
      <h1>Duyurular</h1>
</div>
  
        <div class="duyurular">
            <?php
           
            include('../include/database.php');

            $sql = "SELECT * FROM duyuru_tablosu";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $duyurular = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            foreach ($duyurular as $duyuru) {
                echo '<div class="duyuru">';
                echo "<h2>" . htmlspecialchars($duyuru['duyuru_metni']) . "</h2>";
                echo '<div class="actions">';
                echo '<a href="duyuru/duyuru_sil.php?id=' . $duyuru['id'] . '">Sil</a>';
                echo '<a href="duyuru/duyuru_guncelle.php?id=' . $duyuru['id'] . '">  Güncelle</a>';
                echo '</div>';
                echo '</div>';
            }
            
     ?>       
            
            
         
        </div>
    </div>
</body>
</html>
