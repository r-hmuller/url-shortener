<?php

namespace App\Http\Controllers;

use App\Events\UrlAccessed;
use App\Models\Click;
use App\Models\Url;
use Carbon\Carbon;

class UrlController extends Controller
{
    public function get(Url $url) {
        UrlAccessed::dispatch($url);
        return redirect()->away($url->full_url);
    }

    public function stats(Url $url) {
        $allClicks = $url->clicks()->count();
        $dailyClicks = $url->clicks()->where('created_at', '>', Carbon::now()->subDay())->count();
        $stats = [
            'daily' => $dailyClicks,
            'weekly' => $allClicks
        ];

        return response()->json($stats);
    }
}
