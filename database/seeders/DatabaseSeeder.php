<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\SellerProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Seller 1',
            'email' => 'seller1@gmail.com',
            'password' => Hash::make('12345678'),
            'contact_no' => '0123456789',
            'location'=> '14469 Oak St, Magnolia Springs, AL 36555'
        ]);
        User::create([
            'name' => 'Seller 2',
            'email' => 'seller2@gmail.com',
            'password' => Hash::make('12345678'),
            'contact_no' => '0123459789',
            'location'=> '12074 Twin Oaks Dr, Magnolia Springs, AL 36555'
        ]);

        Product::create([
            'name' => 'clothes',
            'image' => env('APP_URL').'/'.'ProductImages/Clothes.jpg',
            'description' => 'This is the description of clothes',
           
        ]);
        Product::create([
            'name' => 'Shoes',
            'image' => env('APP_URL').'/'.'ProductImages/Shoes.jpeg',
            'description' => 'This is the description of shoes',
           
        ]);
        Product::create([
            'name' => 'Bags',
            'image' => env('APP_URL').'/'.'ProductImages/Bags.jpg',
            'description' => 'This is the description of bags',
           
        ]);

        SellerProduct::create([
           'user_id'=>1,
           'product_id'=>1,
           'price'=>100.00,
           'stock'=>100,
           'note'=>"this is note",

        ]);
        SellerProduct::create([
            'user_id'=>1,
            'product_id'=>2,
            'price'=>200.00,
            'stock'=>200,
            'note'=>"this is note",
 
         ]);
         SellerProduct::create([
            'user_id'=>1,
            'product_id'=>3,
            'price'=>1000.00,
            'stock'=>100,
            'note'=>"this is note",
 
         ]);
         SellerProduct::create([
            'user_id'=>2,
            'product_id'=>1,
            'price'=>150.00,
            'stock'=>200,
            'note'=>"this is note",
 
         ]);
       
    }
}
