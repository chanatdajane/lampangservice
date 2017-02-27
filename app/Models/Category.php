<?php namespace App\Models; // การกำหนดที่อยู่ของ Model
use Illuminate\Database\Eloquent\Model; // การเรียกใช้งาน Eloquent ใน laravel
class Category extends Model {
 
 protected $table = 'category'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
 
}