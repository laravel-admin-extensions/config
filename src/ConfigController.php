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
            $content->header(trans('admin-ext-config.index_header'));
            $content->description(trans('admin-ext-config.index_description'));

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
            $content->header(trans('admin-ext-config.edit_header'));
            $content->description(trans('admin-ext-config.edit_description'));

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
            $content->header(trans('admin-ext-config.create_header'));
            $content->description(trans('admin-ext-config.create_description'));

            $content->body($this->form());
        });
    }

    public function grid()
    {
        return Admin::grid(ConfigModel::class, function (Grid $grid) {
            $grid->id(trans('admin-ext-config.id'))->sortable();
            $grid->name(trans('admin-ext-config.name'))->display(function ($name) {
                return "<a tabindex=\"0\" class=\"btn btn-xs btn-twitter\" role=\"button\" data-toggle=\"popover\" data-html=true title=\"" . trans('admin-ext-config.usage') . "\" data-content=\"<code>config('$name');</code>\">$name</a>";
            });
            $grid->value(trans('admin-ext-config.value'));
            $grid->description(trans('admin-ext-config.description'));

            $grid->created_at(trans('admin-ext-config.created_at'));
            $grid->updated_at(trans('admin-ext-config.updated_at'));

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name', trans('admin-ext-config.name'));
                $filter->like('value', trans('admin-ext-config.value'));
            });
        });
    }

    public function form()
    {
        return Admin::form(ConfigModel::class, function (Form $form) {
            $form->display('id', trans('admin-ext-config.id'));
            $form->text('name', trans('admin-ext-config.name'))->rules('required');
            $form->textarea('value', trans('admin-ext-config.value'))->rules('required');
            $form->textarea('description', trans('admin-ext-config.description'));

            $form->display('created_at', trans('admin-ext-config.created_at'));
            $form->display('updated_at', trans('admin-ext-config.updated_at'));
        });
    }
}
