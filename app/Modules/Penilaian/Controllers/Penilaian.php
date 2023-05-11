<?php namespace App\Modules\Penilaian\Controllers;

use App\Modules\Penilaian\Models\PenilaianModel;
use App\Core\BaseController;

class Penilaian extends BaseController
{
    private $penilaianModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->penilaianModel = new PenilaianModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function test()
    {
        return view('App\Modules\Penilaian\Views\test'); 
    }

    public function penilaiantugas()
    {
        return parent::_authView();
    }

}
