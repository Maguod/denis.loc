<?php


namespace App\UseCases\Entity\Main;
use App\Entity\MainCategory;

class MainCategoriesService
{
    private $main;
    public $cat ;

    public function __construct(MainCategory $main)
    {
        $this->main = $main;
        $this->cat = collect();
    }

    public function getCategoryForMain($main=null)
    {
        if(null === $main){$main = $this->main;}
       if($main->categories->isEmpty()) {
           $childs = $main->childrenActive;
           foreach($childs as $key=>$child) {
//               if(4=== $key) { dd($child->categories,$child->name );}
               $this->getCategoryForMain($child);
           }
       } else {
           $this->cat = $this->cat->merge($main->categories);
       }
       return $this->cat;
    }

}