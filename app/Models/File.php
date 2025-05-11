<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    const STATUS_ASSIGN = 1;
    const STATUS_CONFIRM = 2;
    const STATUS_DONE = 3;

    const PRIORITY_LOW = 1;
    const PRIORITY_MEDIUM = 2;
    const PRIORITY_HIGH = 3;

    const SYNC = 1;
    const UN_SYNC = 0;

    const CONVERT_STATUS_TXT = [
        1 => '処理',
        2 => '確認する',
        3 => '終わり'
    ];

    const CONVERT_PRIORITY_TXT = [
        1 => 'LOW',
        2 => 'MEDIUM',
        3 => 'HIGH'
    ];

    const CONVERT_SYNCHRONIZE_TXT = [
        0 => 'Not synchronized',
        1 => 'Synchronized'
       
    ];

    //Liên kết tới bảng csdl
    protected $table = 'files';

    //Ánh xạ các trường trong bảng csdl
    protected $fillable = [
        "filename",
        "deadline",
        "status",  //1: assign, 2: confirm, 3: done
        "priority", //1: Low, 2: Medium, 3: High
        "user_id",
        "synchronize",  //Đồng bộ hóa 1: Synchronized, 0: Not synchronized
        "created_at",
        "updated_at"
    ];

    /**
     * Liên kết 1-1
     * 
     * SỬ dụng belongTo hoặc hasOne
     */
    public function user()
    {
        return $this->belongTo('App\Models\User', 'user_id', 'id');
    }
}
