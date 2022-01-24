<?php

namespace Nowyouwerkn\WerknHub\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTheme extends Model
{
    use HasFactory;

    protected $table = 'wk_mail_themes';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
