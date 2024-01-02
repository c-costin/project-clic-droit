<?php

namespace App\Controller;

use App\Model\ServiceWorksiteModel;

class MainController extends CoreController
{
    /**
     * home method
     * 
     * @return view
     */
    public function home()
    {
        $allServiceWorksite = ServiceWorksiteModel::findAll();

        $this->show('home', [
            'allServiceWorksite' => $allServiceWorksite
        ]);
    }
}
