<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteTheme extends Model
{
    use HasFactory;

    protected $table = 'wk_site_themes';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function get_name()
    {
        return $this->where('is_active', true)->value('name');
    }
}
