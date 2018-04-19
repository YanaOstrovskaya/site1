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
use AdminColumnEditable;
use AdminColumnFilter;

/**
 * Class Products
 *
 * @property \App\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Products extends Section implements Initializable
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
            return \App\Product::count();
        });

    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
            $table =  AdminDisplay::datatablesAsync()->with('category', 'manufacture')
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
               AdminColumn::text('id', '№')->setWidth('30px'),
               AdminColumn::link('name', 'Name'),
               AdminColumn::image('imagePath', 'Image'),
               AdminColumnEditable::text('price', 'Price'),
                AdminColumnEditable::text('salePrice', 'Sale Price'),
                 //AdminColumn::text('category.name', 'Category'),
                 AdminColumnEditable::select('category_id')->setWidth('250px')
                        ->setModelForOptions(new \App\Category)
                        ->setLabel('Категория')
                        ->setDisplay('name')
                        ->setTitle('Выберите категорию:'),
                 //AdminColumn::text('manufacture.name', 'Manufacture'),
                 AdminColumnEditable::select('manufacture_id')->setWidth('250px')
                        ->setModelForOptions(new \App\Manufacture)
                        ->setLabel('Производитель')
                        ->setDisplay('name')
                        ->setTitle('Выберите производителя:'),
                      AdminColumn::text('recommended', 'Recommended')
           );
           $table->setColumnFilters([
            null,
            AdminColumnFilter::text()->setOperator('contains')->setPlaceholder('name')
           ]);
           return $table;
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
                 AdminFormElement::wysiwyg('description', 'Description')->required(),
                 AdminFormElement::select('category_id', 'Category', \App\Category::class)->setDisplay('name')->required(),
                 AdminFormElement::select('manufacture_id', 'Manufacture', \App\Manufacture::class)->setDisplay('name'),
                AdminFormElement::image('imagePath', 'Image')->required(),
                 AdminFormElement::images('gallery', 'Gallery')->storeAsJson()
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
                 AdminFormElement::number('price', 'Price')->required(),
                 AdminFormElement::number('salePrice', 'Sale Price'),
                 AdminFormElement::checkbox('inStock', 'In Stock')->setDefaultValue(1),
                 AdminFormElement::checkbox('recommended', 'Recommended'),
                   
                ])
            )->setLabel('Price');
                        $t[] = AdminDisplay::tab(
                AdminForm::elements([
                 AdminFormElement::text('slug', 'Slug'),
                 AdminFormElement::text('meta_title', 'Meta title'),
                 AdminFormElement::textarea('meta_description', 'Meta description'),
                 
                   
                ])
            )->setLabel('SEO info');
            return $t;
        });
            return AdminForm::panel()->addBody([$tabs]);
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
