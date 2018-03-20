<?php

use Illuminate\Database\Seeder;
use App\Day;
use Carbon\Carbon;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Day::where('days','=','Senin')->first() === null) {
        	$days1 = Day::create([
        		'days'=>'Senin',
        	]);
        }

        if (Day::where('days','=','Selasa')->first() === null) {
            $days2 = Day::create([
                'days'=>'Selasa',
            ]);
        }

        if (Day::where('days','=','Rabu')->first() === null) {
            $days3 = Day::create([
                'days'=>'Rabu',
            ]);
        }

         if (Day::where('days','=','Kamis')->first() === null) {
            $days4 = Day::create([
                'days'=>'Kamis',
            ]);
        }

         if (Day::where('days','=','Jumat')->first() === null) {
            $days5 = Day::create([
                'days'=>'Jumat',
            ]);
        }

        if (Day::where('days','=','Sabtu')->first() === null) {
            $days6 = Day::create([
                'days'=>'Sabtu',
            ]);
        }

        if (Day::where('days','=','Minggu')->first() === null) {
            $days7 = Day::create([
                'days'=>'Minggu',
            ]);
        }
    }
}
