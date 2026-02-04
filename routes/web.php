<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function(){
    return "Chào mừng đến với Laravel";
});
Route::get('/about', function(){
    return "Họ và tên: Phạm Đình Luân - Lớp: D18CNPM4 - MSSV: 23810310282";
});
Route::get('/contact', function(){
    return View('contact');
});
Route::get('/tong/{a}/{b}', function ($a, $b) {
    $tong = $a + $b;
    return "Tổng của $a và $b là: $tong";
});
Route::get('/sinh-vien/{name}/{age?}', function ($name, $age = 20) {
    return "Sinh viên: $name - Tuổi: $age";
});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Chào mừng Admin";
    });

    Route::get('/users', function () {
        return "Danh sách người dùng";
    });
});
Route::get('/check-date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "Ngày bạn nhập: $day/$month/$year";
})->where([
    'day'   => '(0?[1-9]|[12][0-9]|3[01])', // Số từ 1-31
    'month' => '(0?[1-9]|1[0-2])',          // Số từ 1-12
    'year'  => '[0-9]{4}'                   // Phải là 4 chữ số
]);