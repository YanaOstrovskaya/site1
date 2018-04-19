<?php

namespace App\Http\AdminSections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Categories extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

        public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Category::count();
        });

    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
                     return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '№')->setWidth('30px'),
               AdminColumn::text('name', 'Name'),
               AdminColumn::image('imagePath', 'Image'),
               AdminColumn::text('slug', 'Slug'),
               AdminColumn::text('meta_title', 'Title'),
               AdminColumn::text('meta_description', 'Description')
           )->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
            $tabs = AdminDisplay::tabbed();
            $tabs->setTabs(function($id){
                $t=[];
            $t[] = AdminDisplay::tab(
                AdminForm::elements([
                  AdminFormElement::text('name', 'Name')->required(),
                              AdminFormElement::image('imagePath', 'Image')->required()
            ->setUploadSettings([
            'orientate' => [],
            'resize' => [100, null, function ($constraint) {
            $constraint->upsize();
             $constraint->aspectRatio();
            }],
            ])->setUploadFileName(function(\Illuminate\Http\UploadedFile $file) {
            return $file->getClientOriginalName();
            }),  
                ])
            )->setLabel('Main Info');
            $t[] = AdminDisplay::tab(
                AdminForm::elements([
                 AdminFormElement::text('meta_title', 'Title'),
                    AdminFormElement::textarea('meta_description', 'Description'),
                    AdminFormElement::text('slug', 'Slug')
                ])
            )->setLabel('SEO Info');
            return $t;
        });
            return AdminForm::panel()->addBody([$tabs]);


            // return AdminForm::panel()->addBody([
            // AdminFormElement::text('name', 'Name')->required(),
            // AdminFormElement::image('imagePath', 'Image')->required()
            // ->setUploadSettings([
            // 'orientate' => [],
            // 'resize' => [100, null, function ($constraint) {
            // $constraint->upsize();
            //  $constraint->aspectRatio();
            // }],
            // ])->setUploadFileName(function(\Illuminate\Http\UploadedFile $file) {
            // return $file->getClientOriginalName();
            // }),
            // AdminFormElement::text('meta_title', 'Title'),
            // AdminFormElement::textarea('meta_description', 'Description')
        // ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
