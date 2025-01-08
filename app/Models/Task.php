<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = 'tasks'; // tidak diperlukan jika nama model sama dengan nama tabel
    // protected $fillable = []; // fillable digunakan untuk menentukan field mana saja yang boleh diisi
    protected $guarded = []; // guarded digunakan untuk menentukan field mana saja yang tidak boleh diisi
}