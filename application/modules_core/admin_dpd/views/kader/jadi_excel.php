<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=daftar_kader_imm_jateng". date('dmY_His').".xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('black'); // set warna huruf
$header->set_border_color('black'); // set warna border

$header->set_size(14); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$worksheet1->write_string(0,0,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,5); // Set lebar kolom
$worksheet1->write_string(0,1,'Tanggal Lahir',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,20); // Set lebar kolom 
$worksheet1->write_string(0,2,'Alamat',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,50); // Set lebar kolom
$worksheet1->write_string(0,3,'Komisariat',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,15); // Set lebar kolom
$worksheet1->write_string(0,4,'Perguran Tinggi',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,15); // Set lebar kolom
$worksheet1->write_string(0,5,'Pimpinan Cabang',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,15); // Set lebar kolom

$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 1;
foreach ($data as $key) {
    $worksheet1->write_string($row,0,  $key->nama ,$content);
    $worksheet1->write_string($row,1,  $key->tgl_lahir ,$content);
    $worksheet1->write_string($row,2,  $key->alamat ,$content);
    $worksheet1->write_string($row,3,  $key->komisariat ,$content);
    $worksheet1->write_string($row,4,  $key->perti ,$content);
    $worksheet1->write_string($row,5,  $key->nama_sekolah ,$content);
    $row++;
}

$workbook->close();

/* 
 * Created by Pudyasto Adi Wibowo
 * Email : mr.pudyasto@gmail.com
 */


