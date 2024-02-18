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
        Schema::create('work_histories', function (Blueprint $table) {
            $table->id();

            //имя тренеровки
            $table->string('name');
            $table->text('comment')->nullable();
            //пользователь системы
            $table->foreignIdFor(\App\Models\User::class)
                  ->nullable()->constrained();

            //что тренируем
            $table->foreignIdFor(\App\Models\WorkItemModel::class,'item_id',)
                  ->constrained('work_items');

            //колько дней отдыхает
            $table->integer('colling_days')->default(7);


            //дата тренеровки
            $table->date('date')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_histories');
    }
};
