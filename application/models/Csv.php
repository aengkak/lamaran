<?php
class Csv extends CI_Model {
  public function import() {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $level = ("Y1");
    $user_id = $this->session->userdata('user_id');
    $status = 1;
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
          {
            $file = fopen($filename, "r");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                    $data = array(
                       'nama' => $importdata[0],
           					   'tgl_lahir' => $importdata[1],
           					   'gender' => $importdata[2],
           					   'agama' => $importdata[3],
           					   'kota' => $importdata[4],
           					   'pendidikan' => $importdata[5],
           					   'no_telp' => $importdata[6],
           					   'no_wa' => $importdata[7],
           					   'email' => $importdata[8],
           					   'jabatan_id' => $importdata[9],
                       'tgl' => $date,
                       'level' => $level,
                       'status' => $status
                        );
                        $this->db->insert('lamaran', $data);
                        $next = $this->db->insert_id();
          							$data1 = array('user_id' => $user_id, 'lamaran_id' => $next, 'isi' => "Manual",
          					                  'rate' => $level, 'tgl_komen' => $date);
          							$this->db->insert('komentar', $data1);
          							$this->db->insert_id();
             }
            fclose($file);
          }
  }
}
