<?php

// App/Models/LinkMcViaDiscord.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkMcViaDiscord extends Model
{
    use HasFactory;

    protected $table = 'mc_link_discord';
    protected $primaryKey = 'id_discord';
    public $timestamps = false;

    protected $fillable = [
        'id_discord',
        'uuid_minecraft'
    ];
}

