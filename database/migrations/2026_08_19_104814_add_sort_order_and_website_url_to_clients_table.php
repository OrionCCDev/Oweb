<?php

use App\Models\Client;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('logo');
            $table->string('website_url')->nullable()->after('sort_order');
        });

        // Give every existing client a starting position (10, 20, 30, ...)
        // in their current display order, rather than leaving them all at
        // the same default 0. With everyone tied at 0, "promoting" a
        // client to the front would mean renumbering every other one -
        // spacing them out in steps of 10 leaves room to slot a promoted
        // client in front (e.g. sort_order 5) without touching the rest.
        Client::orderBy('id')->select('id')->chunkById(200, function ($clients) {
            $position = 10;
            foreach ($clients as $client) {
                $client->update(['sort_order' => $position]);
                $position += 10;
            }
        });
    }

    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['sort_order', 'website_url']);
        });
    }
};
