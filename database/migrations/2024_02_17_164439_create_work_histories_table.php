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
            $table->text('text')->nullable();
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
            $table->datetime('datetime')->nullable();


            $table->text('work')->nullable()->comment('что делалось');
             $table->string('heft',50)->nullable()->comment('вес');
             $table->string('touch_count',50)->nullable()->comment('подходов');
             $table->string('retry_count',50)->nullable()->comment('повторений');

            $table->float('feeling')->default(0.5)->nullable()->comment('ощущение_коэф');
            $table->string('feeling_text',250)->nullable()->comment('ощущение_текст');

            $table->integer('hours_after_last_work')->nullable()->comment('прошло часов с прошлой тренировки');
            $table->integer('percent_last_work')->nullable()->comment('процент прошлой тренировки');


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
