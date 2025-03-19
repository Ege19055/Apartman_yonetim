<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyuru Güncelle</title>

     <link rel="stylesheet" href="../../asset/css/admin/admin_duyuru_guncelle.css">
</head>
<body>
    <div class="container">
        <div class="div">
        <?php include '../../include/admin_back_button2.php'; ?>
         <h1>Duyuru Güncelle</h1>
        </div>
       
        <?php
        include('../../include/database.php');

        $duyuru_id = $_GET['id'];

        $sql = "SELECT * FROM duyuru_tablosu WHERE id = :duyuru_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':duyuru_id', $duyuru_id);
        $stmt->execute();
        $duyuru = $stmt->fetch(PDO::FETCH_ASSOC);

        $duyuru_metni = $duyuru['duyuru_metni'];

        if(isset($_POST['duyuru_metni'])) {
            $duyuru_metni = $_POST['duyuru_metni'];

            $sql = "UPDATE duyuru_tablosu SET duyuru_metni = :duyuru_metni WHERE id = :duyuru_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':duyuru_metni', $duyuru_metni);
            $stmt->bindParam(':duyuru_id', $duyuru_id);
            
            if ($stmt->execute()) {
                echo "Duyuru başarıyla güncellendi.";

                header('Location: ../duyurular.php');
                exit(); 
            } else {
                
                echo "Duyuru güncellenirken bir hata oluştu.";
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="duyuru_metni">Duyuru Metni:</label>
                <textarea id="duyuru_metni" name="duyuru_metni" placeholder="Duyuru metnini buraya yazınız..." required><?php echo htmlspecialchars($duyuru_metni); ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Duyuruyu Güncelle</button>
            
            </div>
        </form>
    </div>
</body>
</html>

