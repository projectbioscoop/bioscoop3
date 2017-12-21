<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $id = 1;
        $user               = new \App\User();
        $user->id           = $id;
        $user->email        = "Admin@Admin.Admin";
        $user->password     = "Admin@Admin.Admin";
        $user->firstname    = "Admin";
        $user->lastname     = "Admin";
        $user->insertion    = "";
        $user->gender       = "man";
        $user->mobileNumber = 1234567;
        $user->age          = 404;
        $user->role         = "admin";
        $user->save();
            
        $rooms = [
            [
                "id"    =>  1           ,
                "name"  =>  "Zaal 1"    ,
                "cap"   =>  150         ,
                "pR"    =>  15          ,
                "lPR"   =>  15          ,
                "lR"    =>  [6,7]       
            ],
            [
                "id"    =>  2           ,
                "name"  =>  "Zaal 2"    ,
                "cap"   =>  100         ,
                "pR"    =>  10          ,
                "lPR"   =>  10          ,
                "lR"    =>  [6,7]       
            ],
            [
                "id"    =>  3           ,
                "name"  =>  "Zaal 3"    ,
                "cap"   =>  100         ,
                "pR"    =>  10          ,
                "lPR"   =>  0           
            ]
        ];

        foreach ($rooms as $room)
        {
            $theather                           = new \App\tbl_theather();
            $theather->id                       = $room["id"];
            $theather->theather_id              = $room["id"];
            $theather->name                     = $room["name"];
            $theather->capacity                 = $room["cap"];
            $theather->amount_of_chairs_row     = $room["pR"];
            $theather->amount_of_loverchairs    = $room["lPR"];
            $theather->save();

            if (isset($room["lR"]))
            {
                foreach ($room["lR"] as $line)
                {
                    $zRules                 = new \App\tbl_z_rules();
                    $zRules->theather_id    = $room["id"];
                    $zRules->row_loveseat   = $line;
                    $zRules->save();
                }
            }
            
        }

        $amountMovies = 20;

        for ($i = 0;$i < $amountMovies;$i++)
        {
            $movie                      = new \App\tbl_movies();
            $movie->movie_title         = $faker->sentence;
            $movie->language_version    = $faker->languageCode;
            $movie->genre               = $faker->word;
            $movie->projection          = $faker->word;
            $movie->movie_info          = $faker->sentence;
            $movie->requirements        = $faker->sentence;
            $movie->save();
        }

        $ageCats = [
            ["iedereen   |   0+"    , 0 ],
            ["kinderen   |   6+"    , 6 ],
            ["jeugd      |   12+"   , 12],
            ["tiener     |   16+"   , 16],
            ["volwassen  |   21+"   , 21]
        ];

        foreach ($ageCats as $ageCat)
        {
            $age_cat            = new \App\tbl_age_catogories();
            $age_cat->age       = $ageCat[1];
            $age_cat->category  = $ageCat[0];
            $age_cat->save();
        }

        $startersTimes = [
            "15:00",
            "18:00",
            "20:30",
            "22:30"
        ];

        foreach ($startersTimes as $starterTime)
        {
            $time               = new \App\tbl_times();
            $time->start_time   = $starterTime;
            $time->save();
        }

        for ($i = 1;$i<11;$i++)
        {
            $movie_id           = rand(1, $amountMovies);
            $theather_id        = rand(1, count($rooms));
            $theather_id_temp   = rand(0, count($rooms)-1);
            $age_id             = rand(1, count($ageCats));
            $time_id            = rand(1, count($startersTimes));
            $date               = Carbon::now()->addDays(rand(0,2))->toDateString();
            $chairs;

            $display = new \App\tbl_displays();
            $display->display_id    = $i;
            $display->movie_id      = $movie_id;
            $display->theather_id   = $theather_id;
            $display->age_id        = $age_id;
            $display->timeslot_id   = $time_id;
            $display->date          = $date;
            $display->time          = ($time_id < 3 ? "02:00" : "01:30");
            $display->save();
            
            for ($j = 1;$j < rand(3, 10);$j++)
            {
                $order_id       = $j;
                $user_id;
                $amountTickets  = rand(1, 5);
                $count          = 0;

                $user               = new \App\User();
                $user->email        = $faker->email;
                $user->password     = "Admin@Admin.Admin";
                $user->firstname    = $faker->name;
                $user->lastname     = $faker->lastName;
                $user->insertion    = "";
                $user->gender       = "man";
                $user->mobileNumber = $faker->numberBetween(11111111,2147483647);
                $user->age          = $faker->numberBetween(0,150);
                $user->role         = "user";
                $user->save();
                $user_id = $user->id;

                for ($k = 0;$k < $amountTickets;$k++)
                {
                    $ticket = new \App\tbl_tickets();
                    $ticket->order_id   = $order_id;
                    $ticket->display_id = $i;
                    $ticket->chair_id   = $count++;
                    $ticket->used       = 0;
                    $ticket->barcode    = $faker->numberBetween(1111111111,2147483647);
                    $ticket->save();
                    $chairs = (isset($chairs)? array_merge($chairs, [$count]):[$count]);
                }
                
                $order = new \App\tbl_order();
                $order->order_id = $order_id;
                $order->user_id = $user_id;
                $order->save();
            }

            for ($j = 1;$j <= $rooms[$theather_id_temp]["cap"] ;$j++)
            {
                $rowNumber  = 0     ;
                $count      = 1     ;
                $used       = false ;

                for ($k = 0; $k > $rooms[$theather_id_temp]["cap"]; $k += $rooms[$theather_id_temp]["pR"])
                {
                    $k<$j?$count++:$rowNumber=$count;
                }

                foreach ($chairs as $chairItem)
                {
                    $j==$chairItem?$used=true:null;
                }

                $chair = new \App\tbl_chairs();
                $chair->theather_id = $theather_id;
                $chair->chairnumber = $j;
                $chair->rownumber   = $rowNumber;
                $chair->used        = $used;
                $chair->display_id  = $i;
                $chair->save();
            }
        }
    }
}
