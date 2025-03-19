<?php
include '../include/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a_isim = $_POST['a_isim'];
    $a_fiyat = $_POST['a_fiyat'];

    $sorgu = $db->prepare("INSERT INTO aidatlar (a_isim, a_fiyat) VALUES (?, ?)");
    $eklemeDurumu = $sorgu->execute([$a_isim, $a_fiyat]);


    if ($eklemeDurumu) {
        header("Location: admin_aidat_ekle.php");
        exit;
    } else {
        $mesaj = "Aidat eklenirken bir hata oluştu.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Aidat Ekle</title>
<link rel="stylesheet" href="../asset/css/admin/aidat.css">
</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
   
    
    <?php if (isset($mesaj)) : ?>
        <p><?php echo $mesaj; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <div class="div">
    <?php include '../include/admin_back_button.php'; ?>
    <h2>Aidat Ekle</h2>    
</div>
    <label for="username">Aidat İsmi</label>
    <input type="text" name="a_isim">

<label for="password">Aidat Fiyatı</label>
<input type="text" name="a_fiyat">

<button type="submit">Gönder</button>

    </form>
</body>
</html>

