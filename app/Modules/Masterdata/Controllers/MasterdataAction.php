<?php namespace App\Modules\Masterdata\Controllers;

use App\Modules\Masterdata\Models\MasterdataModel;
use App\Core\BaseController;

class MasterdataAction extends BaseController
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

    // Begin Data Kelompok

    function datakelompok_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datakelompok_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakelompok_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datakelompok_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakelompok_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datakelompok_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakelompok_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datakelompok_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Kelompok

    // Begin Data Satuan Kerja

    function datasatker_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datasatker_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datasatker_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datasatker_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datasatker_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datasatker_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datasatker_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datasatker_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Satuan Kerja

    // Begin Data Batalyon

    function databatalyon_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/databatalyon_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function databatalyon_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/databatalyon_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function databatalyon_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/databatalyon_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function databatalyon_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/databatalyon_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Batalyon

    // Begin Data Kompi

    function datakompi_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datakompi_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakompi_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datakompi_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakompi_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datakompi_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakompi_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datakompi_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Kompi

    // Begin Data peleton

    function datapeleton_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datapeleton_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapeleton_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datapeleton_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapeleton_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datapeleton_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapeleton_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datapeleton_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data peleton

    // Begin Data Aspek

    function dataaspek_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/dataaspek_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataaspek_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/dataaspek_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function dataaspek_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/dataaspek_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataaspek_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/dataaspek_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Aspek

    // Begin Data karakterpenilaian

    function datakarakterpenilaian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datakarakterpenilaian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakarakterpenilaian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datakarakterpenilaian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakarakterpenilaian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datakarakterpenilaian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakarakterpenilaian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datakarakterpenilaian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data karakterpenilaian

    // Begin Data kategori pelanggaran

    function datakategoripelanggaran_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datakategoripelanggaran_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakategoripelanggaran_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datakategoripelanggaran_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakategoripelanggaran_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datakategoripelanggaran_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakategoripelanggaran_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datakategoripelanggaran_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data kategori pelanggaran

    // Begin datapelanggaran

    function datapelanggaran_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datapelanggaran_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapelanggaran_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datapelanggaran_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapelanggaran_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datapelanggaran_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapelanggaran_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datapelanggaran_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datapelanggaran

    // Begin datajampertemuan

    function datajampertemuan_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datajampertemuan_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajampertemuan_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datajampertemuan_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datajampertemuan_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datajampertemuan_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajampertemuan_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datajampertemuan_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datajampertemuan

    // Begin datapujian

    function datapujian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datapujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapujian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datapujian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapujian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datapujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapujian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datapujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datapujian

    // Begin datagedung

    function datagedung_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/datagedung_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datagedung_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/datagedung_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datagedung_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/datagedung_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datagedung_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/datagedung_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datagedung


    // Begin variabelpujian

    function variabelpujian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/variabelpujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function variabelpujian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/variabelpujian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function variabelpujian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/variabelpujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function variabelpujian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/variabelpujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End variabelpujian

    // Begin indikatorpujian

    function indikatorpujian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/indikatorpujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function indikatorpujian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/indikatorpujian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function indikatorpujian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/indikatorpujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function indikatorpujian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/indikatorpujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End indikatorpujian

    // Begin itempujian

    function itempujian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/itempujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function itempujian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/itempujian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function itempujian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/itempujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function itempujian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/itempujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End itempujian

    // Begin pointpujian

    function pointpujian_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/masterdata/pointpujian_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function pointpujian_save()
    {   
        parent::_authInsert(function(){
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            
            echo parent::_httpPost('/web/masterdata/pointpujian_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function pointpujian_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/masterdata/pointpujian_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function pointpujian_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/pointpujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End pointpujian

    // Begin datatugasmengajar

    function kalenderakademik_load()
    {
        parent::_authLoad(function () {
            $session = \Config\Services::session();
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');


            echo parent::_httpPost('/web/masterdata/kalenderakademik_load', [
                "param" => json_encode($this->request->getPost()),
                "userid" => $userid,
                "usertype" => $usertype
            ]);
        });
    }

    function kalenderakademik_save()
    {
        parent::_authInsert(function () {
            $session = \Config\Services::session();
            $userdetail = $session->get('userdetail');
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $file_kalender_akademik = $this->request->getFile('file_kalender_akademik');

            $filetype = $file_kalender_akademik->getClientExtension();

            if ($file_kalender_akademik !== null) {
                if ($file_kalender_akademik->isValid()) {
                    $file = curl_file_create($file_kalender_akademik->getRealPath());
                } else {
                    $file = null;
                }
            } else {
                $file = null;
            }
            // echo json_encode($data);


            echo parent::_httpPost('/web/masterdata/kalenderakademik_save', [
                "param" => json_encode($data),
                "userid" => $userid,
                "userdetail" => json_encode($userdetail),
                "usertype" => $usertype,
                "filetype" => $filetype,
                "file_kalender_akademik" => $file
            ]);
        });
        // echo 'rayimu';
    }


    function kalenderakademik_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/masterdata/kalenderakademik_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function kalenderakademik_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/kalenderakademik_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datatugasmengajar Done


    // Begin datattd

        function datattd_load()
        {
            parent::_authLoad(function(){

                echo parent::_httpPost('/web/masterdata/datattd_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datattd_save()
        {   
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                echo parent::_httpPost('/web/masterdata/datattd_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function datattd_edit()
        {   
            parent::_authEdit(function(){
                
                echo parent::_httpPost('/web/masterdata/datattd_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datattd_delete()
        {   
            parent::_authDelete(function(){
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/masterdata/datattd_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

        function datattd_saveaktiv()
        {   
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                echo parent::_httpPost('/web/masterdata/datattd_saveaktiv', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

    // End datattd

    // Begin configurasittd

        function configurasittd_load()
        {
            parent::_authLoad(function(){

                echo parent::_httpPost('/web/masterdata/configurasittd_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function configurasittd_save()
        {   
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                echo parent::_httpPost('/web/masterdata/configurasittd_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function configurasittd_edit()
        {   
            parent::_authEdit(function(){
                
                echo parent::_httpPost('/web/masterdata/configurasittd_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function configurasittd_delete()
        {   
            parent::_authDelete(function(){
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/masterdata/configurasittd_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End configurasittd

    // Begin jabatanttd

        function jabatanttd_load()
        {
            parent::_authLoad(function(){

                echo parent::_httpPost('/web/masterdata/jabatanttd_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function jabatanttd_save()
        {   
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                echo parent::_httpPost('/web/masterdata/jabatanttd_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function jabatanttd_edit()
        {   
            parent::_authEdit(function(){
                
                echo parent::_httpPost('/web/masterdata/jabatanttd_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function jabatanttd_delete()
        {   
            parent::_authDelete(function(){
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/masterdata/jabatanttd_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End jabatanttd
}
