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
        Schema::create('permission_group_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permission_group_id')->constrained('permission_groups');
            $table->foreignId('permission_id')->constrained('permissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_group_has_permissions', function (Blueprint $table) {
            $table->dropForeign(['permission_group_id']);
            $table->dropForeign(['permission_id']);

            $table->dropColumn('permission_group_id');
            $table->dropColumn('permission_id');
        });
        
        Schema::dropIfExists('permission_group_has_permissions');
    }
};
