<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "title" => "New Branch In Dubai",
                "mini_description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas.",

                "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas, dignissimos in doloremque recusandae perferendis rerum quod veritatis asperiores iusto, perspiciatis quaerat. Magnam adipisci, est provident quod aut voluptates dignissimos sunt sint voluptatibus nam facere, non earum placeat exercitationem blanditiis possimus nobis, mollitia laborum ratione fuga. Quod eum quisquam recusandae reprehenderit.",
                "main_image" => "event1.webp",
                "type" => "event",
                "tags" => "tag1 tag2 tag3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "video_url" => null,
            ],
            [
                "title" => "Project Agreement With Rakez",
                "mini_description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas.",

                "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas, dignissimos in doloremque recusandae perferendis rerum quod veritatis asperiores iusto, perspiciatis quaerat. Magnam adipisci, est provident quod aut voluptates dignissimos sunt sint voluptatibus nam facere, non earum placeat exercitationem blanditiis possimus nobis, mollitia laborum ratione fuga. Quod eum quisquam recusandae reprehenderit.",
                "main_image" => "event2.webp",
                "type" => "event",
                "tags" => "tag1 tag2 tag3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "video_url" => null,
            ],
            [
                "title" => "Make a deal with Rakez",
                "mini_description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas.",

                "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas, dignissimos in doloremque recusandae perferendis rerum quod veritatis asperiores iusto, perspiciatis quaerat. Magnam adipisci, est provident quod aut voluptates dignissimos sunt sint voluptatibus nam facere, non earum placeat exercitationem blanditiis possimus nobis, mollitia laborum ratione fuga. Quod eum quisquam recusandae reprehenderit.",
                "main_image" => "event3.webp",
                "type" => "event",
                "tags" => "tag1 tag2 tag3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "video_url" => null,
            ],
            [
                "title" => "Project With Rakez",
                "mini_description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas.",
                "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at necessitatibus rem aliquid voluptas, dignissimos in doloremque recusandae perferendis rerum quod veritatis asperiores iusto, perspiciatis quaerat. Magnam adipisci, est provident quod aut voluptates dignissimos sunt sint voluptatibus nam facere, non earum placeat exercitationem blanditiis possimus nobis, mollitia laborum ratione fuga. Quod eum quisquam recusandae reprehenderit.",
                "main_image" => "event1.webp",
                "type" => "event",
                "tags" => "tag1 tag2 tag3",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
                "video_url" => null,
            ]
        ];
        foreach ($data as $key => $value) {
        Event::create([
            'title'       => $value['title'],
            "mini_description" => $value['mini_description'],
            'description' => $value['description'],
            'type'        => $value['type'],
            'main_image'  => $value['main_image'],
            'tags'        => $value['tags'],
            'created_at'  => $value['created_at'],
            'updated_at'  => $value['updated_at'],
            'video_url'   => $value['video_url']
        ]);
    }
    }
}
