<?php namespace App\Modules\Publik\Controllers;

use App\Modules\Publik\Models\PublikModel;
use App\Core\BaseController;

class PublikAction extends BaseController
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

    function tes(){
        echo json_encode($this->request->getPost());
    }
}
