<?php namespace App\Modules\Coba\Controllers;

use App\Modules\Coba\Models\CobaModel;
use App\Core\BaseController;

class Coba extends BaseController
{
    private $cobaModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->cobaModel = new CobaModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function test()
    {
        return view('App\Modules\Coba\Views\test'); 
    }

    public function handontabel()
    {
        return view('App\Modules\Coba\Views\handontabel'); 
    }

}
