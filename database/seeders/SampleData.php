<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB:: table('ten bang')-> <các lệnh query>(); //để kết nối tới bảng
        /**
         * Query builder: thao tác trực tiếp tới bảng csdl
         * Ưu điểm: tốc độ nhanh vì thao tác trực tiếp tới csdl
         * Nhược điểm: xử lý logic k mạnh
         */
        //Tao 100 editor va 1 admin
        for ($i = 0; $i < 100; $i++) {
            DB:: table('users')->insert( [
                'name' => 'editor-'.$i,
                'email'=>'editorEmail'.$i.'@gmail.com',
                /**
                 * Mã hóa mật khẩu dưới dạng SMA
                 * Khóa bí mật là giá trị của APP_KEY trong env
                 */
                'password' => Hash::make('12345678'),
                'role' => 0
            ]);
        }
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1
        ]);
        //tạo 10000 files tương ứng với 100 editor
    }
}
