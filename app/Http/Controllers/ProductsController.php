<?php

namespace App\Http\Controllers;
use App\Mail\OrderShipped;
use Illuminate\Contracts\Mail\Mailer as MailerInterface;
use App\Entity\Uploader;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private  $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index(Request $request)
    {
        $query = Uploader::orderBy('is_active', 'desc');
        if (!empty($value = $request->get('seller'))) {
            $query->where('seller', 'like', '%' . $value . '%');

        }

        if (!empty($value = $request->get('type'))) {
            /*Прописать сортировку по наличии строки в запросе*/
            $query->where('type', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('code'))) {
            $query->where('code', 'like', '%' . $value . '%');
        }


        $products = $query->paginate(130);


        return view('public.product.index', compact('products'));

    }
    public function show($slug)
    {
        $product = Uploader::where('slug', $slug)->first();
        return view('public.product.show', compact('product'));
    }
    public function send(Request $request, $id)
    {

        $data = $this->validate($request, [
            'name' => 'required | string | max:255',
            'phone' => 'required | string | max:255 ',
            'message' => 'nullable | string | max:255 ',
        ]);
        $product = Uploader::find($id);


        $this->mailer->to('Rpmpartservice@gmail.com', 'Заявка с сайта')->send(new OrderShipped($data, $product));
        // $this->mailer->to('rpmsvs@yahoo.com', 'Заявка с сайта')->send(new OrderShipped($data, $product));

        return redirect()->back()->with('success', 'ваше письмо отправленно, ближайщее время мы вам перезвоним');

    }
}
