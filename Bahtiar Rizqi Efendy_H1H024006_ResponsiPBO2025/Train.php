<?php
require_once 'classes.php';
session_start();
$kadabra = $_SESSION['pokemon'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis = $_POST['jenis_latihan'];
    $intensitas = $_POST['intensitas'];
    $result = $kadabra->train($jenis, $intensitas);
    
    $_SESSION['history'][] = [
        'jenis' => $jenis, 'intensitas' => $intensitas,
        'level_before' => $result['old_level'], 'level_after' => $result['new_level'],
        'hp_before' => $result['old_hp'], 'hp_after' => $result['new_hp'],
        'waktu' => date('Y-m-d H:i:s')
    ];

    $message = "
    <div style='background:#d4edda; color:#155724; padding:15px; border-radius:5px; margin-bottom:15px; text-align:left;'>
        <strong>Latihan Selesai!</strong><br>
        Level naik: {$result['old_level']} &rarr; <b>{$result['new_level']}</b><br>
        HP bertambah: {$result['old_hp']} &rarr; <b>{$result['new_hp']}</b><br>
        <i>{$result['desc']}</i>
    </div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Latihan - PokéCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Poké_Ball_icon.svg" class="pokeball-bg" alt="Pokeball">
    
    <h1>Sesi Latihan</h1>
    <h2>Tingkatkan kemampuan <?= $kadabra->getName(); ?></h2>

    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/64.png" alt="Kadabra Icon" style="width:80px;">

    <?= $message; ?>

    <form method="POST" style="text-align: left; margin-top: 20px;">
        <label><strong>Pilih Program Latihan:</strong></label>
        <select name="jenis_latihan">
            <option value="Meditation">MEDITASI(untuk melatih Psikis)</option>
            <option value="Spoon Bending">SPOON BENDING(untuk melatih Attack)</option>
            <option value="Teleport">TELEPORT (untuk melatih Speed)</option>
        </select>

        <label><strong>Intensitas (1-10):</strong></label>
        <input type="number" name="intensitas" min="1" max="10" value="5" required>

        <button type="submit" class="btn btn-primary" style="width:100%; margin-top:10px;">Latih Sekarang!</button>
    </form>

    <div class="btn-group">
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
        <a href="history.php" class="btn btn-secondary" style="background:#ddd;">Riwayat</a>
    </div>
</div>

</body>
</html>