<?php

declare(strict_types=1);

namespace App\Actions\Customer;

use Illuminate\Support\Facades\DB;

final readonly class CreateNewCustomer
{
    /**
     * Execute the action.
     */
    public function handle(): void
    {
        DB::transaction(function (): void {
            //
        });
    }
}
