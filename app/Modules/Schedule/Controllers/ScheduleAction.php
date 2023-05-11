<?php namespace App\Modules\Schedule\Controllers;

use App\Modules\Schedule\Models\ScheduleModel;
use App\Core\BaseController;

class ScheduleAction extends BaseController
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

    // Begin Data Kelompok Taruna

    function datakelompoktaruna_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/datakelompoktaruna_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakelompoktaruna_save()
    {   
        if (!isset($_POST['id_taruna'])) {
            $response = [ 'success' => false , 'message' => 'Mohon Tambahkan Taruna' ];
            echo json_encode($response);
        } else {
        
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = array();

                for ($i=0; $i < count($_POST['id_taruna']); $i++) { 
                    $dataarray = array(
                                    'id' => $_POST['id'][$i],
                                    'id_taruna' => $_POST['id_taruna'][$i],
                                    'id_kelompok' => $_POST['id_kelompok'],
                                    'id_tingkat' => $_POST['id_tingkat'],
                                    'id_semester' => $_POST['id_semester'],
                                    'id_jabatan' => $_POST['id_jabatan'],
                                    'tahun_ajaran_awal' => $_POST['tahun_ajaran_awal'],
                                    'tahun_ajaran_akhir' => $_POST['tahun_ajaran_awal']+1
                                );
                    array_push($data, $dataarray);
                } 
                if (isset($_POST['is_deleted'])==1) {
                    for ($i=0; $i < count($_POST['is_deleted']); $i++) { 
                        $dataarray = array(
                                        'id' => $_POST['is_deleted'][$i],
                                        'is_deleted' => 1
                                    );
                        array_push($data, $dataarray);
                    } 
                }
                // echo json_encode($data);
                echo parent::_httpPost('/web/schedule/datakelompoktaruna_save', ["param" => json_encode($data), "userid" => $userid]);
            });
        }
    }

    function datakelompoktaruna_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/datakelompoktaruna_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datakelompoktaruna_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/datakelompoktaruna_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Kelompok Taruna

    // Begin Data Bahan Ajar

    function databahanajar_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/databahanajar_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function databahanajar_save()
    {   
        
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = array();

                for ($i=0; $i < count($_POST['judul']); $i++) { 
                    $dataarray = array(
                                    'id' => $_POST['id'][$i],
                                    'judul' => $_POST['judul'][$i],
                                    'deskripsi' => $_POST['deskripsi'][$i],
                                    'pertemuan_ke' => $_POST['pertemuan_ke'][$i],
                                    'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
                                    'id_user_pendidik' => $_POST['id_user_pendidik'],
                                    'id_tingkat' => $_POST['id_tingkat'],
                                    'id_semester' => $_POST['id_semester'],
                                    'tahun_ajaran' => $_POST['tahun_ajaran']
                                );
                    array_push($data, $dataarray);
                } 
                if (isset($_POST['is_deleted'])==1) {
                    for ($i=0; $i < count($_POST['is_deleted']); $i++) { 
                        $dataarray = array(
                                        'id' => $_POST['is_deleted'][$i],
                                        'is_deleted' => 1
                                    );
                        array_push($data, $dataarray);
                    } 
                }
                
                // echo json_encode($data);
                echo parent::_httpPost('/web/schedule/databahanajar_save', ["param" => json_encode($data), "userid" => $userid]);
            });

    }

    function databahanajar_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/databahanajar_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function databahanajar_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/databahanajar_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }

    // End Data Bahan Ajar


    // Begin Data pengampu hanjar

    function datapengampuhanjar_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/datapengampuhanjar_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapengampuhanjar_save()
    {   
        
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = array();

                for ($i=0; $i < count($_POST['id_pendidik']); $i++) { 
                    $dataarray = array(
                                    'id' => $_POST['id'][$i],
                                    'id_pendidik' => $_POST['id_pendidik'][$i],
                                    'is_ketua_tim' => isset($_POST['is_ketua_tim'][$i])=='on'? "1": "0",
                                    'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
                                    'id_batalyon' => $_POST['id_batalyon']
                                );
                    array_push($data, $dataarray);
                } 
                if (isset($_POST['is_deleted'])==1) {
                    for ($i=0; $i < count($_POST['is_deleted']); $i++) { 
                        $dataarray = array(
                                        'id' => $_POST['is_deleted'][$i],
                                        'is_deleted' => 1,
                                        'is_ketua_tim' => 0
                                    );
                        array_push($data, $dataarray);
                    } 
                }
                
                // echo json_encode($data);
                echo parent::_httpPost('/web/schedule/datapengampuhanjar_save', ["param" => json_encode($data), "userid" => $userid]);
            });

    }

    function datapengampuhanjardetail_load() 
    {
        parent::_authLoad(function(){
            
            echo parent::_httpPost('/web/schedule/datapengampuhanjar_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }
    
    function datapengampuhanjar_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/datapengampuhanjar_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datapengampuhanjar_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/datapengampuhanjar_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data pengampu hanjar


    // Begin Data datajadwal

    function datajadwal_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/datajadwal_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function datajadwal_save()
    {   
        
            // parent::_authInsert(function(){
            //     $userid = $this->session->get('id');
            //     $data = array();

            //     for ($i=0; $i < count($_POST['id_pendidik']); $i++) { 
            //         $dataarray = array(
            //                         'id' => $_POST['id'][$i],
            //                         'id_pendidik' => $_POST['id_pendidik'][$i],
            //                         'is_ketua_tim' => isset($_POST['is_ketua_tim'][$i])==1? $_POST['is_ketua_tim'][$i] : "0",
            //                         'id_mata_pelajaran' => $_POST['id_mata_pelajaran'],
            //                         'tahun_ajaran_awal' => $_POST['tahun_ajaran_awal'],
            //                         'tahun_ajaran_akhir' => $_POST['tahun_ajaran_awal']+1
            //                     );
            //         array_push($data, $dataarray);
            //     } 
            //     if (isset($_POST['is_deleted'])==1) {
            //         for ($i=0; $i < count($_POST['is_deleted']); $i++) { 
            //             $dataarray = array(
            //                             'id' => $_POST['is_deleted'][$i],
            //                             'is_deleted' => 1,
            //                             'is_ketua_tim' => 0
            //                         );
            //             array_push($data, $dataarray);
            //         } 
            //     }
                
            //     // echo json_encode($data);
            //     echo parent::_httpPost('/web/schedule/datajadwal_save', ["param" => json_encode($data), "userid" => $userid]);
            // });

        parent::_authEdit(function(){
            
            $rs = parent::_httpPost('/web/schedule/datajadwal_load', ["param" => json_encode($this->request->getPost())]);
            $decoders = json_decode($rs, true);

            if ($decoders['success']) {
                view('App\Modules\Schedule\Views\datajadwal_data', $decoders);
            } else {
                echo $rs;
            }
        });

    }

    function datajadwal_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/datajadwal_load', ["param" => json_encode($this->request->getPost())]);
        });
        // $data = array(
        //     "header" => array( 
        //                         "kelompok" => array( array("id" => 'aa',"kelompok"=>"Kelompok A1") , array("id" => 'bb',"kelompok"=>"Kelompok A2"), array("id" => 'cc',"kelompok"=>"Kelompok A3")),
        //                         "ruangan" => array("SATYA BRATA 1", '' , 'a' )

        //                      ),
        //     "body" => array(
        //                     array( "tanggal" => "2020-01-08",
        //                            "isi" => array(
        //                                         array(
        //                                             "jam_mulai" => "04:40",
        //                                             "jam_selesai" => "05:30",
        //                                             "id_pertemuan" => 1,
        //                                             "unit_pertemuan" => "-",
        //                                             "aa" => "",
        //                                             "bb" => "matapelajaran 2",
        //                                             "cc" => "1"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "07:15",
        //                                             "jam_selesai" => "08:45",
        //                                             "id_pertemuan" => 2,
        //                                             "unit_pertemuan" => "I",
        //                                             "aa" => "matapelajaran 1",
        //                                             "bb" => "",
        //                                             "cc" => "2"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "08:55",
        //                                             "jam_selesai" => "10:25",
        //                                             "id_pertemuan" => 3,
        //                                             "unit_pertemuan" => "II",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "3"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "10:35",
        //                                             "jam_selesai" => "12:05",
        //                                             "id_pertemuan" => 4,
        //                                             "unit_pertemuan" => "III",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "4"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "12:15",
        //                                             "jam_selesai" => "13:50",
        //                                             "id_pertemuan" => 5,
        //                                             "unit_pertemuan" => "-",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "5"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "14:00",
        //                                             "jam_selesai" => "15:30",
        //                                             "id_pertemuan" => 6,
        //                                             "unit_pertemuan" => "IV",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "6"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "15:45",
        //                                             "jam_selesai" => "17:15",
        //                                             "id_pertemuan" => 7,
        //                                             "unit_pertemuan" => "V",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "7"
        //                                         )
        //                            )
        //                     ),
        //                     array( "tanggal" => "2020-01-09",
        //                            "isi" => array(
        //                                         array(
        //                                             "jam_mulai" => "04:40",
        //                                             "jam_selesai" => "05:30",
        //                                             "id_pertemuan" => 1,
        //                                             "unit_pertemuan" => "-",
        //                                             "aa" => "",
        //                                             "bb" => "matapelajaran 2",
        //                                             "cc" => "1"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "07:15",
        //                                             "jam_selesai" => "08:45",
        //                                             "id_pertemuan" => 2,
        //                                             "unit_pertemuan" => "I",
        //                                             "aa" => "matapelajaran 1",
        //                                             "bb" => "",
        //                                             "cc" => "2"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "08:55",
        //                                             "jam_selesai" => "10:25",
        //                                             "id_pertemuan" => 3,
        //                                             "unit_pertemuan" => "II",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "3"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "10:35",
        //                                             "jam_selesai" => "12:05",
        //                                             "id_pertemuan" => 4,
        //                                             "unit_pertemuan" => "III",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "4"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "12:15",
        //                                             "jam_selesai" => "13:50",
        //                                             "id_pertemuan" => 5,
        //                                             "unit_pertemuan" => "-",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "5"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "14:00",
        //                                             "jam_selesai" => "15:30",
        //                                             "id_pertemuan" => 6,
        //                                             "unit_pertemuan" => "IV",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "6"
        //                                         ),
        //                                         array(
        //                                             "jam_mulai" => "15:45",
        //                                             "jam_selesai" => "17:15",
        //                                             "id_pertemuan" => 7,
        //                                             "unit_pertemuan" => "V",
        //                                             "aa" => "",
        //                                             "bb" => "",
        //                                             "cc" => "7"
        //                                         )
        //                            )
        //                     )
        //                 )


        // );
        

        // $this->load->view('datajadwal_data');
    }

    function datajadwal_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/datajadwal_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data pengampu hanjar
    
    // Begin Data datajadwal

    function kelompokruangkelas_load()
    {
        parent::_authLoad(function(){

            echo parent::_httpPost('/web/schedule/kelompokruangkelas_load', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function kelompokruangkelas_save()
    {   
        
            parent::_authInsert(function(){
                $userid = $this->session->get('id');
                $data = $this->request->getPost();
                
                // echo json_encode($data);
                echo parent::_httpPost('/web/schedule/kelompokruangkelas_save', ["param" => json_encode($data), "userid" => $userid]);
            });

    }

    function kelompokruangkelas_edit()
    {   
        parent::_authEdit(function(){
            
            echo parent::_httpPost('/web/schedule/kelompokruangkelas_edit', ["param" => json_encode($this->request->getPost())]);
        });
    }

    function kelompokruangkelas_delete()
    {   
        parent::_authDelete(function(){
            $userid = $this->session->get('id');

            echo parent::_httpPost('/web/schedule/kelompokruangkelas_delete', ["param" => json_encode($this->request->getPost()), "userid" => $userid]);
        });
    }
    // End Data pengampu hanjar
}
