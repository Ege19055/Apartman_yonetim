<?php
include('../include/database.php');
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taşınan Kullanıcılar</title>
    <link rel="stylesheet" href="../asset/css/admin/admin_a_sakin.css">
</head>
<body>
    <div class="container">
    <div class="div">
        <?php include '../include/admin_back_button.php'; ?>
        <h1>Taşınan Kullanıcılar</h1>
    </div>        <table>
            <thead>
                <tr>
                   <th>İsim</th>
                    <th>Blok</th>
                  
                    <th>Yeni Daire</th>
              
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sorgu = $db->query("SELECT * FROM tasinan_kullanicilar");
                $tasinan_kullanicilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                foreach ($tasinan_kullanicilar as $tasinan_kullanici) {
                    echo "<tr>";
                    echo "<td>" . $tasinan_kullanici['isim'] . "</td>";
                    echo "<td>" . $tasinan_kullanici['blok'] . "</td>";
                   
                    echo "<td>" . $tasinan_kullanici['yeni_daire'] . "</td>";
                   
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>