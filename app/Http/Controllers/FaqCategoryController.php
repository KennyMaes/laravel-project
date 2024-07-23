<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class FaqCategoryController extends Controller
{
    public function create(Request $request) {

        $incomingFields = $request->validate([
            'name' => 'required'
        ]);

        if (FaqCategory::where('name', $request->name)->exists()) {
            throw ValidationException::withMessages([
                'name' => ['Category with this name already exists.'],
            ]);
        }

        FaqCategory::create($incomingFields);

        return redirect('/faq/new');
    }

    public function update($id)
    {
        $category = FaqCategory::find($id);

        $validatedData = request()->validate([
            'name' => 'required'
        ]);

        $category->fill($validatedData);
        $category->save();

        return redirect('/faq');
    }

    public function delete($id) {
        FaqCategory::destroy($id);
        return redirect('/faq');
    }

    public function getEditForm($id) {
        $category = FaqCategory::find($id);
        return view('FAQ.faq-category-form', ['category' => $category]);

    }

    public function getCreateForm() {
        return view('FAQ.faq-category-form');
    }
}
