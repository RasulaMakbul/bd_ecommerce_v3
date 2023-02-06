<?php

namespace App\View\Composers;

use App\Models\Admin\Category as AdminCategory;
use Illuminate\View\View;

class FrontendComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $adminCategory = AdminCategory::all();

        $view->with([
            'adminCategory' => $adminCategory
        ]);
    }
}
