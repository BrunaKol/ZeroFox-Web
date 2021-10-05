<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('products')->insert([
            'name' => 'Crash Bandicoot 4: Its About Time',
            'description' => 'THE DEVIOUS VILLAINS NEO CORTEX AND DR. N. TROPY HAVE FINALLY ESCAPED THEIR INTERDIMENSIONAL PRISON, LEAVING AN EVIL SCIENTIST SIZED HOLE IN THE UNIVERSE. NOW THEY’VE GOT THEIR EYES SET ON NOT ONLY SIMPLY CONQUERING THIS DIMENSION, BUT ALL DIMENSIONS, AND IT’S UP TO CRASH AND COCO TO SAVE THE DAY. N. SANITY BEACH IS WHERE CRASH’S ADVENTURE FIRST STARTED, AND WHERE IT BEGINS IN CRASH 4.',
            'photo' => 'https://image.api.playstation.com/vulcan/ap/rnd/202102/2419/asYXG3aPJx13PdFjXbmC408F.png',
            'price' => 59.99
         ]);
 
         DB::table('products')->insert([
             'name' => 'Cyberpunk 2077',
             'description' => 'Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. You can customize your character’s cyberware, skillset and playstyle, and explore a vast city where the choices you make shape the story and the world around you.',
             'photo' => 'https://compass-ssl.xbox.com/assets/f4/33/f4334b89-2ea2-4f28-a07d-1be0dc219123.jpg?n=Cyberpunk-2077_GLP-Page-Hero-0_1083x609_08.jpg',
             'price' => 74.50
         ]);
 
         DB::table('products')->insert([
             'name' => 'Animal Crossing:Pocket Camp',
             'description' => 'Get back to nature in Animal Crossing™: Pocket Camp, the new Animal Crossing mobile game where you take on the role of campsite manager! Youre in charge, so you can decorate your own campsite however you like! Make it fun, make it cute, make it sporty—it’s up to you to craft the kind of furniture and amenities that will make your camp a must-see for animals visiting the area. Building Your Dream Campsite',
             'photo' => 'https://assets.nintendo.eu/image/upload/f_auto,q_auto,t_product_tile_desktop/MNS/NOE/70010000027620/1.1_2000x2000_ProductTile_Switch_AnimalCrossingNewHorizons_KeyVisual_enGB_v1_100q',
             'price' => 58.00
         ]);
 
         DB::table('products')->insert([
             'name' => 'Assassins Creed Valhalla',
             'description' => 'Become Eivor, a Viking raider raised to be a fearless warrior, and lead your clan from icy desolation in Norway to a new home amid the lush farmlands of ninth-century England. Find your settlement and conquer this hostile land by any means to earn a place in Valhalla. England in the age of the Vikings is a fractured nation of petty lords and warring kingdoms. Beneath the chaos lies a rich and untamed land waiting for a new conqueror. Will it be you?',
             'photo' => 'https://static.posters.cz/image/1300/posteri/assassin-s-creed-valhalla-eivor-i101221.jpg',
             'price' => 70.99
         ]);
 
         DB::table('products')->insert([
             'name' => 'The Last of Us 2',
             'description' => 'he Last of Us Part II is a 2020 action-adventure game developed by Naughty Dog and published by Sony Interactive Entertainment for the PlayStation 4.',
             'photo' => 'https://static.posters.cz/image/1300/posteri/the-last-of-us-2-ellie-i76718.jpg',
             'price' => 68.00
         ]);
 
         DB::table('products')->insert([
             'name' => 'Frost Punk',
             'description' => 'Frostpunk is the first society survival game. As the ruler of the last city on Earth, it is your duty to manage both its citizens and infrastructure. What decisions will you make to ensure your societys survival?',
             'photo' => 'https://images.gog-statics.com/8aa48c57b66fb6083b99fdd1645e29e40f1fc477ebcd8ae2d7d2434f4426ea6b_product_card_v2_mobile_slider_639.jpg',
             'price' => 30.00
         ]);
    }
}
