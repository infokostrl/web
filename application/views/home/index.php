<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <h1>Welcome User</h1>
    <ul>
        <?php foreach ($infokost as $kost) : ?>
            <li>Nama : <?= $kost['name']; ?></li>
            <li>Deskripsi : <?= $kost['description']; ?></li>
            <li>Kontak : <?= $kost['contact']; ?></li>
            <li>Link : <a href="<?= $kost['link']; ?>" target="blank">Link</a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>