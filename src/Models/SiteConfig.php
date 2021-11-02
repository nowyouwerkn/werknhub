<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function get_country()
    {
        return $this->where('id', '=', 1)->value('country_id');
    }

    public function get_country_name()
    {
        return $this->hasOne(Country::class, 'id', 'country_id')->value('name');
    }

    public function currency()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id')->first();
    }

    public function has_pixel()
    {
        return $this->where('facebook_pixel', '!=' ,NULL)->value('facebook_pixel');
    }
}
