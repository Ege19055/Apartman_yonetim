<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Listesi</title>
    <link rel="stylesheet" href="../asset/css/admin/admin_a_sakin.css">
</head>
<body>
    <div class="container">
    <div class="div">
        <?php include '../include/admin_back_button.php'; ?>
        <h1>Kullanıcı Listesi</h1>
    </div>
        <table>
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Blok</th>
                    <th>Daire</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../include/database.php');
                $sorgu = $db->query("SELECT * FROM kullanicilar");
                $kullanicilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                foreach ($kullanicilar as $kullanici) {
                    echo "<tr>";
                    echo "<td>" . $kullanici['isim'] . "</td>";
                    echo "<td>" . $kullanici['blok'] . "</td>";
                    echo "<td>" . $kullanici['daire'] . "</td>";
                    echo "</tr>";
                }
               
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
