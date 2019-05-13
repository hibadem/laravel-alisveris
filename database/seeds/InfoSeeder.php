<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info')->insert([
            'userid'=>1,
            'job'=>'PHP ogrenicisi',
            'school'=>'BŞEÜ'
        ]);
    }
}
