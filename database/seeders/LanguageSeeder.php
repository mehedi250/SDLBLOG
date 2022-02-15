<?php

namespace Database\Seeders;
use App\Models\SdlblogLanguage;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $languages = array(
            array('id' => 1,  'name' => 'English', 'slug' => 'english', 'status' => 1, 'created_at' => $date, 'updated_at' => $date),
            array('id' => 2,  'name' => 'Bangla', 'slug' => 'bangla', 'status' => 1, 'created_at' => $date, 'updated_at' => $date),
        );
        SdlblogLanguage::insert($languages);
    }
}
