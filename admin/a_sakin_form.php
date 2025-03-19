<?php
include('../include/database.php');

$isim = $blok = $daire = '';
$isim_err = $blok_err = $daire_err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["isim"]))) {
        $isim_err = "İsim giriniz.";
    } else {
        $isim = trim($_POST["isim"]);
    }


    if (empty(trim($_POST["blok"]))) {
        $blok_err = "Blok seçiniz.";
    } else {
        $blok = trim($_POST["blok"]);
    }


    if (empty(trim($_POST["daire"]))) {
        $daire_err = "Daire giriniz.";
    } else {
        $daire = trim($_POST["daire"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
        if (empty($isim_err) && empty($blok_err) && empty($daire_err)) {
            $sql = "INSERT INTO kullanicilar (isim, blok, daire) VALUES (:isim, :blok, :daire)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':isim', $isim);
            $stmt->bindParam(':blok', $blok);
            $stmt->bindParam(':daire', $daire);
    
            if ($stmt->execute()) {
                $success_message = "Kullanıcı başarıyla eklendi.";
            } else {
                $error_message = "Kullanıcı eklenirken bir hata oluştu.";
            }
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Ekle</title>
  
    <link rel="stylesheet" href="../asset/css/admin/admin_a_sakin_form.css">
    
</head>
<body>
<div class="container">
    <div class="div "><?php include '../include/admin_back_button.php'; ?>
        <h1>Kullanıcı Ekle</h1>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($isim_err)) ? 'has-error' : ''; ?>">
            <label for="isim">İsim:</label>
            <input type="text" id="isim" name="isim" value="<?php echo $isim; ?>" required>
            <span class="error"><?php echo $isim_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($blok_err)) ? 'has-error' : ''; ?>">
            <label for="blok">Blok:</label>
            <select id="blok" name="blok" required>
                <option value="A">A Blok</option>
                <option value="B">B Blok</option>
                <option value="C">C Blok</option>
            </select>
            <span class="error"><?php echo $blok_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($daire_err)) ? 'has-error' : ''; ?>">
            <label for="daire">Daire:</label>
            <input type="number" id="daire" name="daire" value="<?php echo $daire; ?>" required>
            <span class="error"><?php echo $daire_err; ?></span>
        </div>
        <button type="submit">Kaydet</button>
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