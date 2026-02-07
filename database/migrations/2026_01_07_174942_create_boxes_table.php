<?php

declare(strict_types=1);

use App\Enums\Box\StatusBoxEnum;
use App\Enums\Box\TypeBoxEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('capacity')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->enum('type', TypeBoxEnum::cases())->default(TypeBoxEnum::Normal->value);
            $table->enum('status', StatusBoxEnum::cases())->default(StatusBoxEnum::Available->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};
