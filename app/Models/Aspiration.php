<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(AspirationFeedback::class);
    }

    public function canBeDeletedBy($user)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->user_id === $user->id
            && $this->status === 'Terkirim';
    }
}
