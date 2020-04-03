<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetailModel extends Model
{
    protected $table="UserDetails";
    protected $fillable = [
        'Code_ID', //รหัสประชาชน
        'Status',//สถานะ นิสิต/บุคคลทั่วไป
        'Collegian_ID',//รหัสนิสิต
        'Firstname_Thai',//ชืื่อ ไทย
        'Lastname_Thai',//นามสกุล ไทย
        'Firstname_Eng',//ชื่อ อิ้ง
        'Lastname_Eng',//นามสกุล อิ้ง
        'Gender',//เพศ
        'ethnicity',//เชื้อชาติ
        'nationality',//สัญชาติ
        'religion',//ศาสนา
        'Birth_Date', //วันเกิด
        'Phone',//เบอร์โทร
        'Faculty',//คณะ
        'Major',//สาขา
        'Level',//ชั้นปี
        'Address',//ที่อยุ่
        'Amphures',//ตำบล
        'Districts',//อำเภอ
        'Provinces',//จังหวัด
        'country',//ประเทศ
    ];
}
