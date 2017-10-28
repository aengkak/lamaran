<?php
class Importcsv extends CI_Model
 {
function __construct()
{

parent::__construct();


}
 function uploadcsv()
 {
   date_default_timezone_set('Asia/Jakarta');
   $date = date('Y-m-d');
   $level = ("Y1");
  $fp = fopen($_FILES['file']['tmp_name'],'r') or die("can't open file");
					  while($csv_line = fgetcsv($fp,1024))
					  {
					for ($i = , $j = count($csv_line); $i < $j; $i++)
					  {


					   $insert_csv = array();
					   $insert_csv['nama'] = $csv_line[0];
					   $insert_csv['tgl_lahir'] = $csv_line[1];
					   $insert_csv['gender'] = $csv_line[2];
					   $insert_csv['agama'] = $csv_line[3];
					   $insert_csv['alamat'] = $csv_line[4];
					   $insert_csv['kota'] = $csv_line[5];
					   $insert_csv['pendidikan'] = $csv_line[6];
					   $insert_csv['no_telp'] = $csv_line[7];
					   $insert_csv['no_wa'] = $csv_line[8];
					   $insert_csv['email'] = $csv_line[9];
					   $insert_csv['jabatan_id'] = $csv_line[10];
             $insert_csv['tgl'] = $date;
             $insert_csv['level'] = $level;

					  }

					  $data = array(
					   'nama' => $insert_csv['nama'] ,
					   'tgl_lahir' => $insert_csv['tgl_lahir'],
					   'gender' => $insert_csv['gender'],
					   'agama' => $insert_csv['agama'] ,
					   'alamat' => $insert_csv['alamat'],
					   'kota' => $insert_csv['kota'],
					   'pendidikan' => $insert_csv['pendidikan'] ,
					   'no_telp' => $insert_csv['no_telp'] ,
					   'no_wa' => $insert_csv['no_wa'],
					   'email' => $insert_csv['email'],
					   'jabatan_id' => $insert_csv['jabatan_id'],
             'tgl' => $insert_csv['tgl'],
             'level' => $insert_csv['level']);
	      $this->db->insert('lamaran', $data);
        $this->db->insert_id();
				     }
                   fclose($fp) or die("can't close file");
	       /*$data['success']="success";
	       return $data;*/

	          }
}
