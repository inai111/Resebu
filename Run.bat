@echo off
cd /
cd xampp
start xampp-control.exe
cd /
cd Users/%username%/Desktop/projek/resebu
rem start visual
rem start xampp
cd resebu
start chrome http://127.0.0.1:8000/
php artisan serve
