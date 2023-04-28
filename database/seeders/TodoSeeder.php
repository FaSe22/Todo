<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::factory(20)->state(new Sequence(
            ['priority' => 'LOW'],
            ['priority' => 'MEDIUM'],
            ['priority'=> 'HIGH']
        ))->forUser()->sequence(fn(Sequence $sequence) => ['due_date' => today()->subDays($sequence->index)])->create();
    }
}
