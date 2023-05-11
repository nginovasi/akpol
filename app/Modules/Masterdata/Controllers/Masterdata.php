<?php namespace App\Modules\Masterdata\Controllers;

use App\Modules\Masterdata\Models\MasterdataModel;
use App\Core\BaseController;

class Masterdata extends BaseController
{
    private $masterdataModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->masterdataModel = new MasterdataModel();
    }

    public function index()
	{
		return redirect()->to(base_url()); 
	}

        public function datataruna()
    {
        return parent::_authView();
    }

    public function datakelompok()
    {
        return parent::_authView();
    }

    public function datasatker()
    {
        return parent::_authView();
    }

    public function databatalyon()
    {
        return parent::_authView();
    }

    public function datakompi()
    {
        return parent::_authView();
    }

    public function datapeleton()
    {
        return parent::_authView();
    }

    public function dataaspek()
    {
        return parent::_authView();
    }

    public function datapelanggaran()
    {
        return parent::_authView();
    }

    public function datakategoripelanggaran()
    {
        return parent::_authView();
    }

    public function datakarakterpenilaian()
    {
        return parent::_authView();
    }

    public function datajampertemuan()
    {
        return parent::_authView();
    }

    public function datapujian()
    {
        return parent::_authView();
    }

    public function datagedung(){
        return parent::_authView();
    }

    public function variabelpujian(){
        return parent::_authView();
    }

    public function indikatorpujian(){
        return parent::_authView();
    }

    public function itempujian(){
        return parent::_authView();
    }

    public function pointpujian(){
        return parent::_authView();
    }
    
    public function kalenderakademik(){
        return parent::_authView();
    }

    public function datattd(){
        return parent::_authView();
    }

    public function configurasittd(){
        return parent::_authView();
    }

    public function jabatanttd(){
        return parent::_authView();
    }
}
