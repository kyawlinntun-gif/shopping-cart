<?php

use App\Product;
use Faker\Provider\Lorem;
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
        Product::create(['name' => 'Drink responsibly', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'drink_responsibly.jpg', 'price' => 12]);

        Product::create(['name' => 'Happy', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'Happy.jpg', 'price' => 22]);

        Product::create(['name' => 'Harry potter', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'harry_potter.jpg', 'price' => 12]);

        Product::create(['name' => 'Hidden treasure', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'hidden_treasure.png', 'price' => 40]);

        Product::create(['name' => 'Lady, that\'s my skull.jpg', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'lady_that\'s_my_skull.jpg', 'price' => 12]);

        Product::create(['name' => 'The particular sadness of lemon cake', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'the_particular_sadness_of_lemon_cake.jpg', 'price' => 35]);

        Product::create(['name' => 'What employers want', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'imgPath' => 'what_employers_want.png', 'price' => 12]);
    }
}
