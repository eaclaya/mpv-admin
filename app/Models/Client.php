<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name", "domain", "due_date", "contact", "email"];

    protected $casts = [
        "due_date" => "datetime",
    ];

    protected function dueDateDisplay(): Attribute
    {
        return Attribute::make(get: fn() => $this->due_date?->format("Y-m-d"));
    }
}
