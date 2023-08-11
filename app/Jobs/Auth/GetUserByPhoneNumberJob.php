<?php

namespace App\Jobs\Auth;

use App\Models\User;
use Illuminate\Foundation\Bus\Dispatchable;

class GetUserByPhoneNumberJob
{
    use Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $phoneNumber,
        public ?array $filters = [],
        public ?array $relations = [],
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return User::query()
            ->where('phone_number', $this->phoneNumber)
            ->first();
    }
}
