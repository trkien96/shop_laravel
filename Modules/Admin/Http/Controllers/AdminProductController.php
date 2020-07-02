<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');

        if ($request->name) $products->where('p_name', 'like', '%' . $request->name . '%');
        if ($request->cate) $products->where('p_category_id', $request->cate);

        $products = $products->orderByDesc('id')->paginate(10);

        $categories = $this->getCategories();

        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];
        return view('admin::product.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RequestProduct $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect('admin/product');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->getCategories();
        $product = Product::find($id);
        return view('admin::product.update', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect('admin/product');
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategories()
    {
        return Category::all();
    }

    /**
     * @param RequestProduct $requestProduct
     * @param string $id
     */
    public function insertOrUpdate(RequestProduct $requestProduct, $id = '')
    {
        $code = 1;
        try {
            $product = new Product();
            if ($id) {
                $product = Product::find($id);
            }

            $product->p_name = $requestProduct->p_name;
            $product->p_slug = str_slug($requestProduct->p_name);
            $product->p_category_id = $requestProduct->p_category_id;
            $product->p_price = $requestProduct->p_price;
            $product->p_sale = $requestProduct->p_sale;
            $product->p_description = $requestProduct->p_description;
            $product->p_content = $requestProduct->p_content;
            $product->p_title_seo = $requestProduct->p_title_seo ?? $requestProduct->p_name;
            $product->p_description_seo = $requestProduct->p_description_seo ?? $requestProduct->p_description;
            $product->p_hot = ($requestProduct->p_hot == "on") ? Product::STATUS_PUBLIC : Product::STATUS_PRIVATE;
            if ($requestProduct->hasFile('p_avatar')) {
                $file = upload_image('p_avatar');
                if (isset($file['name'])) {
                    $product->p_avatar = $file['name'];
                }
            }

            $product->save();
        } catch (\Exception $exception) {
            $code = 0;
            \Log::error("[Error insertOrUpdate Product]" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function action($action, $id)
    {
        if ($action) {
            $product = Product::find($id);
            switch ($action) {
                case 'delete':
                    Product::destroy($id);
                    break;

                case 'active':
                    $product->p_active = $product->p_active ? Product::STATUS_PRIVATE : Product::STATUS_PUBLIC;
                    break;

                case 'hot':
                    $product->p_hot = $product->p_hot ? Product::HOT_OFF : Product::HOT_ON;
                    break;
            }

            $product->save();
            return redirect('admin/product');
        }
    }
}
