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
        Schema::create('rulesets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruleset_id')->nullable()->constrained('rulesets')->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('blocks');
        });

        Schema::create('expressions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('block_id')->constrained('blocks');
            $table->string('field');
            $table->string('operator');
            $table->string('previous_expression_operator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expressions');
        Schema::dropIfExists('blocks');
        Schema::dropIfExists('rulesets');
    }
};
