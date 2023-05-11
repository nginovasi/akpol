<?php namespace App\Modules\Publik\Controllers;

use App\Modules\Publik\Models\PublikModel;
use App\Core\BaseController;

class PublikAjax extends BaseController
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
}
