<?php

namespace App\Http\Controllers;

use App\Models\FaqQuestion;
use Illuminate\Http\Request;
use App\Models\FaqCategory;


class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('FAQ.faq', compact('categories'));
    }

    public function createQuestion(Request $request) 
    {
        $incomingFields = $request->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        FaqQuestion::create($incomingFields);
        return redirect('/faq');
    }

    public function delete($id) 
    {
        FaqQuestion::destroy($id);
        return redirect('/faq');
    }
}
