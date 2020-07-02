<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::select('id', 'c_name', 'c_title_seo', 'c_active')->get();
        $viewData = [
            'categories' => $categories
        ];

        return view('admin::category.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(RequestCategory $requestCategory)
    {
        //function tao moi
        $this->insertOrUpdate($requestCategory);
        return redirect('admin/category');
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
        $category = Category::find($id);
        return view('admin::category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(RequestCategory $requestCategory, $id)
    {
        $this->insertOrUpdate($requestCategory, $id);
        return redirect('admin/category');
    }

    /**
     * @param $requestCategory
     * @param string $id
     */
    public function insertOrUpdate($requestCategory, $id = '')
    {
        $code = 1;
        try {
            $category = new Category();
            if ($id) {
                $category = Category::find($id);
            }

            $category->c_name = $requestCategory->c_name;
            $category->c_slug = str_slug($requestCategory->c_name);
            $category->c_icon = $requestCategory->c_icon;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->c_name;
            $category->c_active = ($requestCategory->c_active == "on") ? Category::STATUS_PUBLIC : Category::STATUS_PRIVATE;
            $category->save();
        } catch (\Exception $exception) {
            $code = 0;
            \Log::error("[Error insertOrUpdate Categories]" . $exception->getMessage());
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
            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    Category::destroy($id);
                    break;
                case 'active':
                    $category->c_active = $category->c_active ? Category::STATUS_PRIVATE : Category::STATUS_PUBLIC;
                    break;
            }

            $category->save();
            return redirect('admin/category');
        }
    }
}
