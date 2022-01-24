<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalText extends Model
{
    use HasFactory;

    protected $table = 'wk_legal_texts';
    protected $primaryKey = 'id';
}
