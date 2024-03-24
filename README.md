# Sertifikasi Komptensi

### Instalasi

1. Pastikan Anda telah menginstal [Composer](https://getcomposer.org/) dan [Node.js](https://nodejs.org/).
2. Clone repositori ini ke komputer lokal Anda dengan menjalankan perintah berikut di terminal:

    ```bash
    git clone https://github.com/ElvinKukuhN/Serkom.git
    ```

3. Buka terminal dan arahkan ke direktori proyek:

    ```bash
    cd serkom
    ```

4. Jalankan perintah berikut untuk menginstal dependensi PHP:

    ```bash
    composer install
    ```

5. Salin file `.env.example` menjadi `.env`. Anda dapat melakukannya dengan mengetikkan perintah:

    ```bash
    cp .env.example .env
    ```

    Kemudian, buka file `.env` dan atur pengaturan database sesuai kebutuhan Anda.

6. Generate kunci aplikasi dengan menjalankan perintah berikut:

    ```bash
    php artisan key:generate
    ```

7. Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

    ```bash
    php artisan migrate
    ```

8. Terakhir, jalankan perintah berikut untuk menginstal dependensi JavaScript dan mengkompilasi aset:

    ```bash
    npm install && npm run dev
    ```

### Menjalankan Server Pengembangan

Anda dapat menjalankan server pengembangan dengan perintah:

```bash
php artisan serve
```
