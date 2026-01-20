<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspirationFeedback extends Model
{
    protected $fillable = [
        'aspiration_id',
        'admin_id',
        'title',
        'feedback'
    ];

    public function aspiration()
    {
        return $this->belongsTo(Aspiration::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
