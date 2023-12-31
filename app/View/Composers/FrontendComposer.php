<?php
namespace App\View\Composers;
use Illuminate\View\View;
use App\Models\Category;

class FrontendComposer
{
     /**
      * Create a FrontendComposer.
      *
      * @return void
      */
    public function __construct()
    {
        //
    }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
    public function compose(View $view)
    {
        // $view->with('cates', Category::where('parent_id', 11)->get());
        $view->with('cates', Category::get());
    }
}
?>
