<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = new FaqCategory();
        $category1->name = 'Media';

        $category2 = new FaqCategory();
        $category2->name = 'Printers';
        
        $category1->save();
        $category2->save();
    }
}
