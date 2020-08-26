<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'S1000RR',
            'PHP',
            'Laravel',
            'Healthy',
            'Dinh dưỡng',
            'Apple',
            'Barcelona',
            'Manchester United',
            'Yamaha R1',
            'BMW i8 Roster',
            'Samsung',
            'Android',
            'Java',
        ];

        foreach ($tags as $tag) {
            if (!DB::table('tags')->where('name', $tag)->first()) {
                DB::table('tags')->insert(['name' => $tag]);
            }
        }

        $tags = DB::table('tags')->get();
        $posts = DB::table('posts')->get();

        foreach ($tags as $tag) {
            $listPostId = [];
            for ($i = 0; $i < 12; $i++) {
                $randomPostId = $posts->random()->id;
                if (!in_array($randomPostId, $listPostId)) {
                    DB::table('tag_post')->insert([
                        'tag_id' => $tag->id,
                        'post_id' => $randomPostId
                    ]);
                } else {
                    continue;
                }
            }
        }
    }
}
