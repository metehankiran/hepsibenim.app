<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Setting::create([
            'about' => 'website aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite aboutwebsite about',
            'map'=> 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53357.14257194912!2d-73.07268695801845!3d40.78017062807504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e8483b8bffed93%3A0x53467ceb834b7397!2s396+Lillian+Blvd%2C+Holbrook%2C+NY+11741%2C+USA!5e0!3m2!1sen!2sua!4v1558703206875!5m2!1sen!2sua',
            'address'=> '396 Lillian Blvd, Holbrook, NY 11741, USA',
            'phone_numbers' => '+1 (212) 888-8888,+1 (212) 888-8888',
            'emails'=> 'test1@mail,test2@mail',
            'working_hours'=> '9:00 - 18:00,9:00 - 18:00', 
            'instagram'=> 'https://www.instagram.com/',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123123123'),
            'remember_token' => Str::random(10),
        ]);
        Category::create([
            'title' => 'Category 1',
            'slug' => 'category-1',
            'image' => 'asd',
        ]);
        Category::create([
            'title' => 'Category 2',
            'slug' => 'category-2',
            'image' => 'asd',
        ]);
        Category::create([
            'title' => 'Category 3',
            'slug' => 'category-3',
            'image' => 'asd',
        ]);
        \App\Models\Product::factory(33)->create();
    }
}
