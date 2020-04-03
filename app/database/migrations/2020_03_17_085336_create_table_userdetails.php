<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUserdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserDetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('User_ID'); //รหัสประชาชน
            $table->string('Code_ID'); //รหัสประชาชน
            $table->string('Status'); //สถานะ นิสิต/บุคคลทั่วไป
            $table->string('Collegian_ID'); //รหัสนิสิต
            $table->string('Firstname_Thai'); //ชืื่อ ไทย
            $table->string('Lastname_Thai'); //นามสกุล ไทย
            $table->string('Firstname_Eng'); //ชื่อ อิ้ง
            $table->string('Lastname_Eng'); //นามสกุล อิ้ง
            $table->string('Gender'); //เพศ
            $table->string('ethnicity');//เชื้อชาติ
            $table->string('nationality');//สัญชาติ
            $table->string('religion');//ศาสนา
            $table->date('Birth_Date'); //วันเกิด
            $table->string('Phone'); //เบอร์โทร
            $table->string('Faculty');//คณะ
            $table->string('Major'); //สาขา
            $table->string('Level'); //ชั้นปี
            $table->string('Address'); //ที่อยุ่
            $table->string('Amphures'); //ตำบล
            $table->string('Districts'); //อำเภอ
            $table->string('Provinces'); //จังหวัด
            $table->string('country'); //ประเทศ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserDetails');
    }
}
