<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyuru Sil</title>

    <link rel="stylesheet" href="../../asset/css/admin/admin_duyuru_sil.css">

</head>
<body>
    <div class="container">
    <div class="div">
        <?php include '../../include/admin_back_button2.php'; ?>
         <h1>Duyuru Sil</h1>
        </div>
        <?php
        include('../../include/database.php');

        $duyuru_id = $_GET['id'];

        if(isset($_POST['confirm_delete'])) {
            $sql = "DELETE FROM duyuru_tablosu WHERE id = :duyuru_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':duyuru_id', $duyuru_id);

            if ($stmt->execute()) {
                echo "Duyuru başarıyla silindi.";

                header('Location: ../duyurular.php');
                exit();
            } else {
                echo "Duyuru silinirken bir hata oluştu.";
            }
        } else {
            echo '<p>Emin misiniz? Bu işlem geri alınamaz.</p>';
            echo '<form action="" method="post">';
            echo '<div class="form-group">';
            echo '<button type="submit" name="confirm_delete">Duyuruyu Sil</button>';
            echo '</div>';
            echo '</form>';
            
        }
        ?>
    </div>
</body>
</html>
