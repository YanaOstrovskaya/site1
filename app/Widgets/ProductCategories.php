<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Category;
class ProductCategories extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
      'type' => 'list'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        

        return view('widgets.product_categories', [
            'config' => $this->config,
            'productCategories' => Category::all(),
        ]);
    }
}
