<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;

class initialSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initial:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'First configuration setup';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = config('config.cities');

        foreach($cities as $city)
        {
            City::create([
                'name' => $city['name'],
                'long' => $city['long'],
                'lat' => $city['lat'],
            ]);
        }
    }
}
