<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Typology;
use App\Models\Product;
use App\Models\Category;


class MainController extends Controller
{
    public function home()
    {

        $categories = Category::all();
        $typologies = Typology::all();
        $products = Product::all();

        return view('welcome', compact('categories', 'typologies', 'products'));
    }
    public function showProduct($id)
    {
        $product = Product::find($id);

        return view('product', compact('product'));
    }
}
