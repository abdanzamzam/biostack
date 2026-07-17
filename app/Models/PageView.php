<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = ["user_id", "date", "count"];

    protected function casts(): array
    {
        return ["date" => "date"];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function incrementOrCreate($userId, $date = null)
    {
        $date = $date ?? today();
        $record = static::where("user_id", $userId)->where("date", $date)->first();

        if ($record) {
            $record->increment("count");
            return $record;
        }

        return static::create([
            "user_id" => $userId,
            "date" => $date,
            "count" => 1,
        ]);
    }
}
