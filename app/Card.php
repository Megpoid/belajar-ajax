<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Card extends Model
{
    protected $fillable = [
        'name', 'email', 'avatar',
    ];

    public function getCardDetail() {
        return $this->hasOne('App\CardDetail', 'card_id', 'id');
    }

    public static function saveImage($cardName, $image) {
        $imageName = $cardName . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/'), $imageName);

        return $imageName;
    }

    public static function deleteImage($image) {
        $imageName = File::delete(public_path('images/'. $image));
    }
}
