<?php

use Illuminate\Database\Seeder;

class SupermarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(App\Department::class, 10)->create();
      factory(App\Supermarket::class, 10)->create();
      //factory(App\Customer::class, 30)->create();
      //factory(App\Staff::class, 30)->create();
      factory(App\Admin::class, 1)->create();
      //factory(App\Product::class, 10)->create();
      factory(App\Category::class, 8)->create();
      //factory(App\ProductCategories::class, 8)->create();
      //factory(App\Inventory::class, 10)->create();
      //factory(App\Variation::class, 10)->create();
      //factory(App\Order::class, 50)->create();
      //factory(App\Payment::class, 50)->create();
      //factory(App\OrderProducts::class, 100)->create();
      factory(App\Feedback::class, 10)->create();
      factory(App\UserSupermarkets::class, 10)->create();
    }
}
