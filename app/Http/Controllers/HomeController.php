<?php

namespace App\Http\Controllers;

use App\Entity\Category\Category;
use App\Entity\MainCategory;
use App\Entity\Uploader;
use App\Http\Requests\Home\VinRequest;
use App\Mail\SendShipped;
use App\Mail\VinShipped;
use App\Entity\Product\Product;
use App\Entity\Seller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer as MailerInterface;

class HomeController extends Controller
{

    private  $mailer;
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellers = Seller::get()->random(12);

        $mains = MainCategory::where('parent_id', null)->orderBy('id', 'asc')->get();
        $cats = Category::orderBy('name', 'asc')->get()->random(12);
        $products = Uploader::get()->random(30);

        return view('public.index', compact('sellers', 'mains', 'cats', 'products'));
    }
    public function contacts()
    {

        return view('public.contacts');
    }

    public function seller()
    {
        $sellers = Seller::all();
        return view('public.seller', compact('sellers'));
    }

     protected function  send(Request $request) {

        $data = $this->validate($request, [
            'name' => 'required | string | max:255',
            'phone' => 'string | max:255 ',
            'email' => 'required | email',
            'message' => 'nullable | string | max:1000 ',
        ]);

        $this->mailer->to('Rpmpartservice@gmail.com', 'Заявка с сайта')->send(new SendShipped($data));

        return redirect()->back()->with('success', 'ваше письмо отправленно, ближайщее время мы вам перезвоним');
    }

    protected function  vinSearch(VinRequest $request) {

            $data =  [
                'brand' => $request['brand'] ? $request['brand'] : '',
                'model' => $request['model']? $request['model'] : '',
                'month' => $request['month']? $request['month'] : '',
                'capacity' => $request['capacity']? $request['capacity'] : '',
                'motor' => $request['motor']? $request['motor'] : '',
                'kpp' => $request['kpp']? $request['kpp'] : '',
                'kuzov' => $request['kuzov']? $request['kuzov'] : '',
                'abs' => $request['abs']? 'да' : 'нет',
                'гидроусилитель' => $request['гидроусилитель']? 'да' : 'нет',
                'электроусилитель' => $request['электроусилитель']? 'да' : 'нет',
                'кондиционер' => $request['кондиционер']? 'да' : 'нет',
                'vincode' => $request['vincode']? $request['vincode'] : '',
                'engine' => $request['engine']? $request['engine'] : '',
                'mess' => $request['mess']? $request['mess'] : '',
                'name' => $request['name']? $request['name'] : '',
                'phone' => $request['phone']? $request['phone'] : '',
                'email' => $request['email']? $request['email'] : '',
                'city' => $request['city']? $request['city'] : ''
            ];


        $this->mailer->to('Rpmpartservice@gmail.com', 'Запрос по VIN')->send(new VinShipped($data));

        return redirect()->back()->with('success', 'ваше письмо отправленно, ближайщее время мы вам перезвоним');
    }

}
