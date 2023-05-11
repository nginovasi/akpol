<?php namespace App\Modules\Panicbutton\Controllers;

use App\Modules\Panicbutton\Models\PanicbuttonModel;
use App\Core\BaseController;

class Panicbutton extends BaseController
{
    private $panicbuttonModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->panicbuttonModel = new PanicbuttonModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function datapanicbutton()
    {
        return parent::_authView();
    }

}
