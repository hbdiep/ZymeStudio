<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FileData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 10000 bản ghi bảng files
        $fileArray = [];
        for ($i = 0; $i < 10000; $i++) {
            array_push($fileArray, [
                'filename' => 'filename-'.$i,
                'deadline' => Carbon::now(), //lay thoi gian hiện tại
                'status' => 1,
                'priority'=> 1,
                'user_id'=> rand(1, 100),
                'synchronize' =>0
            
            ]);
        }
        //Debug trong laravel
        //dd($fileArray);
        try {
            //Tạo 1 yêu cầu giao dịch với csdl
            DB::beginTransaction();
            //khi thao tác của yêu cầu thành công thì mới cập nhật csdl
            DB::table('files')->insert($fileArray);
            //Tiến hành xử lý dữ liệu
            DB::commit();
        }catch (\Exception $e) {
            //Nếu thao tác giao dịch và csdl thất bại
            //Tiến hành rollback về dữ liệu cũ
            DB::rollBack();
            // dd($e);
        }
    }
}
