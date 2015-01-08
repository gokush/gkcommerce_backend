<?php
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/7/15
 * Time: 3:27 PM
 */



class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->delete();
        DB::table('pictures')->delete();

        $product = Product::create(array(
            "name" => "Remee",
            "description" => "Remee 是一个可以增强清醒梦境的眼罩。所谓清醒梦，是指做梦者在睡眠状态中保持意识清醒的状态，知道自己身" .
                "处梦中。做梦者拥有清醒時候的思考能力和记忆能力，甚至可以直接控制梦的内容。Remee 可以帮助用户进入这样的清醒梦状态，" .
                "获得与现实生活完全不同的体验。进入清醒梦境的难题在于认识到梦境状态的可控性。Remee 的解决方法是在你做梦时发射一系列" .
                "红光，这些红光会出现你的梦境中，从而提醒你是处于做梦状态。一旦你接受并且理解了这些刺激信息，你便可以进入清醒梦境的状" .
                "态，做自己想做的任何事。",
            "regularPrice" => "718",
        ));

        $i = 1;
        for ($size = 6; $i < $size; $i ++) {
            Picture::create(array(
                'type' => 0,
                'url' => sprintf('images/product/%d/%d.jpeg', $product->id, $i),
                'foreign_id' => $product->id,
            ));
        }

        $this->command->info('Product table seeded!');
    }

}