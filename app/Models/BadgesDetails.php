<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgesDetails extends Model
{
    use HasFactory;

    protected $table = 'badge_details';

    protected $fillable = [
        'id_badge',
        'title',
        'description',
        'condition',
        'image_link'
    ];

    public static function getBadgeDetails($badgeId){
        return self::select(
            'badge_details.id',
            'badge_details.title',
            'badge_details.description',
            'badge_details.condition',
            'badge_details.image_link'
        )
        ->where('badge_details.id', $badgeId)
        ->get();
    }

    public static function getBadgeIdWithConditions($condition){
        return self::select('id')
            ->where('condition', $condition)
            ->first(); // Utilisez first() pour obtenir un seul enregistrement
    }

    public static function getBadgeImage($badgeId){
        return self::select('image_link')
            ->where('id', $badgeId)
            ->first(); // Utilisez first() pour obtenir un seul enregistrement
    }



}
