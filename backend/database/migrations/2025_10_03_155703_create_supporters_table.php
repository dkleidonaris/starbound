<?php

use App\Models\SupporterType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supporters', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('logo')->nullable();
            $table->boolean('bg')->default(false);
            $table->string('url')->nullable();
            $table->integer('order')->default(0);
            $table->foreignIdFor(SupporterType::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supporters');
    }
};
