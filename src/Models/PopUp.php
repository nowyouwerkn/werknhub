<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopUp extends Model
{
    use HasFactory;

    protected $table = 'wk_popups';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
