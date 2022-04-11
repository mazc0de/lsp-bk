<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'status'
    ];

    public static $rules = [
        'judul'     => 'required',
        'isi'    => 'required',
        'status'    => 'required',
    ];
}
