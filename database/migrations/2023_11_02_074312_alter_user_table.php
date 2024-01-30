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
            $table->tinyInteger('is_delete')->default(0)->comment('0:not,1:yes');
            $table->tinyInteger('user_type')->default(0)->comment('1:admin,2:teacher,3:student,4:parent');
            $table->string('admission_number', 50)->nullable();
            $table->string('roll_number', 50)->nullable();
            $table->integer('class_id')->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('occupation', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('caste', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('mobile_number', 50)->nullable();
            $table->date('admission_date')->nullable();
            $table->string('profile_pic', 100)->nullable();
            $table->string('blood_group', 10)->nullable();
            $table->string('height', 50)->nullable();
            $table->string('weight', 50)->nullable();
            $table->string('address', 100)->nullable();
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
