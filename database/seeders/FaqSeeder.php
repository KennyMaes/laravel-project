<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
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

        // Media Questions
        $question1 = new FaqQuestion();
        $question1->faq_category_id = $category1->id;
        $question1->question = 'How to install your media';
        $question1->answer = 'Lorem ipsum dolor sit amet consectetur adipiscing elit, placerat malesuada nisl eget non ante, cursus duis mattis donec pulvinar hendrerit. Erat conubia quam arcu gravida ridiculus neque vivamus himenaeos porta lectus diam habitant, pharetra montes sollicitudin class metus est egestas porttitor curabitur in. Auctor integer aenean magnis fames arcu convallis ad proin, molestie penatibus ligula duis iaculis venenatis himenaeos, turpis rutrum erat imperdiet odio rhoncus pulvinar. Cras urna taciti neque pellentesque hendrerit volutpat facilisis fermentum nulla primis hac felis dapibus nascetur, ornare nec mus lectus et laoreet donec';

        $question2 = new FaqQuestion();
        $question2->faq_category_id = $category1->id;
        $question2->question = 'Second madia question';
        $question2->answer = 'Lorem ipsum dolor sit amet consectetur adipiscing elit, placerat malesuada nisl eget non ante, cursus duis mattis donec pulvinar hendrerit. Erat conubia quam arcu gravida ridiculus neque vivamus himenaeos porta lectus diam habitant, pharetra montes sollicitudin class metus est egestas porttitor curabitur in. Auctor integer aenean magnis fames arcu convallis ad proin, molestie penatibus ligula duis iaculis venenatis himenaeos, turpis rutrum erat imperdiet odio rhoncus pulvinar. Cras urna taciti neque pellentesque hendrerit volutpat facilisis fermentum nulla primis hac felis dapibus nascetur, ornare nec mus lectus et laoreet donec';

        // Printer Questions
        $question3 = new FaqQuestion();
        $question3->faq_category_id = $category2->id;
        $question3->question = 'This is a printer question';
        $question3->answer = 'Lorem ipsum dolor sit amet consectetur adipiscing elit, placerat malesuada nisl eget non ante, cursus duis mattis donec pulvinar hendrerit. Erat conubia quam arcu gravida ridiculus neque vivamus himenaeos porta lectus diam habitant, pharetra montes sollicitudin class metus est egestas porttitor curabitur in. Auctor integer aenean magnis fames arcu convallis ad proin, molestie penatibus ligula duis iaculis venenatis himenaeos, turpis rutrum erat imperdiet odio rhoncus pulvinar. Cras urna taciti neque pellentesque hendrerit volutpat facilisis fermentum nulla primis hac felis dapibus nascetur, ornare nec mus lectus et laoreet donec';


        $question1->save();
        $question2->save();
        $question3->save();
    }
}
