<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadPdfController extends Controller
{
    public function download(Rps $record)
    {
        dd($record);
    }
}
