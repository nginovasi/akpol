<?php namespace App\Modules\Laporan\Controllers;

use App\Modules\Laporan\Models\LaporanModel;
use App\Core\BaseController;

class Laporan extends BaseController
{
    private $laporanModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function test()
    {
        return view('App\Modules\Laporan\Views\test'); 
    }

    public function rekapdatataruna()
    {
        return parent::_authView();
    }

}
