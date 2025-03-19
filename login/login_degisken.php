<?php 
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];

    $hata = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ?>
        <script>alert("Email formatı hatalı");</script>
        <?php
    } elseif (strlen($sifre) < 6 || strlen($sifre) > 18) {
        ?>
        <script>alert("Şifreniz 6 karakterden az 18 karakterden fazla olamaz");</script>
        <?php
    } else {
        $sorgu4 = $db->prepare("SELECT sifre FROM kullanici WHERE email = ?");
        $sorgu4->execute([$email]);
        $verisifre = $sorgu4->fetchColumn();

        if (!$verisifre || $verisifre != $sifre) {
            ?>
            <script>alert("Şifreler uyuşmuyor");</script>
            <?php
        } else {

            $sorgu = $db->prepare("SELECT * FROM kullanici WHERE email = ? AND sifre = ?");
            $sorgu->execute([$email, $sifre]);
            $a = $sorgu->fetch(PDO::FETCH_ASSOC);

            if ($a) {
                session_start();
                $_SESSION["email"] = $a["email"];
                $_SESSION["sifre"] = $a["sifre"];
                $isim = $a["isim"];

                $tabloAdi = ($a["rol"] == 'admin') ? 'admin' : 'uye';
                $yonlendirilecekSayfa = ($a["rol"] == 'admin') ? 'admin/admin.php' : 'uye/index.php';

                $giris = date('Y-m-d H:i:s');
                $sorgu3 = $db->prepare("INSERT INTO k_log (email, isim, giris) VALUES (?, ?, ?)");
                $sorgu3->execute([$email, $isim, $giris]);

                header("location: $yonlendirilecekSayfa");
                exit;
            } else {
                ?>
                <script>alert("Giriş bilgileri hatalı");</script>
                <?php
            }
        }
    }
?>
