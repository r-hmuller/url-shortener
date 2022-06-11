<?php

namespace Database\Seeders;

use App\Models\Click;
use App\Models\Url;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClickSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 500; $i++) {
            $url = Url::inRandomOrder()->first();
            $click = new Click();
            $click->url()->associate($url);
            $click->save();
        }
    }
}
