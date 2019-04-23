<?php

use Illuminate\Database\Seeder;
use App\Wali_Kelas;

class WaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wali_Kelas::Create([
            'nama_wali' => 'Rhiannon'
        ]);

        Wali_Kelas::Create([
            'nama_wali' => 'Trycia'
        ]);

        Wali_Kelas::Create([
            'nama_wali' => 'Jairo'
        ]);
    }
}
