<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Mã vấn đề báo cáo
            $table->foreignId('computer_id')->constrained('computers')->onDelete('cascade'); // Khóa ngoại đến bảng computers
            $table->string('reported_by', 50)->nullable(); // Người báo cáo sự cố (có thể để trống)
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả chi tiết vấn đề
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái hiện tại
            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
