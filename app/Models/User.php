<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        "name", "email", "password",
        "username", "custom_domain", "custom_domain_verified_at",
        "theme_id", "page_title", "page_bio", "page_avatar",
        "bg_type", "bg_value", "seo_title", "seo_description",
        "og_image", "plan", "is_active",
    ];

    protected $hidden = ["password", "remember_token"];

    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
            "custom_domain_verified_at" => "datetime",
            "is_active" => "boolean",
            "bg_value" => "array",
        ];
    }

    public function links()
    {
        return $this->hasMany(Link::class)->orderBy("sort_order");
    }

    public function activeLinks()
    {
        return $this->hasMany(Link::class)->orderBy("sort_order")->where("is_active", true);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function pageViews()
    {
        return $this->hasMany(PageView::class);
    }

    public function getBioUrlAttribute()
    {
        return url("/" . $this->username);
    }

    public function scopeAvailable($query)
    {
        return $query->where("is_active", true)->whereNotNull("username");
    }
}
