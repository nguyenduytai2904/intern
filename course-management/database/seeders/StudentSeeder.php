<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table("students")->insert([
            [
                "name"  => "Anh Lang Coc",
                "email" => "langcoc@gmail.com",
                "phone" => "+84311123312",
            ],
            [
                "name"  => "Binh Thanh Son",
                "email" => "binhson@gmail.com",
                "phone" => "+84981234567",
            ],
            [
                "name"  => "Minh Chau Le",
                "email" => "minhchau.le@example.com",
                "phone" => "+84777123456",
            ],
            [
                "name"  => "Van An Tran",
                "email" => "vanan.tran@gmail.com",
                "phone" => "+84852233221",
            ],
            [
                "name"  => "Hien Tu Nguyen",
                "email" => "hientu.nguyen@example.com",
                "phone" => "+84399887766",
            ],
        ]);
    }
}
