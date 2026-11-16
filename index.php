<?php
// Variabel awal
$angka1 = "";
$angka2 = "";
$operasi = "+";
$hasil = "";

// Proses perhitungan
if (isset($_POST['hitung'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operasi = $_POST['operasi'];

    switch ($operasi) {
        case "+":
            $hasil = $angka1 + $angka2;
            break;

        case "-":
            $hasil = $angka1 - $angka2;
            break;

        case "*":
            $hasil = $angka1 * $angka2;
            break;

        case "/":
            if ($angka2 == 0) {
                $hasil = "Tidak bisa dibagi 0";
            } else {
                $hasil = $angka1 / $angka2;
            }
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>

    <!-- Menghubungkan CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<div class="container">

    <h1>Kalkulator</h1>
    <p class="subtitle">Hitung dengan mudah</p>

    <form method="POST">

        <input
            type="number"
            step="any"
            name="angka1"
            placeholder="Angka pertama"
            value="<?= htmlspecialchars($angka1) ?>"
            required
        >

        <select name="operasi">
            <option value="+" <?= $operasi == "+" ? "selected" : "" ?>>+</option>
            <option value="-" <?= $operasi == "-" ? "selected" : "" ?>>-</option>
            <option value="*" <?= $operasi == "*" ? "selected" : "" ?>>×</option>
            <option value="/" <?= $operasi == "/" ? "selected" : "" ?>>÷</option>
        </select>

        <input
            type="number"
            step="any"
            name="angka2"
            placeholder="Angka kedua"
            value="<?= htmlspecialchars($angka2) ?>"
            required
        >

        <button type="submit" name="hitung">Hitung</button>

    </form>

    <?php if ($hasil !== ""): ?>
        <div class="hasil">
            Hasil:
            <strong><?= htmlspecialchars((string)$hasil) ?></strong>
        </div>
    <?php endif; ?>

</div>

</body>
</html>