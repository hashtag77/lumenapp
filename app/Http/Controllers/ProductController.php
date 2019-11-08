<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);

        /* For normal app */
        // return view('products.index',compact('products'));

        /* For api */
        return response()->json(['product' => $products], 201);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* For normal app */
        // return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* For normal app */
        // $product = Product::create($request->all());
   
        // return redirect('/products');

        /* For api */
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        try {
            $product = Product::create($request->all());

            return response()->json(['products' => $product, 'message' => 'Created!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 409);
        }
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        
        /* For normal app */
        // return view('products.show',compact('product'));

        /* For api */
        if ($product) {
            return response()->json(['product' => $product], 201);
        } else {
            return response()->json(['message' => 'Item not found!'], 409);
        }
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* For normal app */
        // $product = Product::find($id);

        // return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /* For normal app */
        // $product = Product::find($id);
        // $product->update($request->all());
  
        // return redirect('/products');

        /* For api */
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        try {
            $product = Product::find($id);
            $product->update($request->all());

            return response()->json(['product' => $product, 'message' => 'Updated!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong!'], 409);
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        /* For normal app */
        // $product->delete();
  
        // return redirect('/products');

        /* For api */
        if ($product) {
            $product->delete();
            
            return response()->json(['message' => 'Item deleted!'], 201);
        } else {
            return response()->json(['message' => 'Item not found!'], 409);
        }
    }
}