<?php
class excel extends CI_Controller {
    function __construct(){
  parent::__construct();
          $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

 public function index() {
    $this->load->view('excel');
 }

 public function upload(){
  $fileName = $this->input->post('file', TRUE);

  $config['upload_path'] = './upload/'; 
  $config['file_name'] = $fileName;
  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
  $config['max_size'] = 10000;

  $this->load->library('upload', $config);
  $this->upload->initialize($config); 
  
  if (!$this->upload->do_upload('file')) {
   $error = array('error' => $this->upload->display_errors());
   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
   redirect('Welcome'); 
  } else {
   $media = $this->upload->data();
   $inputFileName = 'upload/'.$media['file_name'];
   
   try {
    $inputFileType = IOFactory::identify($inputFileName);
    $objReader = IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
   } catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
   }

   $sheet = $objPHPExcel->getSheet(0);
   $highestRow = $sheet->getHighestRow();
   $highestColumn = $sheet->getHighestColumn();

   for ($row = 2; $row <= $highestRow; $row++){  
     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
       NULL,
       TRUE,
       FALSE);
     $data = array(
        "nip"=> $rowData[0][1],
                    "nama"=> $rowData[0][2],
                    "golongan"=> $rowData[0][3],
                    "jabatan"=> $rowData[0][4],
                    "pendidikan"=> $rowData[0][5],
                    "th_lulus"=> $rowData[0][6],
                    "kepakaran"=> $rowData[0][7],
                    "status_bekerja"=> $rowData[0][8],
                    "jenis"=> $rowData[0][9],
                    "status_kepegawaian"=> $rowData[0][10],
                    "fakultas"=> $rowData[0][11],
                    "departemen"=> $rowData[0][12],
                    "program_studi"=> $rowData[0][13],
    );
    $this->db->insert("dosen",$data);
   } 
   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
   redirect('excel');
  }  
 } 
}