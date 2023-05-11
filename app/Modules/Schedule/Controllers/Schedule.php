<?php namespace App\Modules\Schedule\Controllers;

use App\Modules\Schedule\Models\ScheduleModel;
use App\Core\BaseController;

class Schedule extends BaseController
{
    private $scheduleModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->scheduleModel = new ScheduleModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

    public function datakelompoktaruna()
    {
        return parent::_authView();
    }

    public function databahanajar()
    {
        return parent::_authView();
    }

    public function datapengampuhanjar()
    {
        return parent::_authView();
    }

    public function datajadwal()
    {
        return parent::_authView();
    }
    
    public function kelompokruangkelas()
    {
        return parent::_authView();
    }

}
