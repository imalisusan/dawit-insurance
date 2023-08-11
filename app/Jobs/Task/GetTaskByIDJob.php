<?php

namespace App\Jobs\Task;

use App\Models\Task;
use Illuminate\Foundation\Bus\Dispatchable;

class GetTaskByIDJob 
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $id,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Task::query()
            ->where('id', $this->id)
            ->first();
    }
}
