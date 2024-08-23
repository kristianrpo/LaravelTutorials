<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $product = Product::findOrFail($id);
            $viewData['title'] = $product['name'].' - Online Store';
            $viewData['subtitle'] = $product['name'].' - Product information';
            $viewData['product'] = $product;

            return view('product.show')->with('viewData', $viewData);
        } catch (\Exception $e) {
            return redirect()->route('home.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View|RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer|gt:0',
        ]);

        $product = Product::create($request->only(['name', 'price']));

        if ($product) {
            $viewData = [];
            $viewData['title'] = 'Products - Online Store';
            $viewData['subtitle'] = 'Product created';
            $viewData['productName'] = $product->name;

            return view('product.save')->with('viewData', $viewData);
        } else {
            return back();
        }
    }
}
