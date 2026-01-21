<?php

declare(strict_types=1);

namespace App\Actions\Box;

use App\Models\Box;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final readonly class CreateNewBox
{
    /**
     * Execute the action.
     */
    public function handle(array $data, User $creator): Box
    {
        return DB::transaction(function () use ($data, $creator) {
            //
            $box = Box::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'capacity' => $data['capacity'],
                'quantity' => $data['quantity'],
                'type' => $data['type'],
                'status' => $data['status'],
            ]);

            $box->logs()->create([
                'event' => 'A caixa foi criada',
                'actor' => $creator,
                'payload' => [
                    'ip' => request()->ip(),
                ],
            ]);

            return $box;
        });
    }
}
