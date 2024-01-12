<?php


namespace App\Http\Controllers;



use App\Mail\ReceiptMail;
use App\Models\Product;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Climate\Order;
use Stripe\Checkout\Session;
use Cart;
use Stripe\Exception\ApiErrorException;
use Stripe\Invoice;
use Stripe\PaymentIntent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class PaymentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }

    /**
     * @throws ApiErrorException
     */
    public function checkout(): \Illuminate\Http\RedirectResponse
    {
        $stripeSecretKey = config('stripe.stripe.secret');
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        $cartItems = \Cart::getContent();


        foreach ($cartItems as $item) {
            $product = Product::find($item->id);

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $product->price * 100,
                    'product_data' => [
                        'name' => $product->name,
                        'description' => $product->description,
                        'metadata' => [
                            'id' => $product->id,
                        ],
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $stripeSecretKey = config('stripe.stripe.secret');
        \Stripe\Stripe::setApiKey($stripeSecretKey);


        $session_id = $request->input('session_id');
        $stripe_session = \Stripe\Checkout\Session::retrieve($session_id);
        $invoice_id = $stripe_session->payment_intent;


        $cartItems = \Cart::getContent();

        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            $purchaseHistory = new PurchaseHistory();
            $purchaseHistory->user_id = auth()->user()->id;
            $purchaseHistory->product_id = $product->id;
            $purchaseHistory->invoice = $invoice_id;

            $purchaseHistory->save();




        $user = auth()->user()->name;


        $details = [
            'title' => 'Your Guest Travel',
            'invoiceNumber' => $invoice_id,
            'user' => $user,
            'dateCompra' => now()->format('d/m/Y às h:m'),
            'productName' => $product->name,
            'productPrice' => $product->price,
        ];

        \Cart::clear();

        $emailUser = auth()->user()->email;

        Mail::to($emailUser)->send(new ReceiptMail($details));
    }


            return view('partials.minhaConta.configConta');

    }





    public function cancel(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }


}
