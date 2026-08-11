<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('subtitle')->nullable()->after('title');
            $table->text('description')->nullable()->after('subtitle');
            $table->text('summary')->nullable()->after('description');
            $table->json('points')->nullable()->after('summary');
            $table->text('closing_text')->nullable()->after('points');
            $table->unsignedInteger('sort_order')->default(0)->after('closing_text');
        });
    }

    public function down(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn(['title', 'subtitle', 'description', 'summary', 'points', 'closing_text', 'sort_order']);
        });
    }
};
