<?php namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
class Event extends Model {
 
 protected $table = 'event'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
 
}