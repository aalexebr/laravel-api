<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// models
use App\Models\Project;
use App\Models\Type;
// facades
use Illuminate\Support\Facades\Schema;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();
        for($i=0; $i<10; $i++){
            $portfolio = new Project();
            $newtype=Type::inRandomOrder()->first();
            $portfolio->title = substr(fake()->sentence(),0,32);
            $portfolio->slug = str()->slug($portfolio->title);
            $portfolio->content = fake()->paragraph();
            $portfolio->start_date = fake()->dateTimeBetween('-1 year', '-1 week');
            $portfolio->end_date = fake()->dateTimeBetween($portfolio->start_date, '+1 month');
            $portfolio->type_id = $newtype->id;
            $portfolio->save();
        }
    }
}
