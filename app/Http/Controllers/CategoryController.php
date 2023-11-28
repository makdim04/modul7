<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $data = Category::all();
        return view('admin.category.index', compact('data'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'tittle_category' => 'required|unique:categories'
        ]);
        Category::create([
            'tittle_category' => $request->title_category,
            'slug_category' =>str_replace(' ', '-', $request->title_category)
        ]);
        return redirect()->route('admin.category.index')->with('success', 'New Product Hass Been Added');
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'New Product Hass been Delete');
    }
}
