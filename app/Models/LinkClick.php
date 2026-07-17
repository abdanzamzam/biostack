<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkClick extends Model
{
    protected $fillable = ["link_id", "date", "count"];

    protected function casts(): array
    {
        return ["date" => "date"];
    }

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    public static function incrementOrCreate($linkId, $date = null)
    {
        $date = $date ?? today();
        $record = static::where("link_id", $linkId)->where("date", $date)->first();

        if ($record) {
            $record->increment("count");
            return $record;
        }

        return static::create([
            "link_id" => $linkId,
            "date" => $date,
            "count" => 1,
        ]);
    }
}
