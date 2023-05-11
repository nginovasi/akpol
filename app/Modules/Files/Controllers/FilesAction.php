<?php

namespace App\Modules\Files\Controllers;

use App\Modules\Files\Models\FilesModel;
use App\Core\BaseController;

class FilesAction extends BaseController
{
    private $filesModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->FilesModel = new FilesModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function file_upload()
    {
        if ($imagefile = $this->request->getFile()) {
            echo json_encode($imagefile['file']);
            // foreach ($imagefile['files'] as $img) {
            //     if ($img->isValid()) {
            //         echo json_encode($img);
            //     }
            // }
        }
    }

    public function dropzoneStore()
    {
        parent::_authInsert(function () {

            $session = \Config\Services::session();
            $file = $this->request->getFile('file');

            $username = $session->get('username');
            $usertype = $session->get('usertype');
            $userdetail = $session->get('userdetail');

            $originalName = $file->getClientName();
            $extension = $file->getClientExtension();
            $size = $file->getSize();

            $data = array(
                'username' => $username,
                'usertype' => $usertype,
                'userdetail' => $userdetail,
                'extension' => $extension,
                'originalName' => $originalName,
                'size' => $size,
            );

            echo parent::_httpPost('/web/files/filemateri_upload', ["param" => json_encode($data), "file" => curl_file_create($file->getRealPath())]);
        });
    }


    function manfile_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/files/filemateri_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function manfile_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = array();

            for ($i = 0; $i < count($_POST['lokasi_file']); $i++) {
                $id_tipe_file = json_decode(parent::_httpPost('/web/files/filetype_get', ["tipe_file" => $_POST['tipe_file'][$i]]));
                $dataarray = array(
                    'id' => isset($_POST['id_file'][$i]) ? $_POST['id_file'][$i] : null,
                    'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
                    'id_user_pendidik' => $userid,
                    'id_tingkatan_detail' => $_POST['id_tingkatan_detail'],
                    'id_batalyon' => $_POST['id_batalyon'],
                    'keterangan' => $_POST['keterangan'],
                    'pertemuan_ke' => $_POST['pertemuan_ke'],
                    'id_tipe_file' => isset($id_tipe_file) ? $id_tipe_file->id : null,
                    'ukuran_file' => $_POST['ukuran_file'][$i],
                    'lokasi_file' => $_POST['lokasi_file'][$i]
                );
                array_push($data, $dataarray);
            }
            echo parent::_httpPost('/web/files/filemateri_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function manfile_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');
            $dir = './' . $_POST['dir'];
            echo parent::_httpPost('/web/files/filemateri_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid, "dir" => $dir]);
        });
    }

    function file_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');
            $dir = './' . $_POST['dir'];
            echo parent::_httpPost('/web/files/file_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid, "dir" => $dir]);
        });
    }
}
