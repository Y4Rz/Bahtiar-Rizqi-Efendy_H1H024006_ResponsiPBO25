# Bahtiar-Rizqi-Efendy_H1H024006_ResponsiPBO25
# NAMA : Bahtiar Rizqi Efendy
# NIM : H1H024006
# shift awal : A
# shift akhir : D

# Pokemon Training WEB  
Ini adalah simulasi web sederhana berbasis PHP untuk melatih pokeom kadabra. untuk simulasi ini Trainer dapat melakukan training stat seperti: meditasi, menyerang, dan teleportasi. setelah trainer melatih pokemon data pelatihan disimpan di riwayat perubahan.

---

## PENJELASAN
Aplikasi ini memungkinkan pengguna untuk:

- Melihat detail Pokémon (gambar, tipe, dan stat dasar)
- Melakukan training untuk meningkatkan stat Pokémon
- Menyimpan semua perubahan stat ke dalam *history*
- Melihat riwayat yang tersimpan dalam bentuk tabel interaktif

Struktur utama aplikasi:
- `index.php` — Menampilkan kartu Pokémon (nama, gambar, stat), Tombol Mulai Latihan!, Tombol Lihat Riwaya. 
- `Train.php` — Mengolah logika training: Menambah stat Pokémon lalu Mengirim hasil latihan ke history.
- `classes.php` — class Pokemon & manajemen history  
- `history.php` — menampilkan riwayat perubahan stat  
- `style.css` — gaya tampilan aplikasi  

---

## Cara Menjalankan Aplikasi
untuk simulasi awal saya menggunakan laragon sebagai Localhost
### Menggunakan LARAGON (Localhost)
1. Buka Laragon
2. Kilk Start all 
3. klik kanan pada laragon pilih www/folder yang menyimpan kode responsi/klik folder tersebut hingga akhirnya berpindah ke laman web
