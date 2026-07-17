<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = ['name', 'slug', 'is_premium', 'preview_image', 'config', 'is_active'];

    protected function casts(): array
    {
        return [
            'config' => 'array',
            'is_premium' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
