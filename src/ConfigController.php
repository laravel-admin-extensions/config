<?php

namespace Encore\Admin\Config;

use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class ConfigController
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin.config.header'));
            $content->description(trans('admin.config.description'));

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $configDatabaseItem = ConfigModel::find($id);
            $content->header(trans('admin.config.header'));
            $content->description($configDatabaseItem->name);

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header(trans('admin.config.header'));
            $content->description(trans('admin.create'));

            $content->body($this->form());
        });
    }

    public function grid()
    {
        return Admin::grid(ConfigModel::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->column('name', trans('admin.name'))->display(function ($name) {
                return "<a tabindex=\"0\" class=\"btn btn-xs btn-twitter\" role=\"button\" data-toggle=\"popover\" data-html=true title=\"Usage\" data-content=\"<code>config('$name');</code>\">$name</a>";
            });
            $grid->column('value'      , trans('admin.value'));
            $grid->column('description', trans('admin.description'));

            # $grid->created_at();
            # $grid->updated_at();

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name' , trans('admin.value'));
                $filter->like('value', trans('admin.description'));
            });
        });
    }

    public function form()
    {
        return Admin::form(ConfigModel::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text    ('name'       , trans('admin.value'))->rules('required');
            $form->textarea('value'      , trans('admin.value'))->rules('required');
            $form->textarea('description', trans('admin.description'));

            $form->display('created_at'  , trans('admin.created_at'));
            $form->display('updated_at'  , trans('admin.updated_at'));
        });
    }
}
