<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf',[DownloadPdfController::class, 'download'])->name('rps.pdf.download');