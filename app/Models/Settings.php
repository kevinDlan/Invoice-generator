<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getSettings()
    {
        $settings = Settings::first(["compagny_name", "compagny_address", "code", "vat", "phone"]);
        return $settings;
    }
}
