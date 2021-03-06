Requirement:
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Penggunaan laravel:
1. install xampp
2. copy folder sistempakar ke folder http pada xampp
3. buka folder sistempakar  dengan menggunakan command cd pada cmd atau terminal
4. jalankan "composer install" pada cmd atau terminal
5. 
- buka file .env
- ubah nama database pada DB_DATABASE menjadi sistempakar
- DB_USERNAME dan DB_PASSWORD disesuaikan dengan configuration pada database
- pada xampp, secara default username = root dan password = ""
6. import database sistempakar.sql ke dalam database
7. jalankan "php artisan key:generate"
8. jalankan "php artisan serve"
9. buka browser
10. buka http://127.0.0.1:8000/login atau localhost:8000/login

Menggunakan Role Admin:
    1. Masukan email admin@gmail.com
    2. Masukan password lalayeye
    3. Manage Data penyakit
        a. Penyakit
        b. Gejala Penyakit
        c. Basis Pengetahuan
            - fungsi tambah data, memilih data penyakit dan gejala sesuai yang ada pada database.
            - fungsi edit data, hanya bisa memasukkan nilai certainty factor saja.
        d. Data Latih
            - setelah menambahkan data Penyakit atau Basis Pengetahuan, perlu menambahkan data latih penyakit
            - namun untuk saat ini belum tersedia fungsi CRUD nya, silahkan tambah pada database
    4. Manage Data Hama
        a. Hama
        b. Gejala Hama
        c. Basis Pengetahuan
            - fungsi tambah data, memilih data Hama dan gejala sesuai yang ada pada database.
            - fungsi edit data, hanya bisa memasukkan nilai certainty factor saja.
        d. Data Latih
            - setelah menambahkan data Hama atau Basis Pengetahuan, perlu menambahkan data latih hama
            - fungsi tambah data dapat menambah lebih dari 1 gejala.
    5. Info Penyakit
        - Admin dapat melihat hubungan antar penyakit dan gejala
    6. Info Hama
        - Admin dapat melihat hubungan antar hama dan gejala

Menggunakan Role Member:
untuk dapat menggunakan role member silahkan register terlebih dahulu pada http://127.0.0.1:8000/register
setelah registrasi berhasil, silahkan login pada http://127.0.0.1:8000/login
    1. Diagnosa
        - pilih gejala
        - klik tombol diagnosa dan tunggu proses
        - jika tidak ada gejala yang dipilih maka akan mengembalikan ke page diagnosa dan menampilkan error
        - jika terdapat id penyakit yang belum ada di data latih maka akan mengembalikan ke page diagnosa dan menampilkan error
        - jika berhasil di proses, akan menampilkan hasil diagnosa berupa gejala yang dipilih dan informasi terkait penyakit yang terdiagnosa serta nilai keyakinannya
        - hasil diagnosa akan disimpan di data latih dan data riwayat
   2. riwayat
        - menampilkan seluruh riwayat diagnosa yang terhubung oleh id user
   3. info penyakit dan hama
        - menampilkan informasi terkait hubungan antara penyakit dan gejala pada penyakit