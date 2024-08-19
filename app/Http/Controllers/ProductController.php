<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ['id' => '1', 'name' => 'TV', 'description' => 'Best TV', 'price' => 1000],
        ['id' => '2', 'name' => 'iPhone', 'description' => 'Best iPhone', 'price' => 800],
        ['id' => '3', 'name' => 'Chromecast', 'description' => 'Best Chromecast', 'price' => 50],
        ['id' => '4', 'name' => 'Glasses', 'description' => 'Best Glasses', 'price' => 100]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] =  'List of products';
        $viewData['products'] = ProductController::$products;
        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        $idExist = false;
        foreach (ProductController::$products as $product) {
            if ($product['id'] == $id) {
                $idExist = true;
                break;
            } else {
                continue;
            }
        }
        if ($idExist) {
            $viewData = [];
            $product = ProductController::$products[$id - 1];
            $viewData['title'] = $product['name'] . ' - Online Store';
            $viewData['subtitle'] =  $product['name'] . ' - Product information';
            $viewData['product'] = $product;
            return view('product.show')->with('viewData', $viewData);
        } else {
            return redirect()->route('home.index');
        }
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';
        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): View
    {
        // if an error happens with the request, laravel will return an exception to the form view.
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer|gt:0'
        ]);

        $product = [
            'id' => count(ProductController::$products) + 1,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ];

        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'Product creation';
        $viewData['productName'] = $product['name'];
        array_push(ProductController::$products, $product);
        return view('product.successCreation')->with('viewData', $viewData);
    }
}
