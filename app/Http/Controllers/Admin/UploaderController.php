<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Product\Product;
use App\Entity\Uploader;
use App\Jobs\UploadsPriceUpdate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\UseCases\ExcelToBd\ExcelBd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UploaderController extends Controller
{

    private $uploader;
    private $excelDb;
    use DispatchesJobs;

   public function __construct( Uploader $uploader, ExcelBd $excelDb)
   {
       $this->middleware('can:admin-panel');
       $this->uploader = $uploader;
       $this->excelDb = $excelDb;

   }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function storePrice(Request $request)
    {
        set_time_limit(180);
        // phpinfo(INFO_MODULES);

        $arr = $this->excelDb->getData($request['exc']);
        Uploader::where('is_active', 'yes')->update(array('is_active' => 'no'));
//         $prods = Uploader::orderBy('seller','asc')->get(['id', 'seller','type','code','price','note'])->toArray();

//         $activeItem = [];
//         $updatePrice = [];
//         $store = [];

//         foreach ($arr as $key=>$item){
            

//             foreach($prods as $keyP=>$prod) {
// //                dd($keyP, count($prods));
//                 if((string) $item['code'] === (string) $prod['code'] && (string) $item['note'] ===(string) $prod['note'] && (string) $item['seller'] === (string) $prod['seller'] ) {
//                     if((int) $item['price'] === (int) $prod['price']) {
//                         $activeItem[] = $prod['id'];
//                         break(1);
//                     }elseif((int) $item['price'] !== (int) $prod['price']){
//                         dd($updatePrice, (int) $prod['price'], (int) $item['price']);
//                         $updatePrice[$prod['id']] = $item['price'];
                        
//                         break(1);
//                     }else{
//                         throw new \Exception('Что то пошло не так. В цикле $item попал в else.');
//                     }
//                 }

// //                dd(($keyP - 1), count($prods));
//                 if( 1+ $keyP == count($prods)) {
//                     $store[] = $item;
//                     dd($item, $prods);
//                 }
                
//             }

//         }
//         // dd(count($activeItem));
// unset($prods);

//         if(count($activeItem) > 0) {
//             Uploader::whereIn('id', $activeItem)->update(array('is_active' => 'yes'));
//         }
// unset($activeItem);
//         if(count($updatePrice) > 0) {
//             foreach($updatePrice as $key=>$val) {
//                 Uploader::where('id', $key)->update(array('price' => $val, 'is_active' => 'yes' ));
//             }

//         }
// unset($updatePrice);
//         if(count($store) > 0) {
//             foreach($store as $new) {
//                 Uploader::store($new);
//             }
//         }


$this->dispatch(new UploadsPriceUpdate($arr));
//        $job = new UploadsPriceUpdate($arr);
//        $job->handle();
        return redirect()->route('admin.excel.index')->with('success', 'All right' . date('H:i:s'));;
    }


    public function index(Request $request)
    {

        $query = Uploader::orderBy('id', 'asc');


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

        if (!empty($value = $request->get('note'))) {
            $query->where('note', $value);
        }
        if (!empty($value = $request->get('is_active'))) {
            $query->where('is_active', $value);
        }

        $ups = $query->paginate(150);
        return view('admin.uploader.index', compact('ups'));
    }


    public function create()
    {

    }

    public function search(Request $request)
    {

        $query = Uploader::orderBy('id', 'asc');
        if (!empty($value = $request->get('seller'))) {
            $query->where('seller', $value);

        }

        if (!empty($value = $request->get('type'))) {
            /*Прописать сортировку по наличии строки в запросе*/
            $query->where('type', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('code'))) {
            $query->where('code', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('note'))) {
            $query->where('note', $value);
        }
//        if (!empty($value = $request->get('active'))) {
//            $query['active'] = $value;
//        }

        $products = $query->paginate(50);

        return view('admin.products.search', compact('products'));

    }

    public function activate(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $up = $this->uploader->find($id);
            $up->toggleStatus();
        }
       return redirect()->back();

    }

    public function update(Request $request, Product $product)
    {

        $data = $this->validate($request, [
            'code' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'note' => 'string|max:255',
            'active' => 'required|in:yes,no',
        ]);

        $product->edit($data);
        return redirect()->route('admin.products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }





}
