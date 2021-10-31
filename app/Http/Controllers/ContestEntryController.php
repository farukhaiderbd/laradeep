<?php

namespace App\Http\Controllers;

use App\Events\PodcastProcessed;
use App\Models\ContestEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContestEntryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',

        ]);

        $user = ContestEntry::create($data);
        Cache::put('contest',$user);
//        PodcastProcessed::dispatch($user);
//        event(PodcastProcessed::class);
    }
}
