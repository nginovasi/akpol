<?php namespace App\Modules\Registrasitaruna\Controllers;

use App\Modules\Registrasitaruna\Models\RegistrasitarunaModel;
use App\Core\BaseController;

class Registrasitaruna extends BaseController
{
    private $registrasitarunaModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->registrasitarunaModel = new RegistrasitarunaModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function datataruna()
    {
        return parent::_authView();
    }

    public function laporandatataruna()
    {
        return parent::_authView();
    }

    public function test()
    {
        return view('App\Modules\Registrasitaruna\Views\test');
    }

}
