<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Events;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Tag;
use App\Models\VideoStories;
use App\Models\Zvyazky;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = \App\Models\Tag::all();

        // Отримайте всі пости різних типів
        $type1Posts = News::all();
        $type2Posts = VideoStories::all();
        $type3Posts = Events::all();
        $type5Posts = Announcement::all();

        // Присвойте теги до постів
        foreach ($type1Posts as $post) {
            $tagsIds = $tags->random(3)->pluck('id')->toArray();

            foreach ($tagsIds as $tagId) {
                DB::table('taggables')->insert([
                    'tag_id' => $tagId,
                    'taggable_id' => $post->id,
                    'taggable_type' => get_class($post),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        foreach ($type2Posts as $post) {
            $tagsIds = $tags->random(3)->pluck('id')->toArray();

            foreach ($tagsIds as $tagId) {
                DB::table('taggables')->insert([
                    'tag_id' => $tagId,
                    'taggable_id' => $post->id,
                    'taggable_type' => get_class($post),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        foreach ($type3Posts as $post) {
            $tagsIds = $tags->random(3)->pluck('id')->toArray();

            foreach ($tagsIds as $tagId) {
                DB::table('taggables')->insert([
                    'tag_id' => $tagId,
                    'taggable_id' => $post->id,
                    'taggable_type' => get_class($post),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        foreach ($type5Posts as $post) {
            $tagsIds = $tags->random(3)->pluck('id')->toArray();

            foreach ($tagsIds as $tagId) {
                DB::table('taggables')->insert([
                    'tag_id' => $tagId,
                    'taggable_id' => $post->id,
                    'taggable_type' => get_class($post),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
