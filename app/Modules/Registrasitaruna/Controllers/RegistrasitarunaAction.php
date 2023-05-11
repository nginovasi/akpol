<?php

namespace App\Modules\Registrasitaruna\Controllers;

use App\Modules\Registrasitaruna\Models\RegistrasitarunaModel;
use App\Core\BaseController;

class RegistrasitarunaAction extends BaseController
{
    private $registrasitarunaModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->registrasitarunaModel = new RegistrasitarunaModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function pdf()
    {

        parent::_authDownload(function () {

            $data = parent::_httpPost('/web/registrasitaruna/datataruna_download', ["param" => json_encode($this->request->getGet())]);

            $rsdata = json_decode($data, true);

            // echo json_encode($rsdata);
            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\pdf\\' . explode("?", uri_segment(3))[0] . '_pdf';
            // echo view($view, $rsdata);

            $mpdf = new \Mpdf\Mpdf();

            $html = view($view, $rsdata);

            if (isset($_GET['o'])) {
                // $mpdf->AddPage($_GET['o']);
                $mpdf->AddPage(
                    $_GET['o'],
                    '',
                    '',
                    '',
                    '',
                    20, // margin_left
                    20, // margin right
                    5, // margin top
                    10, // margin bottom
                    90, // margin header
                    10
                ); // margin footer
            } else {
                // $mpdf->AddPage('P');
                $mpdf->AddPage(
                    'P',
                    '',
                    '',
                    '',
                    '',
                    20, // margin_left
                    20, // margin right
                    5, // margin top
                    10, // margin bottom
                    90, // margin header
                    10
                ); // margin footer
            }

            $mpdf->WriteHTML($html);

            $this->response->setHeader('Content-Type', 'application/pdf');

            $mpdf->Output($rsdata['nama_file'] . '.pdf', 'I');
        });
    }

    public function excel()
    {

        parent::_authDownload(function () {

            $data = parent::_httpPost('/web/registrasitaruna/datataruna_download', ["param" => json_encode($this->request->getGet())]);

            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\excel\\' .  explode("?", uri_segment(3))[0] . '_excel';
            echo view($view , $rsdata);
        });
    }

    function datataruna_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/registrasitaruna/datataruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datataruna_save()
    {
        // parent::_authEdit(function () {

        //     $datataruna =  parent::_httpPost('/web/registrasitaruna/datataruna_edit', ["param" => json_encode($this->request->getPost())]);

        //     $datatarunadecode = json_decode($datataruna);

        //     $data = $datatarunadecode->data;

        //     $m_user = array(
        //                      "id" =>  '',
        //                      "username" => $data['noaklong'],
        //                      "password" => $data['noaklong'],
        //                      "name" => $data['namataruna'],
        //                      "email" => $data['email'],
        //                      "type_code" => "trn"
        //                  );
        // });

        parent::_authInsert(function () {

            $session = \Config\Services::session();
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $photopath = $this->request->getFile('photopath_file');
          
            if ($photopath !== null) {
                // Check if the file is a PNG, JPEG, or JPG
                $allowed_types = ['png', 'jpeg', 'jpg'];
                $file_type = $photopath->getExtension();
                if (in_array($file_type, $allowed_types)) {
                    if ($photopath->isValid()) {
                    $taruna_file = curl_file_create($photopath->getRealPath());
                    } else {
                    $taruna_file = null;
                    }
                } else {
                    $taruna_file = null;
                    $error_message = 'Only PNG, JPEG, and JPG files are allowed';
                }
            } else {
                $taruna_file = null;
            }
            
            // if ($photopath !== null) {
            //     if ($photopath->isValid()) {
            //         $taruna_file = curl_file_create($photopath->getRealPath());
            //     } else {
            //         $taruna_file = null;
            //     }
            // } else {
            //     $taruna_file = null;
            // }

            $param = [
                "userid" => $userid,
                "photo_taruna" => $taruna_file
            ];
            
            if ($imagefile = $this->request->getFiles()) {
                foreach($imagefile['photo_kerabat_file'] as $key=>$img) {
                    if ($img->isValid()) {
                        $allowed_types = ['png', 'jpeg', 'jpg'];
                        $file_type = $img->getExtension();
                        if (in_array($file_type, $allowed_types)) {
                            $photo_kerabat = curl_file_create($img->getRealPath());
                            $param['photo_kerabat_array[' . $key . ']'] = $photo_kerabat;
                        } else {
                            // If the file type is not allowed, set $photo_kerabat to null
                            $param['photo_kerabat_array[' . $key . ']'] = null;
                            // You can also add an error message to notify the user that only PNG, JPEG, and JPG files are allowed
                            $error_message = 'Only PNG, JPEG, and JPG files are allowed';
                        }
                    }else{
                        $param['photo_kerabat_array[' . $key . ']'] = null;
                    }
                }
            }
            // if ($imagefile = $this->request->getFiles()) {
            //     foreach($imagefile['photo_kerabat_file'] as $key=>$img) {
            //         if ($img->isValid()) {
            //             $photo_kerabat = curl_file_create($img->getRealPath());
            //             $param['photo_kerabat_array[' . $key . ']'] = $photo_kerabat;
            //         }else{
            //             $param['photo_kerabat_array[' . $key . ']'] = null;
            //         }
            //     }
            // }

            if ($data['id'] == '') {

                $datataruna = array(
                    "id" =>  '',
                    "username" => $data['noaklong'],
                    "password" => $data['noaklong'],
                    "name" => $data['namataruna'],
                    "email" => $data['email'],
                    "tahun" => $data['tahun_masuk'],
                    "type_code" => "trn"
                );

                // echo json_encode($data);

                $data_m_user = parent::_httpPost('/web/administrator/manuser_save', ["param" => json_encode($datataruna), "userid" => $userid]);

                $data_m_user_decode = json_decode($data_m_user);

                if (isset($data_m_user_decode->success)) {
                    if ($data_m_user_decode->success == true) {
                        // echo json_encode($data_m_user_decode);
                        unset($data['tahun_masuk']);
                        $param['param'] = json_encode($data);

                        echo parent::_httpPost('/web/registrasitaruna/datataruna_save', $param);
                    } else {

                        echo json_encode($data_m_user_decode);
                    }
                } else {

                    echo json_encode($data_m_user_decode);
                }
            } else {

                unset($data['tahun_masuk']);
                $param['param'] = json_encode($data);
                
                // echo json_encode($param);

                echo parent::_httpPost('/web/registrasitaruna/datataruna_save', $param);
            }
        });
    }

    function datataruna_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/registrasitaruna/datataruna_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datataruna_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/registrasitaruna/datataruna_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }



    // Begin Laporan data taruna

    function laporandatataruna_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/registrasitaruna/laporandatataruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function laporandatataruna_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/registrasitaruna/laporandatataruna_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function laporandatataruna_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/registrasitaruna/laporandatataruna_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function laporandatataruna_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/registrasitaruna/laporandatataruna_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Laporan data taruna
}
