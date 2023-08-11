<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Enums\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Task::create([
            'title' => 'Sample Task 1',
            'description' => 'This is a sample task.',
            'status' => Status::Incomplete,
        ]);

        Task::create([
            'title' => 'Sample Task 2',
            'description' => 'This is another sample task.',
            'status' => Status::Completed,
        ]);
    }
}
