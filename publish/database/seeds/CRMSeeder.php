<?php

use App\Company;
use App\Order;
use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CRMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        factory(Product::class, 10)->create();
        factory(Company::class, 10)->create()->each(function ($company) use ($faker) {
            $productColl = Product::orderByRaw("RAND()")->take($faker->numberBetween(1,10))->get();
            $orderColl = factory(Order::class, $faker->numberBetween(1,10))->make();

            foreach ($orderColl as $order){
                $order->company()->associate($company);
                $order->save();
            }

            foreach ($orderColl as $order){
                foreach ($productColl as $product){
                    $salesPrice = $product->price * $faker->numberBetween(80,100) / 100;
                    $discount = $faker->numberBetween(0,25)/100;
                    $quantity = $faker->numberBetween(1,20);
                    $orderProduct = new \App\OrderProduct();
                    $orderProduct->fill([
                        'list_price' => $product->price,
                        'sales_price' => $salesPrice,
                        'quantity' => $quantity,
                        'discount_percentual' => 1-$discount*$salesPrice,
                        'discount_amount' => $discount,
                        'total' => $quantity*($salesPrice - $discount)
                    ]);
                    $orderProduct->order()->associate($order);
                    $orderProduct->product()->associate($product);
                    $orderProduct->save();
                }
            }
        });

    }
}
