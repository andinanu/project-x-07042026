<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request) {
        $query = Products::query();
        
        // Filter by search (product name)
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', '=', $request->input('category'));
        }
        
        $products = $query->paginate(10);
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    /**
     * Store a new product.
     * @bodyParam name string required The name of the product. Example: MacBook Pro
     * @bodyParam category string required The category of the product. Example: elektronik, alat tulis kantor, makanan dan minuman
     * @bodyParam price integer required The price of the product. Example: 1500
     * @bodyParam stock integer required Current stock quantity. Example: 50
     */
    public function store(ProductRequest $request) {
        $data = $request->safe()->toArray();

        try {
            $product  = $this->transaction(function () use ($data): Model {
                $product = new Products();
                $product = $this->fillModel($product, $data);
                $product->save();
    
                return $product;
            });
        } catch (Exception $e) {
            return back()->withErrors('Data gagal di simpan.');
        }

        return redirect()->route('product.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(Products $product) {
        return view('products.show', ['product' => $product]);
    }

    /**
     * Update an existing product.
     * @bodyParam id bigInteger required
     * @bodyParam name string required The name of the product. Example: MacBook Pro
     * @bodyParam category string required The category of the product. Example: elektronik, alat tulis kantor, makanan dan minuman
     * @bodyParam price integer required The price of the product. Example: 1500
     * @bodyParam stock integer required Current stock quantity. Example: 50
     */
    public function update(Products $product, ProductRequest $request) {
        $data = $request->safe()->toArray();

        try {
            $product = $this->transaction(function () use ($product, $data): Model {
                $product = $this->fillModel($product, $data);
    
                $product->save();
    
                return $product;
            });
        } catch (Exception $e) {
            return back()->withErrors('Data gagal di simpan.');
        }
   
        return redirect()->route('product.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Delete an product.
     * @bodyParam id bigInteger required
     */
    public function destroy(Products $product) {
        try {
            $product->delete();
        } catch (Exception $e) {
            return back()->withErrors('Data gagal di hapus.');
        }

        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus!');
    }

    protected function fillModel(Model $model, array $data)
    {
        foreach ($data as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }

    protected function transaction(callable $callback): mixed
    {
        DB::beginTransaction();

        try {
            $result = $callback();
            DB::commit();

            return $result;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
