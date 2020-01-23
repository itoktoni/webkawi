<?php

namespace Modules\Item\Http\Controllers;

use Helper;
use Plugin\Response;
use App\Http\Controllers\Controller;
use Modules\Item\Dao\Repositories\CategoryRepository;
use App\Http\Services\MasterService;

class CategoryController extends Controller
{
    public $template;
    public static $model;

    public function __construct()
    {
        if (self::$model == null) {
            self::$model = new CategoryRepository();
        }
        $this->template  = Helper::getTemplate(__class__);
    }

    public function index()
    {
        return redirect()->route($this->getModule() . '_data');
    }

    private function share($data = [])
    {
        $view = [
            'template' => $this->template,
        ];

        return array_merge($view, $data);
    }

    public function create(MasterService $service)
    {
        if (request()->isMethod('POST')) {

            $service->save(self::$model);
        }
        return view(Helper::setViewCreate())->with($this->share());
    }

    public function update(MasterService $service)
    {
        if (request()->isMethod('POST')) {

            $service->update(self::$model);
            return redirect()->route($this->getModule() . '_data');
        }

        if (request()->has('code')) {

            $data = $service->show(self::$model);

            return view(Helper::setViewUpdate())->with($this->share([
                'model'        => $data,
                'key'          => self::$model->getKeyName()
            ]));
        }
    }

    public function delete(MasterService $service)
    {
        $service->delete(self::$model);
        return Response::redirectBack();;
    }

    public function data(MasterService $service)
    {
        if (request()->isMethod('POST')) {
            $datatable = $service->setRaw(['item_category_image', 'item_category_status', 'item_category_homepage'])->datatable(self::$model);
            $datatable->editColumn('item_category_image', function ($select) {
                return Helper::createImage(Helper::getTemplate(__CLASS__) . '/thumbnail_' . $select->item_category_image);
            });
            $datatable->editColumn('item_category_homepage', function ($data) {
                return Helper::createStatus([
                    'value'  => $data->item_category_homepage,
                    'status' => [0 => ['No', 'warning'], 1 => ['Home', 'success']],
                ]);
            });
            $datatable->editColumn('item_category_status', function ($data) {
                return Helper::createStatus([
                    'value'  => $data->item_category_status,
                    'status' => self::$model->status,
                ]);
            });
            return $datatable->make(true);
        }

        return view(Helper::setViewData())->with([
            'fields'   => Helper::listData(self::$model->datatable),
            'template' => $this->template,
        ]);
    }

    public function show(MasterService $service)
    {
        if (request()->has('code')) {
            $data = $service->show(self::$model);
            return view(Helper::setViewShow())->with($this->share([
                'fields' => Helper::listData(self::$model->datatable),
                'model'   => $data,
                'key'   => self::$model->getKeyName()
            ]));
        }
    }
}
