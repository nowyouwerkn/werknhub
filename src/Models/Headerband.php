<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headerband extends Model
{
    use HasFactory;

    protected $table = 'wk_headerbands';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
