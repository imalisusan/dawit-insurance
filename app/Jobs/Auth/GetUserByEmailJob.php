<?php

namespace App\Jobs\Auth;

use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;

class GetUserByEmailJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $email,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return User::query()
            ->where('email', $this->email)
            ->first();
    }
}
