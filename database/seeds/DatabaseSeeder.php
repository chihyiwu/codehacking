<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //truncate:截去整個資料表來移除所有資料列，並將自動遞增 ID 重設為零
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();
        
        //$this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function ($user){
            
            $user->posts()->save(factory(App\Post::class)->make());
        });
    
        factory(App\Role::class, 3)->create();
    
        factory(App\Category::class, 10)->create();
    
        factory(App\Photo::class, 1)->create();
    
        factory(App\Comment::class, 10)->create()->each(function ($c){
        
            $c->replies()->save(factory(App\CommentReply::class)->make());
        });
    }
}
