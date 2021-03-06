<?php

namespace App\Http\Controllers;

use Session;
use App\Cart;
use App\Order;
use App\Product;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth')->only(['checkout', 'payCheckout']);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('shopping.index', [
            'products' => $products
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->add($product);

        $request->session()->put('cart', $cart);

        // dd(Session::get('cart'));
        return redirect('/');
    }

    public function reduce($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($id);

        if($cart->totalQty <= 0)
        {
            Session::forget('cart');
        }
        else
        {
            Session::put('cart', $cart);
        }
        
        return redirect()->back();
    }

    public function remove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        if($cart->totalQty <=0)
        {
            Session::forget('cart');
        }
        else
        {
            Session::put('cart', $cart);
        }

        return redirect()->back();
    }

    public function show()
    {
        if(!Session::has('cart'))
        {
            return view('cart.show', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $newCart = new Cart($oldCart);
        return view('cart.show', ['products' => $newCart->items, 'totalPrice' => $newCart->totalPrice]);
    }

    public function checkout()
    {
        if(!Session::has('cart'))
        {
            return view('cart.show');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        return view('cart.checkout', ['totalPrice' => $totalPrice]);
    }

    public function payCheckout(Request $request)
    {
        // return $request->all();
        // return $request->all();
        if(!Session::has('cart'))
        {
            return redirect('checkout');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source'  => $request->stripeToken
        ));

        try{
            $charge = Charge::create([
                'customer' => $customer->id,
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                // "source" => $request->input('stripeToken')
            ]);
            // ],["stripe_account" => "acct_1HCjO8AWmj4NL1Ij"]);
            $order = new Order;
            $order->name = $request->stripeBillingName;
            $order->address = $request->stripeBillingAddressLine1;
            $order->payment_id = $charge->id;
            $order->cart = serialize($cart);
            Auth::user()->orders()->save($order);
        } catch (\Exception $e){
            return redirect('cart/show')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect('/')->with('success', 'Successfully purchased products!');
    }
}
