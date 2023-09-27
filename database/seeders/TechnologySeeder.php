<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// models
use App\Models\Technology;
// facades
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types=[
            'html',
            'css',
            'js',
            'vue',
            'php',
            'laravel'
        ];
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        Schema::enableForeignKeyConstraints();
        foreach($types as $type){
            $object = new Technology();
            $object->name = $type;
            $object->save();
        }
    }
}