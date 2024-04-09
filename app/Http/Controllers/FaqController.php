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

    public function updateQuestion($id) 
    {
        $question = FaqQuestion::find($id);

        $validatedData = request()->validate([
            'faq_category_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ]);

        error_log($question);

        $question->fill($validatedData);
        $question->save();
        return redirect('/faq');
    }

    public function delete($id) 
    {
        FaqQuestion::destroy($id);
        return redirect('/faq');
    }

    public function createQuestionView()
    {
        $categories = FaqCategory::all();
        return view('FAQ.faq-form', ['categories' => $categories]);
    }

    public function editView($id)
    {
        $categories = FaqCategory::all();
        $question = FaqQuestion::find($id);
        return view('FAQ.faq-form', ['categories' => $categories, 'question' => $question]);
    }
}
