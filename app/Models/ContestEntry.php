<?php

namespace App\Models;

use App\Events\PodcastProcessed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dispatchesEvents =
        [
          'created' => PodcastProcessed::class,
        ];
}
