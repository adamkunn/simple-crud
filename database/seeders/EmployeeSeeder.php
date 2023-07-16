<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'nama' => 'bambang',
                'jeniskelamin' => 'cowo',
                'notelpon' => '087624521',
            ],
            [
                'nama' => 'Tukiyem',
                'jeniskelamin' => 'cewe',
                'notelpon' => '081313662',
            ],
            // Add more data here
            [
                'nama' => 'David',
                'jeniskelamin' => 'cowo',
                'notelpon' => '0876652412',
            ],
            [
                'nama' => 'Eny',
                'jeniskelamin' => 'cewe',
                'notelpon' => '087663951',
            ],
            [
                'nama' => 'Mikel',
                'jeniskelamin' => 'cowo',
                'notelpon' => '08721741451',
            ],
        ]);
    }
}
