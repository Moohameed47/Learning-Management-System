<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorMentorLeaveTrackingTable extends Migration
{
    public function up()
    {
        Schema::create('instructor_mentor_leave_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->date('leave_date');
            $table->enum('status', ['Left', 'Still Active']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instructor_mentor_leave_tracking');
    }
}
