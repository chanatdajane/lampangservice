<?php namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
class Organization extends Model {
 
 protected $table = 'organization'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
 
}