<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'wk_states';
    protected $primaryKey = 'id';

    protected $guarded = [];
    
    use HasFactory;
}
