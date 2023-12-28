<?php

namespace App\Controllers;

use App\Models\ServiceWorksiteModel;

class MainController extends CoreController
{
    /**
     * home method
     * 
     * @return view
     */
    public function home()
    {
        $serviceWorksiteModel = new ServiceWorksiteModel();
        $allServiceWorksite = $serviceWorksiteModel->findAll();

        $this->show('home', [
            'allServiceWorksite' => $allServiceWorksite
        ]);
    }
}
