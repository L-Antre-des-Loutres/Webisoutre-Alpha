<?php

// app/Models/GenshinId.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;

    protected $tableBadges = 'badges';
    protected $fillable =
    [
        'id', 'user_id', 'badge_detail_id', 'created_at', 'updated_at'
    ];

    public static function getUserBadges($userId){
        return self::select(
            'badges.id',
            'badges.user_id',
            'badges.badge_detail_id',
            'badges.created_at',
            'badges.updated_at'
        )
        ->get();
    }
}
