<?php namespace App\Modules\Track\Controllers;

use App\Modules\Track\Models\TrackModel;
use App\Core\BaseController;

class TrackAjax extends BaseController
{
    private $trackModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->trackModel = new TrackModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }
}
