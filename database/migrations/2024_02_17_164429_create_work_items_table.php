<?php

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
        Schema::create('work_items', function (Blueprint $table) {
            $table->id();

            //имя тренеровки
            $table->string('name');
            //пользователь системы
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained();

            $table->string('image_key',250)->nullable()->comment('Ключ в настройках(имя изображения)');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_items');
    }
};
