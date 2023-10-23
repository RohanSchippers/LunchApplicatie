<?php

namespace App\Http\Models;
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\SandwichModel;

class SandwichController extends Controller {
    
    public function index() {
        $broodjes = SandwichModel::all();
        
        return view('sandwich', ['broodjes' => $broodjes]);
    }

    public function search(Request $request)
{
    $keyword = $request->input('q');
    
    // Voer de zoekopdracht uit op de producten die aan de zoekterm voldoen
    $broodjes = SandwichModel::where('productnaam', 'LIKE', "%$keyword%")->get();

    return view('sandwich', ['broodjes' => $broodjes, 'searchKeyword' => $keyword]);
}

public function showByCategory($category)
{
    $broodjes = SandwichModel::join('categories', 'products.categorie_categorieid', '=', 'categories.id')
        ->where('categories.categorienaam', $category)
        ->get();

    return view('sandwich', ['broodjes' => $broodjes, 'category' => $category]);
}



}
