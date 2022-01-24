<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'wk_countries';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function config()
    {
        return $this->belongsTo(SiteConfig::class);
    }
}
