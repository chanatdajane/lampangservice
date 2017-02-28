<?php namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
class Requests extends Model {
 
 protected $table = 'request'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
	 
}