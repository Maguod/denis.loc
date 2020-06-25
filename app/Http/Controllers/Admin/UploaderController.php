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


        $this->dispatch(new UploadsPriceUpdate($arr));

        return redirect()->route('admin.excel.index')->with('success', 'All right' . date('H:i:s'));
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

    public function update(Request $request, Uploader $uploader)
    {

        $data = $this->validate($request, [
            'code' => 'required|string|max:255',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'margin_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'description' => 'nullable|string',
            'note' => 'nullable|string',
            'meta_search' => 'nullable|string',
            'image_link' => 'nullable|string|max:255',
        ]);
        $uploader->edit($data);
        return redirect()->route('admin.uploader.index');
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

    public function edit( Uploader $uploader)
    {
//        $uploader = Uploader::find($id);

        return view('admin.uploader.edit', compact('uploader'));
    }





}
