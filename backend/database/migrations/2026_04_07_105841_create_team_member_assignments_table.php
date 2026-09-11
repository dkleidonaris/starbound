<?php

use App\Models\Season;
use App\Models\Team;
use App\Models\TeamMember;
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
        Schema::create('team_member_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Team::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(TeamMember::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Season::class)->constrained()->onDelete('cascade');

            $table->json('role')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_member_assignments');
    }
};
