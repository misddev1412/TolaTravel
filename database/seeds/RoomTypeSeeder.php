<?php

use Illuminate\Database\Seeder;
use App\Models\RoomType;
use Carbon\Carbon;
class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'          => 'Single',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Double',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Tripple',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Family',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Quad',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Queen',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'King',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Twin',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Hollywood Twin Room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Double-double',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Studio',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Executive Suite',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Junior Suite',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'President Suite',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Apartment',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Connecting room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Murphy Room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Accessible Room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Cabana',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Adjoining rooms',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Adjacent rooms',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Villa',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Executive Floor',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Smoking Room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'name'          => 'Non-Smoking Room',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
        ];
        RoomType::insert($data);
    }
}
