<?php namespace App\Modules\Coba\Controllers;

use App\Modules\Coba\Models\CobaModel;
use App\Core\BaseController;

class CobaAction extends BaseController
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
}
