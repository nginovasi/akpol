<?php namespace App\Modules\Profil\Controllers;

use App\Modules\Profil\Models\ProfilModel;
use App\Core\BaseController;

class ProfilAjax extends BaseController
{
    private $profilModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }
}
