<?php
session_start();

$historyData = isset($_SESSION['history']) ? $_SESSION['history'] : [];
$historyData = array_reverse($historyData);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Latihan - PokéCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" style="max-width: 700px;"> 
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Poké_Ball_icon.svg" class="pokeball-bg" alt="Pokeball">

    <h1>Riwayat Latihan</h1>
    <h2>Log Aktivitas Kadabra</h2>

    <div class="table-container">
        <table class="history-table">
            <thead>
                <tr>
                    <th>Waktu Latihan</th>
                    <th>Jenis Latihan</th>
                    <th style="text-align:center;"></th>
                    <th>Level (Awal &rarr; Akhir)</th>
                    <th>HP (Awal &rarr; Akhir)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($historyData)): ?>
                    <tr>
                        <td colspan="5" align="center" class="empty-state">
                            Belum ada sesi latihan yang dicatat.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($historyData as $log): ?>
                    <tr>
                        <td><?= date('d/m H:i', strtotime($log['waktu'])); ?></td>
                        <td style="font-weight:bold; color:#4a4a4a;"><?= htmlspecialchars($log['jenis']); ?></td>
                        <td style="text-align:center;">
                            <span style="background:#eee; padding:2px 8px; border-radius:10px; font-size:12px;">
                                <?= $log['intensitas']; ?>
                            </span>
                        </td>
                        <td>
                            <?= $log['level_before']; ?> 
                            <span class="arrow">&rarr;</span> 
                            <strong><?= $log['level_after']; ?></strong>
                        </td>
                        <td>
                            <?= $log['hp_before']; ?> 
                            <span class="arrow">&rarr;</span> 
                            <strong><?= $log['hp_after']; ?></strong>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <br>
    
    <div class="btn-group">
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
        <a href="train.php" class="btn btn-primary">Latihan Lagi</a>
    </div>

</div>

</body>
</html>