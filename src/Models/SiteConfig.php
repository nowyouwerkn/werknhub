<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $table = 'wk_site_configs';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function has_pixel()
    {
        return $this->where('facebook_pixel', '!=' ,NULL)->value('facebook_pixel');
    }
}
