<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Mã học sinh (Primary Key)
            $table->string('first_name', 50); // Tên học sinh
            $table->string('last_name', 50); // Họ đệm
            $table->date('date_of_birth'); // Ngày sinh
            $table->string('parent_phone', 20); // Số điện thoại phụ huynh
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade'); // Khóa ngoại đến bảng classes
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
