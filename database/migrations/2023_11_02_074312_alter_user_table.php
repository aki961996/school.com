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
        Schema::table('users', function (Blueprint $table) {
            $table->string('admission_number', 50)->nullable()->after('is_delete');
            $table->string('roll_number', 50)->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('caste', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('mobile_number', 15)->nullable();
            $table->date('admission_date')->nullable();
            $table->string('profile_pic', 100)->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('height', 10)->nullable();
            $table->string('weight', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admission_number');
            $table->dropColumn('roll_number');
            $table->dropColumn('class_id');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('caste');
            $table->dropColumn('religion');
            $table->dropColumn('mobile_number');
            $table->dropColumn('admission_date');
            $table->dropColumn('profile_pic');
            $table->dropColumn('blood_group');
            $table->dropColumn('height');
            $table->dropColumn('weight');
        });
    }
};
