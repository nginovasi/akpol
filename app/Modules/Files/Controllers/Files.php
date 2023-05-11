<?php

namespace App\Modules\Files\Controllers;

use App\Modules\Files\Models\FilesModel;
use App\Core\BaseController;

class Files extends BaseController
{
    private $filesModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->filesModel = new FilesModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function manfile()
    {
        return parent::_authView();
    }
}
