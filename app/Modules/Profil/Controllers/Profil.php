<?php namespace App\Modules\Profil\Controllers;

use App\Modules\Profil\Models\ProfilModel;
use App\Core\BaseController;

class Profil extends BaseController
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

    public function test()
    {
        return view('App\Modules\Profil\Views\test'); 
    }
    
    public function profil()
    {
        return parent::_view();
    }

}
