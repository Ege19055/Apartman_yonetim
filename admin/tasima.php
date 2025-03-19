<?php
include('../include/database.php');
$sorgu_kullanicilar = $db->query("SELECT * FROM kullanicilar");
$kullanicilar = $sorgu_kullanicilar->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include('../include/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['kullanici'], $_POST['blok'], $_POST['yeni_daire'])) {
        $kullanici_id = $_POST['kullanici'];
        $blok = $_POST['blok'];
        $yeni_daire = $_POST['yeni_daire'];

        $stmt_kullanici = $db->prepare("SELECT isim FROM kullanicilar WHERE id = ?");
        $stmt_kullanici->execute([$kullanici_id]);
        $kullanici = $stmt_kullanici->fetch(PDO::FETCH_ASSOC);

        if ($kullanici) {
            $isim = $kullanici['isim'];

            $stmt_tasinan = $db->prepare("INSERT INTO tasinan_kullanicilar (isim, kullanici_id, blok, yeni_daire) VALUES (?, ?, ?, ?)");
            $stmt_tasinan->execute([$isim, $kullanici_id, $blok, $yeni_daire]);

            $stmt_sil = $db->prepare("DELETE FROM kullanicilar WHERE id = ?");
            $stmt_sil->execute([$kullanici_id]);

            $success_message = "Kullanıcı başarıyla taşındı ve kaldırıldı";
        } else {
            $error_message = "Kullanıcı taşınırken bir hata oluştu.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Taşı</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/css/admin/admin_a_tasima.css">

</head>
<body>
    <div class="container">
    <div class="div">
        <?php include '../include/admin_back_button.php'; ?>
        <h1>Kullanıcı Taşı</h1>
    </div>
        <form action="tasima.php" method="post">
            <div class="form-group">
                <label for="kullanici">Kullanıcı Seç:</label>
                <select id="kullanici" name="kullanici" required>
                    <option value="">Seçiniz</option>
                    <?php foreach ($kullanicilar as $kullanici): ?>
                        <option value="<?php echo $kullanici['id']; ?>"><?php echo $kullanici['isim']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="blok">Yeni Blok:</label>
                <select id="blok" name="blok" required>
                    <option value="A">A Blok</option>
                    <option value="B">B Blok</option>
                    <option value="C">C Blok</option>
                </select>
            </div>
            <div class="form-group">
                <label for="yeni_daire">Yeni Daire:</label>
                <input type="number" id="yeni_daire" name="yeni_daire" required>
            </div>
            <button type="submit">Taşı</button>
        </form>
        
        <?php if(isset($success_message)): ?>
            <div class="success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if(isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>

</body>
</html>