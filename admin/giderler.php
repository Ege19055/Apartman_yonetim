<?php
include '../include/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $g_isim = $_POST['g_isim'];
    $g_fiyat = $_POST['g_fiyat'];


    $sorgu = $db->prepare("INSERT INTO giderler (g_isim, g_fiyat) VALUES (?, ?)");
    $eklemeDurumu = $sorgu->execute([$g_isim, $g_fiyat]);


    if ($eklemeDurumu) {
        header("Location: giderler.php");
        exit;
    } else {
        $mesaj = "gider eklenirken bir hata oluştu.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin gider Ekle</title>
<link rel="stylesheet" href="../asset/css/admin/gider.css">
</head>
<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <?php if (isset($mesaj)) : ?>
        <p><?php echo $mesaj; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="div">
        <?php include '../include/admin_back_button.php'; ?>
        <h2>gider Ekle</h2>
    </div>
    <label for="username">gider İsmi</label>
    <input type="text" name="g_isim">

<label for="password">gider Fiyatı</label>
<input type="text" name="g_fiyat">

<button type="submit">Gönder</button>

    </form>
</body>
</html>

