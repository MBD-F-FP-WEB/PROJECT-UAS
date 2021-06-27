# Final Project MBD-F 2021

## Anggota

1. Mohammad Faderik I H (05111940000023)
2. Allam Taju Syarof (05111940000053)
3. M maroqi Abdul Jalil (051119400000143)

## HOW TO

1. git clone
2. composer install
3. npm install
4. npm run dev
5. open pgAdmin
    - create db dengan nama northwind
    - udah
6. cp .env.example .env (.env.example sudah update pgsql)
7. php artisan key:generate
8. php artisan migrate

## TODO
1. Sequence: each table
2. function: date diubah ke tanggal sekarang misal kosong
3. function: required date diubah ke tanggal sekarang misal kurang dari order date
4. procedure: INSERT order
5. procedure: INSERT order_details
6. mentrigger (function: menghitung total price) bila ada order masuk