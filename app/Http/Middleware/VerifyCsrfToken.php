<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        "/tasks", // menambahkan /tasks ke dalam array, agar tidak di verifikasi CSRF
        "/tasks/*" // menambahkan /tasks/* ke dalam array, agar tidak di verifikasi CSRF, * digunakan untuk wildcard, bisa digunakan untuk semua route yang memiliki /tasks/...
    ];
}
