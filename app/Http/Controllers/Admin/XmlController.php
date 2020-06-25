<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Uploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\ArrayToXml\ArrayToXml;
use Illuminate\Http\File;

class XmlController extends Controller
{

    private $uploader;

    public function __construct(Uploader $uploader)
    {

        $this->uploader = $uploader;
    }

    public function show()
    {
//       dd($this->uploader->getFillable()->exept('id'));

       $sellers =  Uploader::get('seller')->unique('seller');
       $notes =  Uploader::get('note')->unique('note');
       return view('admin.xml.index', compact('sellers', 'notes'));
    }

    public function setSettings(Request $request)
    {
      $where = [
        'seller' => $request['seller'],
        'note' => $request['note'],
      ];
        $data = Uploader::where($where)->get()->toArray();
        dd($data);
        //пройтись циклом и сформировать нужный массив.
        $xml = ArrayToXml::convert($data, 'products');

        $file = \Storage::disk('local')->put('xml/products.xml', $xml);
        dd($file);

    }
}
