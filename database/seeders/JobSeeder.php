<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Sequence;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory(5)->create();
        Job::factory(15)->hasAttached($tags)->create(new Sequence([

            'schedule' => 'Full Time',
        ], [

            'schedule' => 'Part Time',
        ]));
    }
}
