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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug_name')->nullable();
            $table->string('sub_name')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('scope')->nullable();
            $table->string('duration')->nullable();
            $table->string('gif')->default('maingif.gif')->nullable();
            $table->enum('status' ,['completed' , 'in progress']);
            $table->enum('priority' ,['h-v1' , 'h-v2' , 'm-v1' , 'm-v2' , 'l-v1' , 'l-v2']);
            $table->string('main_image')->default('main.webp');
            $table->string('consultant')->nullable();
            $table->text('mini_desc')->nullable();
            $table->text('full_desc')->nullable();
            $table->timestamp(column: 'start')->nullable();
            $table->timestamp(column: 'end')->nullable();
            $table->bigInteger(column: 'cost')->nullable();
            $table->text(column: 'video')->nullable();
            $table->foreignId('client_id')->nullable()->constrained(
                table: 'clients'
            )->nullOnDelete();
            $table->foreignId('sector_id')->nullable()->constrained(
                table: 'sectors'
            )->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
