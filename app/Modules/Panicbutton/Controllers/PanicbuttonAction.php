<?php namespace App\Modules\Panicbutton\Controllers;

use App\Modules\Panicbutton\Models\PanicbuttonModel;
use App\Core\BaseController;

class PanicbuttonAction extends BaseController
{
    private $panicbuttonModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->panicbuttonModel = new PanicbuttonModel();
    }

    public function index()
    {
        return redirect()->to(base_url()); 
    }

    // Begin Data Bahan Ajar

    function datapanicbutton_otorisasi()
    {

        parent::_authOtoritasi(function () {

            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/panicbutton/datapanicbutton_otorisasi', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapanicbutton_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/panicbutton/datapanicbutton_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    // function datapanicbutton_save()
    // {

    //     parent::_authInsert(function () {
    //         $userid = $this->session->get('id');
    //         $data = array();

    //         for ($i = 0; $i < count($_POST['judul']); $i++) {
    //             // echo $i;
    //             $dataarray = array(
    //                 'id' => $_POST['id'][$i],
    //                 'judul' => $_POST['judul'][$i],
    //                 'deskripsi' => $_POST['deskripsi'][$i],
    //                 'pertemuan_ke' => $_POST['pertemuan_ke'][$i],
    //                 'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
    //                 // 'id_user_pendidik' => $_POST['id_user_pendidik'],
    //                 'id_semester' => $_POST['id_semester'],
    //                 'is_ujian' => $_POST['is_ujian'][$i] == 0 ? $_POST['is_ujian'][$i] : '1',
    //                 'id_jenis_ujian' => $_POST['is_ujian'][$i] != 0 ? $_POST['is_ujian'][$i] : null,
    //                 'id_batalyon' => $_POST['id_batalyon']
    //             );
    //             array_push($data, $dataarray);
    //         }
    //         if (isset($_POST['is_deleted']) == 1) {
    //             for ($i = 0; $i < count($_POST['is_deleted']); $i++) {
    //                 $dataarray = array(
    //                     'id' => $_POST['is_deleted'][$i],
    //                     'is_deleted' => 1
    //                 );
    //                 array_push($data, $dataarray);
    //             }
    //         }

    //         // echo json_encode($data);
    //         echo parent::_httpPost('/web/akademik/datakurikulum_save', ["param" => json_encode($data), "userid" => $userid]);
    //     });
    // }

    // function datapanicbutton_edit()
    // {
    //     parent::_authEdit(function () {

    //         echo parent::_httpPost('/web/akademik/datakurikulum_edit', ["param" => json_encode($this->request->getPost())]);
    //     });
    // }

    function datapanicbuttondetail_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/panicbutton/datapanicbutton_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    // function datapanicbutton_delete()
    // {
    //     parent::_authDelete(function () {
    //         $userid = $this->session->get('id');

    //         echo parent::_httpPost('/web/akademik/datakurikulum_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
    //     });
    // }
}
