<?php

namespace App\Http\Controllers\Admin;
use App\Entity\Product\Product;
use App\Entity\Uploader;
use App\UseCases\ExcelToBd\ExcelBd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UseCases\DbCases\Products\ProductActions;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;


class ProductsController extends Controller
{
    private $product;
    private $excelDb;
    private $actions;
    private $uploader;

    public function __construct(Product $product, Uploader $uploader,  ExcelBd $excelDb, ProductActions $actions)
    {
        $this->middleware('can:admin-panel');
        $this->product = $product;
        $this->excelDb = $excelDb;
        $this->actions = $actions;
        $this->uploader = $uploader;
    }

    public function updateOrCreateProductsTable()
    {
        $unique = Uploader::pluck('code')->unique();
        $products = Product::pluck('code');

        $diff = $unique->diff($products);

        if(false === $diff->isEmpty()) {
            foreach($diff as $key => $item) {

                $this->product->store(['code' => $item]);

            }
        }


        return redirect()->route('admin.products.index');
    }
    public function index(Request $request)
    {

        $query = Product::orderBy('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }
        if (!empty($value = $request->get('code'))) {
            $query->where('code', 'like', '%' . $value . '%');
        }

        $products = $query->paginate(150);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {

    }

    public function search(Request $request)
    {


    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $code = Product::where('id', $id)->first();
        $uploaders = $this->uploader->where('code', $code->code)->get();

        return view('admin.products.show', compact('uploaders'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {

    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }


}
