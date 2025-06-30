<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('idea_like', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();
            $table->timestamps(); /*this alone is NOT enough in (pivot tables) you have to add withtimestamps() in the models relations
             Many pivot tables are used just for relationships (e.g., role_user) and don't need timestamps.
            Pivot tables aren't Eloquent models, so Laravel won't treat them the same unless you tell it to.*/


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_like');
    }
};
