<?php

namespace Database\Seeders;
use App\Models\SdlblogTag;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $tags = array(
            array('id' => 1,  'keyword' => 'ICT', 'count' => 0, 'created_at' => $date, 'updated_at' => $date),
            array('id' => 2,  'keyword' => 'Development', 'count' => 0, 'created_at' => $date, 'updated_at' => $date),
          
        );
        SdlblogTag::insert($tags);
    }
}
