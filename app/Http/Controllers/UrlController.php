<?php

namespace App\Http\Controllers;

use App\Events\UrlAccessed;
use App\Models\Click;
use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function save(Request $request) {
        $fullUrl = $request->input('url');
        $shortenUrl = $this->store($fullUrl);
        return response()->json(['shortenUrl' => $shortenUrl], 201);
    }

    private function store($fullUrl) {
        $shortenUrlExists = null;
        $generatedUrl = null;
        while ($shortenUrlExists != null) {
            $generatedUrl = $this->generateRandomString();
            $shortenUrlExists = Url::where('shorten_url', $generatedUrl)->first();
        }

        $url = new Url(['full_url' => $fullUrl, 'shorten_url' => $generatedUrl]);
        $url->save();
        return $generatedUrl;
    }

    private function generateRandomString($length = 7) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
