<?php namespace App\Modules\Track\Controllers;

use App\Modules\Track\Models\TrackModel;
use App\Core\BaseController;

class Track extends BaseController
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
        return view('App\Modules\Track\Views\tracking'); 
		// return redirect()->to(base_url()); 
	}

    public function test()
    {
    }

}
