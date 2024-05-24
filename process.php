<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $pangkat = $_POST['pangkat'];
    $nrp = $_POST['nrp'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $lari = $_POST['lari'];
    $pull_up = $_POST['pull_up'];
    $sit_up = $_POST['sit_up'];
    $push_up = $_POST['push_up'];
    $shuttle_run = $_POST['shuttle_run'];

    $kategori = 0;
    if ($usia >= 19 && $usia <= 25) {
        $kategori = 1;
    } elseif ($usia >= 26 && $usia <= 30) {
        $kategori = 2;
    } elseif ($usia >= 31 && $usia <= 35) {
        $kategori = 3;
    } elseif ($usia >= 36 && $usia <= 40) {
        $kategori = 4;
    } elseif ($usia >= 41 && $usia <= 43) {
        $kategori = 5;
    } elseif ($usia >= 44 && $usia <= 46) {
        $kategori = 6;
    } elseif ($usia >= 47 && $usia <= 49) {
        $kategori = 7;
    }

    $standar = [
        "pria" => [
            1 => ["lari" => 2766, "pull_up" => 10, "sit_up" => 33, "push_up" => 35, "shuttle_run" => 19.8],
            2 => ["lari" => 2671, "pull_up" => 9, "sit_up" => 32, "push_up" => 34, "shuttle_run" => 20.3],
            3 => ["lari" => 2576, "pull_up" => 8, "sit_up" => 30, "push_up" => 32, "shuttle_run" => 20.8],
            4 => ["lari" => 2481, "pull_up" => 7, "sit_up" => 29, "push_up" => 31, "shuttle_run" => 21.3],
            5 => ["lari" => 2386, "pull_up" => 6, "sit_up" => 27, "push_up" => 29, "shuttle_run" => 21.8],
            6 => ["lari" => 2291, "pull_up" => 5, "sit_up" => 25, "push_up" => 28, "shuttle_run" => 22.3],
            7 => ["lari" => 2196, "pull_up" => 4, "sit_up" => 24, "push_up" => 26, "shuttle_run" => 22.8],
        ],
        "wanita" => [
            1 => ["lari" => 2201, "pull_up" => 39, "sit_up" => 34, "push_up" => 20, "shuttle_run" => 21.1],
            2 => ["lari" => 2146, "pull_up" => 36, "sit_up" => 33, "push_up" => 19, "shuttle_run" => 21.6],
            3 => ["lari" => 2088, "pull_up" => 34, "sit_up" => 31, "push_up" => 18, "shuttle_run" => 22.1],
            4 => ["lari" => 2019, "pull_up" => 32, "sit_up" => 30, "push_up" => 16, "shuttle_run" => 22.6],
            5 => ["lari" => 1953, "pull_up" => 31, "sit_up" => 27, "push_up" => 15, "shuttle_run" => 23.1],
            6 => ["lari" => 1888, "pull_up" => 28, "sit_up" => 26, "push_up" => 14, "shuttle_run" => 23.6],
            7 => ["lari" => 1832, "pull_up" => 26, "sit_up" => 24, "push_up" => 13, "shuttle_run" => 24.1],
        ],
    ];

    $hasil = [];
    $hasil["lari"] = ($lari >= $standar[$jenis_kelamin][$kategori]["lari"]) ? "MEMENUHI" : "TIDAK MEMENUHI";
    $hasil["pull_up"] = ($pull_up >= $standar[$jenis_kelamin][$kategori]["pull_up"]) ? "MEMENUHI" : "TIDAK MEMENUHI";
    $hasil["sit_up"] = ($sit_up >= $standar[$jenis_kelamin][$kategori]["sit_up"]) ? "MEMENUHI" : "TIDAK MEMENUHI";
    $hasil["push_up"] = ($push_up >= $standar[$jenis_kelamin][$kategori]["push_up"]) ? "MEMENUHI" : "TIDAK MEMENUHI";
    $hasil["shuttle_run"] = ($shuttle_run <= $standar[$jenis_kelamin][$kategori]["shuttle_run"]) ? "MEMENUHI" : "TIDAK MEMENUHI";

    $hasil_akhir = (in_array("TIDAK MEMENUHI", $hasil)) ? "TIDAK WE/LWE" : "BISA WE/LWE";

    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Hasil Tes</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }";
    echo "h1, h2 { color: #333; }";
    echo "table { width: 100%; margin-top: 20px; border-collapse: collapse; background: #fff; border-radius: 5px; overflow: hidden; }";
    echo "table, th, td { border: 1px solid #ddd; }";
    echo "th, td { padding: 10px; text-align: left; }";
    echo "th { background: #f8f8f8; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Hasil Tes</h1>";
    echo "<table>";
    echo "<tr><th>Nama</th><td>$nama</td></tr>";
    echo "<tr><th>Pangkat</th><td>$pangkat</td></tr>";
    echo "<tr><th>NRP</th><td>$nrp</td></tr>";
    echo "<tr><th>Item Tes</th><th>Hasil</th></tr>";
    echo "<tr><td>Lari 12 menit</td><td>{$hasil['lari']}</td></tr>";
    echo "<tr><td>Pull Up</td><td>{$hasil['pull_up']}</td></tr>";
    echo "<tr><td>Sit Up</td><td>{$hasil['sit_up']}</td></tr>";
    echo "<tr><td>Push Up</td><td>{$hasil['push_up']}</td></tr>";
    echo "<tr><td>Shuttle Run</td><td>{$hasil['shuttle_run']}</td></tr>";
    echo "</table>";
    echo "<h2>Hasil Akhir: $hasil_akhir</h2>";
    echo "</body>";
    echo "</html>";
}
?>
