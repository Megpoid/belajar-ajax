<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardDetail extends Model
{
    protected $fillable = [
        'card_id', 'desc'
    ];

    public function getCard() {
        return $this->hasOne('App\Card', 'id', 'card_id');
    }
}
