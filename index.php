<?php
require_once 'classes.php';
session_start();

if (!isset($_SESSION['pokemon'])) {
    $_SESSION['pokemon'] = new Kadabra();
    $_SESSION['history'] = [];
}
$kadabra = $_SESSION['pokemon'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRTC - PokéCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Poké_Ball_icon.svg" class="pokeball-bg" alt="Pokeball">

    <h1>PokéCare Center</h1>
    <h2>Research & Training Unit</h2>

    <div class="pokemon-card">
        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/64.png" alt="Kadabra" class="pokemon-img">
        
        <h3 style="margin: 10px 0; font-size: 22px;"><?= $kadabra->getName(); ?></h3>
        <span class="type-badge"><?= $kadabra->getType(); ?></span>

        <div class="stats-grid">
            <div class="stat-item">
                <strong>Level</strong>
                <div class="stat-value"><?= $kadabra->getLevel(); ?></div>
            </div>
            <div class="stat-item">
                <strong>HP (Health)</strong>
                <div class="stat-value"><?= $kadabra->getHp(); ?></div>
            </div>
            <div class="stat-item" style="grid-column: span 2;">
                <strong>Jurus Spesial</strong>
                <div class="stat-value"><?= $kadabra->specialMove(); ?></div>
            </div>
        </div>
    </div>

    <div class="btn-group">
        <a href="train.php" class="btn btn-primary">Mulai Latihan</a>
        <a href="history.php" class="btn btn-secondary">Riwayat</a>
    </div>
</div>

</body>
</html>