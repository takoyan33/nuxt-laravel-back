<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->timestamps();
        });

        //ファーサードデータの挿入
        DB::table('priorities')->insert([
            ['name' => '高', 'description' => '高い優先度', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '中', 'description' => '中程度の優先度', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '低', 'description' => '低い優先度', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
