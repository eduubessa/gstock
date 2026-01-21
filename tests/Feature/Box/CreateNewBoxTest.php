<?php

declare(strict_types=1);

use App\Enum\Box\StatusBoxEnum;
use App\Enum\Box\TypeBoxEnum;
use App\Models\User;

use function Pest\Laravel\actingAs;

test('user can create a new box', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post('boxes', [
            'name' => 'Test Box',
            'description' => 'Test Description',
            'capacity' => '100',
            'quantity' => '200',
            'type' => TypeBoxEnum::Normal->value,
            'status' => StatusBoxEnum::Available->value,
        ])
        ->assertRedirect('boxes.show');

    $this->assertDatabaseHas('boxes', [
        'name' => 'Test Box',
        'description' => 'Test Description',
        'capacity' => '100',
        'quantity' => '200',
        'type' => TypeBoxEnum::Normal->value,
        'status' => StatusBoxEnum::Available->value,
    ]);
});
