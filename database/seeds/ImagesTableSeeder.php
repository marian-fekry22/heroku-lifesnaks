<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->truncate();

        DB::table('images')->insert([
            [
                'id' => 1,
                'url' => 'website/images/products/AC_almond.cranberry_200g.png',
            ],[
                'id' => 2,
                'url' => 'website/images/products/AC_almond.cranberry_200g_Back.png',
            ],[
                'id' => 3,
                'url' => 'website/images/products/AC_almond.cranberry_40g.png',
            ],[
                'id' => 4,
                'url' => 'website/images/products/AC_almond.cranberry_40g_back.png',
            ],[
                'id' => 5,
                'url' => 'website/images/products/AC_coconut_200g.png',
            ],[
                'id' => 6,
                'url' => 'website/images/products/AC_coconut_200g_Back.png',
            ],[
                'id' => 7,
                'url' => 'website/images/products/AC_coconut_40g.png',
            ],[
                'id' => 8,
                'url' => 'website/images/products/AC_coconut_40g_back.png',
            ],[
                'id' => 9,
                'url' => 'website/images/products/CA_pumpkinseeds_200g.png',
            ],[
                'id' => 10,
                'url' => 'website/images/products/CA_pumpkinseeds_200g_Back.png',
            ],[
                'id' => 11,
                'url' => 'website/images/products/CA_pumpkinseeds_40g.png',
            ],[
                'id' => 12,
                'url' => 'website/images/products/CA_pumpkinseeds_40g_back.png',
            ],[
                'id' => 13,
                'url' => 'website/images/products/coconut.png',
            ],[
                'id' => 14,
                'url' => 'website/images/products/Coconutback.png',
            ],[
                'id' => 15,
                'url' => 'website/images/products/cranberry.png',
            ],[
                'id' => 16,
                'url' => 'website/images/products/cranberryback.png',
            ],[
                'id' => 17,
                'url' => 'website/images/products/pumpkinseed.png',
            ],[
                'id' => 18,
                'url' => 'website/images/products/pumpkinseedback.png',
            ],[
                'id' => 19,
                'url' => 'website/images/products/DC_almond_150g.png',
            ],[
                'id' => 20,
                'url' => 'website/images/products/DC_almond_150g_Back.png',
            ],[
                'id' => 21,
                'url' => 'website/images/products/DC_almond_35g.png',
            ],[
                'id' => 22,
                'url' => 'website/images/products/DC_almond_35g_back.png',
            ],[
                'id' => 23,
                'url' => 'website/images/products/DC_almond.cranberry_150g.png',
            ],[
                'id' => 24,
                'url' => 'website/images/products/DC_almond.cranberry_150g_Back.png',
            ],[
                'id' => 25,
                'url' => 'website/images/products/DC_almond.cranberry_35g.png',
            ],[
                'id' => 26,
                'url' => 'website/images/products/DC_almond.cranberry_35g_back.png',
            ],[
                'id' => 27,
                'url' => 'website/images/products/DC_peppermint_150g.png',
            ],[
                'id' => 28,
                'url' => 'website/images/products/DC_peppermint_150g_Back.png',
            ],[
                'id' => 29,
                'url' => 'website/images/products/DC_peppermint_35g.png',
            ],[
                'id' => 30,
                'url' => 'website/images/products/DC_peppermint_35g_Back.png',
            ],
        ]);
    }
}
