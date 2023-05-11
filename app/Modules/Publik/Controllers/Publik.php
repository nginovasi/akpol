<?php namespace App\Modules\Publik\Controllers;

use App\Modules\Publik\Models\PublikModel;
use App\Core\BaseController;

class Publik extends BaseController
{
    private $publikModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->publikModel = new PublikModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function test()
    {
        return view('App\Modules\Publik\Views\test'); 
    }

    function xxx(){
        echo json_encode($this->request->headers());
    }

}
