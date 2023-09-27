<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// models
use App\Models\Type;
// facades
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types=[
            'A',
            'B',
            'C',
            'D',
            'E',
            'F'
        ];
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();
        foreach($types as $type){
            $object = new Type();
            $object->name = $type;
            $object->save();
        }
    }
}
