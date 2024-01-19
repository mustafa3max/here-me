<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateLive extends Controller
{
    // public $base64 = $_POST["base64"];

    public function create() {
        // $file_name = "/" . time() . ".webm";
        // Storage::disk('videos')->put($file_name, $this->base64);
    }
}
