<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.products', compact('products'));
    }
    public function cart()
    {
        return view('shop.cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // dacă cart este gol se pune primul product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product adaugat cu succes in cos!');
        }
 // daca cart nu este gol at verificam daca produsul exista pt a incrementa cantitate
 if(isset($cart[$id])) {
     $cart[$id]['quantity']++;
     session()->put('cart', $cart);
     return redirect()->back()->with('success', 'Product adaugat cu succes in cos!(x2)');
 }
 // daca item nu exista in cos at addaugam la cos cu quantity = 1
 $cart[$id] = [
     "name" => $product->name,
     "quantity" => 1,
     "price" => $product->price,
     "photo" => $product->photo
 ];
 session()->put('cart', $cart);
 return redirect()->back()->with('success', 'Product adaugat cu succes in cos!');
 }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cos modificat cu succes');
        }
    }
    public function remove(Request $request)
 {
 if($request->id) {
 $cart = session()->get('cart');
 if(isset($cart[$request->id])) {
 unset($cart[$request->id]);
 session()->put('cart', $cart);
 }
 session()->flash('success', 'Product sters cu succes!');
 }
 }}
