<?php

namespace Nowyouwerkn\WerknHub\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'wk_banners';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
