<?php

namespace App\Modules\Akademik\Controllers;

use App\Modules\Akademik\Models\AkademikModel;
use App\Core\BaseController;

class AkademikAction extends BaseController
{
    private $akademikModel;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->akademikModel = new AkademikModel();
    }

    public function index()
    {
        return redirect()->to(base_url());
    }

    public function pdf()
    {

        parent::_authDownload(function () {

            $data = parent::_httpPost('/web/akademik/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);

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

            $data = parent::_httpPost('/web/akademik/' . explode("?", uri_segment(3))[0] . '_download', ["param" => json_encode($this->request->getGet())]);

            $rsdata = json_decode($data, true);

            $view = 'App\Modules\\' . ucfirst(uri_segment(0)) . '\Views\excel\\' .  explode("?", uri_segment(3))[0] . '_excel';

            echo view($view , $rsdata);
        });
    }

    // Begin dataprogramstudi done

    function dataprogramstudi_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/dataprogramstudi_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataprogramstudi_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/dataprogramstudi_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function dataprogramstudi_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/dataprogramstudi_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataprogramstudi_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/dataprogramstudi_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End dataprogramstudi done

    // Begin dataruangkelas

    function dataruangkelas_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/dataruangkelas_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataruangkelas_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/dataruangkelas_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function dataruangkelasdetail_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/dataruangkelas_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataruangkelas_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/dataruangkelas_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function dataruangkelas_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/dataruangkelas_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End dataruangkelas Done

    // Begin Data Kelompok Taruna Done

    function datakelompoktaruna_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datakelompoktaruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakelompoktaruna_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datakelompoktaruna_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    // End Data Kelompok Taruna Done

    // Begin datamatapelajaran Done

        function datamatapelajaran_load()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/datamatapelajaran_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datamatapelajaran_save()
        {
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                // if ($data['satuan'] == 'sks') {
                //     $data['is_sks'] = 1;
                // } else {
                //     $data['is_sks'] = 0;
                // }

                echo parent::_httpPost('/web/akademik/datamatapelajaran_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function datamatapelajaran_edit()
        {
            parent::_authEdit(function () {

                echo parent::_httpPost('/web/akademik/datamatapelajaran_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datamatapelajarandetail_load()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/datamatapelajaran_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datamatapelajaran_delete()
        {
            parent::_authDelete(function () {
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/datamatapelajaran_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End datamatapelajaran Done

    // Begin datapaketmatakuliah Done

    function datapaketmatakuliah_otorisasi()
    {

        parent::_authOtoritasi(function () {

            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/datapaketmatakuliah_otorisasi', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapaketmatakuliah_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datapaketmatakuliah_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapaketmatakuliah_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = array();
           

            if (isset($_POST['is_verif']) == 1) {
                for ($i = 0; $i < count($_POST['id_program_studi_mata_pelajaran']); $i++) {
                    $dataarray = array(
                        'id' => $_POST['id_program_studi_mata_pelajaran'][$i],
                        'is_verif' => 1,
                        'verif_at' => date("Y-m-d H:i:s"),
                        'verif_by' => $userid,
                       
                        
                    );
                    array_push($data, $dataarray);
                }
            } else {
          

                for ($i = 0; $i < count($_POST['id_mata_pelajaran']); $i++) {
                    $dataarray = array(
                        'id' => $_POST['id'][$i],
                        'id_mata_pelajaran' => $_POST['id_mata_pelajaran'][$i],
                        'id_batalyon' => $_POST['id_batalyon'],
                        // 'id_program_studi' => $_POST['id_program_studi'],
                        'id_semester' => $_POST['id_semester'],
                        'tahun_ajaran' => $_POST['tahun_ajaran'],

                        'id_aspek' => $_POST['id_aspek'][$i],
                        'satuan' => $_POST['satuan'][$i],
                        'nilai' => $_POST['nilai'][$i],
                        'jumlah_pertemuan' => $_POST['jumlah_pertemuan'][$i],
                      

                    );
                    array_push($data, $dataarray);
                }
                if (isset($_POST['is_deleted']) == 1) {
                    for ($i = 0; $i < count($_POST['is_deleted']); $i++) {
                        $dataarray = array(
                            'id' => $_POST['is_deleted'][$i],
                            'is_deleted' => 1,
                            'id_mata_pelajaran' => null,
                            'id_batalyon' => null,
                            'id_semester' => null,
                            'id_aspek' => null,
                            'id_mata_pelajaran_del' => $_POST['id_mata_pelajaran'][$i],
                            'id_semester_del' => $_POST['id_semester'],
                            'id_batalyon_del' => $_POST['id_batalyon'],
                            'id_aspek_del' => $_POST['id_aspek'][$i]
                        );
                        array_push($data, $dataarray);
                    }
                }
            }

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademik/datapaketmatakuliah_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datapaketmatakuliah_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datapaketmatakuliah_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapaketmatakuliah_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datapaketmatakuliah_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datapaketmatakuliah Done


    // Begin Data kurikulumDone

    function  _datakurikulum_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datakurikulum_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function  _datakurikulum_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/datakurikulum_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function  _datakurikulum_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datakurikulum_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function _datakurikulum_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datakurikulum_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data kurikulum Done

    // Begin Data taruna
    function tarunaaktif_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/tarunaaktif_load', ["param" => json_encode($this->request->getPost())]);
        });
    }
    // End Data taruna

    // Begin datatugasmengajar

    function datatugasmengajar_load()
    {
        parent::_authLoad(function () {
            $session = \Config\Services::session();
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');


            echo parent::_httpPost('/web/akademik/datatugasmengajar_load', [
                "param" => json_encode($this->request->getPost()),
                "userid" => $userid,
                "usertype" => $usertype
            ]);
        });
    }

    function datatugasmengajar_save()
    {
        parent::_authInsert(function () {
            $session = \Config\Services::session();
            $userdetail = $session->get('userdetail');
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $file_materi_tugas = $this->request->getFile('file_materi_tugas');

            $filetype = $file_materi_tugas->getClientExtension();

            if ($file_materi_tugas !== null) {
                if ($file_materi_tugas->isValid()) {
                    $file = curl_file_create($file_materi_tugas->getRealPath());
                } else {
                    $file = null;
                }
            } else {
                $file = null;
            }
            // echo json_encode($data);


            echo parent::_httpPost('/web/akademik/datatugasmengajar_save', [
                "param" => json_encode($data),
                "userid" => $userid,
                "userdetail" => json_encode($userdetail),
                "usertype" => $usertype,
                "filetype" => $filetype,
                "file_materi_tugas" => $file
            ]);
        });
        // echo 'rayimu';
    }

    function datatugasmengajar_load_nilai()
    {
        parent::_authLoad(function () {
            $session = \Config\Services::session();
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');


            echo parent::_httpPost('/web/akademik/datatugasmengajar_load_nilai', [
                "param" => json_encode($this->request->getPost()),
                "userid" => $userid,
                "usertype" => $usertype
            ]);
        });
    }

    function datatugasmengajar_save_nilai()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademik/datatugasmengajar_save_nilai', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datatugasmengajar_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datatugasmengajar_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datatugasmengajar_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datatugasmengajar_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End datatugasmengajar Done


    function datapendidik_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datapendidik_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapendidik_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();
            $photopath = $this->request->getFile('file_foto');

            if ($photopath !== null) {
                if ($photopath->isValid()) {
                    $file_foto = curl_file_create($photopath->getRealPath());
                } else {
                    $file_foto = null;
                }
            } else {
                $file_foto = null;
            }

            // echo parent::_httpPost('/web/akademik/datapendidik_save', [
            //     "param" => json_encode($data),
            //     "userid" => $userid,
            //     "file_foto" => $file_foto
            // ]);




            if ($data['id'] == '') {

                $datapendidik = array(
                    "id" =>  '',
                    "username" => $data['nrp'],
                    "password" => $data['nrp'],
                    "name" => $data['namagadik'],
                    "email" => $data['email'],
                    "tahun" => '',
                    "type_code" => "gdk"
                );

                $data_m_user = parent::_httpPost('/web/administrator/manuser_save', ["param" => json_encode($datapendidik), "userid" => $userid]);

                $data_m_user_decode = json_decode($data_m_user);

                if (isset($data_m_user_decode->success)) {
                    if ($data_m_user_decode->success==true) {

                        echo parent::_httpPost('/web/akademik/datapendidik_save', [
                                "param" => json_encode($data),
                                "userid" => $userid,
                                "file_foto" => $file_foto
                            ]);

                    } else {

                        echo json_encode($data_m_user_decode);
                    }

                } else {
                    
                    echo json_encode($data_m_user_decode);
                }

            } else {

                // echo parent::_httpPost('/web/akademik/datapendidik_save', ["param" => json_encode($data), "userid" => $userid]);
                echo parent::_httpPost('/web/akademik/datapendidik_save', [
                                "param" => json_encode($data),
                                "userid" => $userid,
                                "file_foto" => $file_foto
                            ]);
            }
        });

    }

    function datapendidik_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datapendidik_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapendidikdetail_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datapendidik_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapendidik_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datapendidik_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    function datapendidik_aktiv()
    {

        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datapendidik_aktiv', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }


    // Begin configparameter

    function configparameter_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/masterdata/configparameter_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function configparameter_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/masterdata/configparameter_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function configparameter_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/masterdata/configparameter_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function configparameter_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/masterdata/configparameter_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End configparameter

    // Begin golongankepangkatan

    function golongankepangkatan_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/golongankepangkatan_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function golongankepangkatan_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/golongankepangkatan_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function golongankepangkatan_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/golongankepangkatan_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function golongankepangkatan_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/golongankepangkatan_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End golongankepangkatan

    // Begin rekapjammengajar

    function rekapjammengajar_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/rekapjammengajar_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rekapjammengajar_save()
    {
        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/rekapjammengajar_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function rekapjammengajar_edit()
    {
        // echo json_encode($_POST); 
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/rekapjammengajar_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function rekapjammengajar_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/rekapjammengajar_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End rekapjammengajar


    // Begin Data datajadwal

    function datajadwal_otorisasi()
    {

        parent::_authOtoritasi(function () {

            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/datajadwal_otorisasi', ["param" => json_encode($data), "userid" => $userid]);
        });
    }
    
    function datajadwal_load()
    {
        parent::_authLoad(function () {
            echo parent::_httpPost('/web/akademik/datajadwal_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajadwal_save()
    {
        parent::_authEdit(function () {
            echo parent::_httpPost('/web/akademik/datajadwal_save', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajadwal_edit()
    {
        parent::_authEdit(function () {
            echo parent::_httpPost('/web/akademik/datajadwal_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajadwal_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');
            echo parent::_httpPost('/web/akademik/datajadwal_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data datajadwal


    // Begin Data Bahan Ajar

    function datakurikulum_otorisasi()
    {

        parent::_authOtoritasi(function () {

            $userid = $this->session->get('id');
            $data = $this->request->getPost();

            echo parent::_httpPost('/web/akademik/datakurikulum_otorisasi', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakurikulum_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datakurikulum_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakurikulum_save()
    {

        parent::_authInsert(function () {
            $userid = $this->session->get('id');
            $data = array();

            for ($i = 0; $i < count($_POST['judul']); $i++) {
                // echo $i;
                $dataarray = array(
                    'id' => $_POST['id'][$i],
                    'judul' => $_POST['judul'][$i],
                    'deskripsi' => $_POST['deskripsi'][$i],
                    'pertemuan_ke' => $_POST['pertemuan_ke'][$i],
                    'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
                    'id_user_pendidik' => $_POST['id_user_pendidik'],
                    'id_semester' => $_POST['id_semester'],
                    'is_ujian' => $_POST['is_ujian'][$i] == 0 ? $_POST['is_ujian'][$i] : '1',
                    'id_jenis_ujian' => $_POST['is_ujian'][$i] != 0 ? $_POST['is_ujian'][$i] : '0',
                    'id_batalyon' => $_POST['id_batalyon']
                );
                array_push($data, $dataarray);
            }
            if (isset($_POST['is_deleted']) == 1) {
                for ($i = 0; $i < count($_POST['is_deleted']); $i++) {
                    $dataarray = array(
                        'id' => $_POST['is_deleted'][$i],
                        'is_deleted' => 1
                    );
                    array_push($data, $dataarray);
                }
            }

            // echo json_encode($data);
            echo parent::_httpPost('/web/akademik/datakurikulum_save', ["param" => json_encode($data), "userid" => $userid]);
        });
    }

    function datakurikulum_edit()
    {
        parent::_authEdit(function () {

            echo parent::_httpPost('/web/akademik/datakurikulum_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakurikulumdetail_load()
    {
        parent::_authLoad(function () {

            echo parent::_httpPost('/web/akademik/datakurikulum_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakurikulum_delete()
    {
        parent::_authDelete(function () {
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/akademik/datakurikulum_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // Begin datamatapelajaran Done

        function pelanggarandanpujian_otorisasi()
        {

            parent::_authOtoritasi(function () {

                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/pelanggarandanpujian_otorisasi', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function pelanggarandanpujian_otorisasipujian()
        {

            parent::_authOtoritasi(function () {

                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/pelanggarandanpujian_otorisasipujian', ["param" => json_encode($data), "userid" => $userid]);
            });
        }
        
        function pelanggaran_load()
        {
            parent::_authLoad(function () {
                $userid = $this->session->get('id');
                $usertype = $this->session->get('usertype');
                
                echo parent::_httpPost('/web/akademik/pelanggaran_load', ["param" => json_encode($this->request->getPost()), "usertype" => $usertype,"userid" => $userid]);
            });
        }

        function pujian_load()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/pujian_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function pelanggarandanpujian_save()
        {
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/pelanggarandanpujian_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function pelanggarandanpujian_edit()
        {
            parent::_authEdit(function () {

                echo parent::_httpPost('/web/akademik/pelanggarandanpujian_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function pelanggarandanpujian_delete()
        {
            parent::_authDelete(function () {
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/pelanggarandanpujian_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End datamatapelajaran Done


    function palajarandiajar_load()
    {
        parent::_authLoad(function () {

            $session = \Config\Services::session();
            $usertype = $session->get('usertype');
            $userid = $this->session->get('id');


            echo parent::_httpPost('/web/akademik/palajarandiajar_load', [
                "param" => json_encode($this->request->getPost()),
                "userid" => $userid,
                "usertype" => $usertype
            ]);

            // echo parent::_httpPost('/web/akademik/palajarandiajar_load', ["param" => json_encode($this->request->getPost())]);
        });
    }


    function jadwalpendidik_load()
    {
        parent::_authLoad(function () {
            $data = $this->request->getPost();

            $data['id_pendidik'] = $this->session->get('id');
            echo parent::_httpPost('/web/akademik/jadwalpendidik_load', ["param" => json_encode($data)]);
        });
    }

    // Begin rekapnsp done

        function rekapnsp_load()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/rekapnsp_load', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function rekapnsp_posting()
        {
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/rekapnsp_posting', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function rekapnsp_save()
        {
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/rekapnsp_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function rekapnsp_savetmp(){
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/rekapnsp_savetmp', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function rekapnsp_edit()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/rekapnsp_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function rekapnsp_delete()
        {
            parent::_authDelete(function () {
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/rekapnsp_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End rekapnsp done

    // Begin datansp done

        function datansp_load()
        {
            parent::_authLoad(function () {
                $usertype = $this->session->get('usertype');
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/datansp_load', ["param" => json_encode($this->request->getPost()), "usertype" => $usertype,"userid" => $userid]);
            });
        }

        function datanspdetail_load()
        {
            parent::_authLoad(function () {

                echo parent::_httpPost('/web/akademik/datansp_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datanspdetail_setuju()
        {
            parent::_authLoad(function () {

                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                $data['approvetrn_at'] = date("Y-m-d H:i:s");
                $data['approvetrn_by'] = $this->session->get('id');
                $data[$data['field']] = $data['sts'];
                unset($data['field']);
                unset($data['sts']);
                // echo json_encode($data);
                echo parent::_httpPost('/web/akademik/datansp_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function datansp_save()
        {
            parent::_authInsert(function () {
                $userid = $this->session->get('id');
                $data = $this->request->getPost();

                echo parent::_httpPost('/web/akademik/datansp_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        function datansp_edit()
        {
            parent::_authEdit(function () {

                echo parent::_httpPost('/web/akademik/datansp_edit', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function rekapnsp_updatensp()
        {
            parent::_authEdit(function () {

                echo parent::_httpPost('/web/akademik/rekapnsp_updatensp', ["param" => json_encode($this->request->getPost())]);
            });
        }

        function datansp_delete()
        {
            parent::_authDelete(function () {
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/datansp_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
            });
        }

    // End datansp done

    // Begin verifnsp done

        function verifnsp_load()
        {
            parent::_authLoad(function () {
                $usertype = $this->session->get('usertype');
                $userid = $this->session->get('id');

                echo parent::_httpPost('/web/akademik/verifnsp_load', ["param" => json_encode($this->request->getPost()), "usertype" => $usertype,"userid" => $userid]);
            });
        }

        // function verifnspdetail_load()
        // {
        //     parent::_authLoad(function () {

        //         echo parent::_httpPost('/web/akademik/datansp_edit', ["param" => json_encode($this->request->getPost())]);
        //     });
        // }

        function verifnspdetail_setuju()
        {
            parent::_authLoad(function () {

                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                $data['approvebtl_at'] = date("Y-m-d H:i:s");
                $data['approvebtl_by'] = $this->session->get('id');

                // echo json_encode($data);
                echo parent::_httpPost('/web/akademik/datansp_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }

        // function verifnsp_save()
        // {
        //     parent::_authInsert(function () {
        //         $userid = $this->session->get('id');
        //         $data = $this->request->getPost();

        //         echo parent::_httpPost('/web/akademik/datansp_save', ["param" => json_encode($data), "userid" => $userid]);
        //     });
        // }

        // function verifnsp_edit()
        // {
        //     parent::_authEdit(function () {

        //         echo parent::_httpPost('/web/akademik/datansp_edit', ["param" => json_encode($this->request->getPost())]);
        //     });
        // }

        // function verifnsp_delete()
        // {
        //     parent::_authDelete(function () {
        //         $userid = $this->session->get('id');

        //         echo parent::_httpPost('/web/akademik/datansp_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        //     });
        // }

    // End datansp done
}
