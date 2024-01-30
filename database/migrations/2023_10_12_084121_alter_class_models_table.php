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
        Schema::table('class_models', function (Blueprint $table) {
            $table->integer('created_by')->nullable()->after('status');
            $table->tinyInteger('is_delete')->default(0)->comment('0:not,1:yes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_models', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};
