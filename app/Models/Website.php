<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::updated(function() {
            cache()->forget('websites');
        });
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
