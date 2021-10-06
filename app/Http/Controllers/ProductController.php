<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;
use Closure;

class ProductController extends Controller
{
    /*prikaz svih proizvoda */
    public function index ($request){
        $user = Auth::user();
        
        $admin = 'Administrator';
        $korisnik = 'Korisnik';
        if (!Auth::user()){
            abort (403, "You don't have enough rights to access this site. Please log in or sign up.");
        }
      else if ($user->hasRole($admin) || $user->hasRole($korisnik)){
            return redirect('/shop');
        }
        
        
    }

    

    public function shop(){

        $products = Product::all();
        return view('products', compact('products'));

    }

    /*prikaz košarice */

    public function cart()
    {
        return view('cart');
    }



    /*metoda za dodavanje u košaricu */

        public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        /*provjeravamo ako je košarica prazna i ako je dodajemo prvi element*/
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

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        /*ako pak košarica nije prazna i ako već takav proizvod postoji u košarici dodajemo +1 i zbrajamo */
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        /*ako košarica nije prazna i ne postoji takav proizvod ga dodajemo */
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /*brisanje iz kosarice */

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
