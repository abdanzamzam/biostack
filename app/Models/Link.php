<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'user_id', 'type', 'title', 'url', 'icon', 'image',
        'content', 'sort_order', 'is_active', 'starts_at', 'ends_at', 'click_count'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
            'click_count' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clickStats()
    {
        return $this->hasMany(LinkClick::class);
    }

    public function isVisible(): bool
    {
        if (!$this->is_active) return false;
        if ($this->starts_at && now()->lt($this->starts_at)) return false;
        if ($this->ends_at && now()->gt($this->ends_at)) return false;
        return true;
    }
}
