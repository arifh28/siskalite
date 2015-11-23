<?php
class PDF extends FPDF
{
    //Page header
    function Header()
    {
        $this->setFont('Arial','',10);
        $this->setFillColor(255,255,255);
        $this->cell(0,10,"Daftar Kader DPD IMM Jawa Tengah",0,0,'L',1);
        $this->cell(0,10,"Waktu Dicetak : " . date('d/m/Y'),0,1,'R',1);
        $this->Image(base_url().'asset/theme/immjateng/images/bg-image.png', 10, 25,'20','20','png');

        $this->Ln(12);
        $this->setFont('Arial','',14);
        $this->setFillColor(255,255,255);
        $this->cell(25,6,'',0,0,'C',0);
        $this->cell(100,6,'Daftar Kader DPD IMM Jawa Tengah',0,1,'L',1);
        $this->cell(25,6,'',0,0,'C',0);
        $this->cell(100,6,"Sampai pada tanggal ".date('d M Y'),0,1,'L',1);


        $this->Ln(5);
        $this->setFont('Arial','',10);
        $this->setFillColor(230,230,200);
        $this->cell(10,6,'No.',1,0,'C',1);
        $this->cell(60,6,'Nama Lengkap',1,0,'C',1);
        $this->cell(34,6,'Tanggal Lahir',1,0,'C',1);
        $this->cell(115,6,'Alamat',1,0,'C',1);
        $this->cell(20,6,'Komisariat',1,0,'C',1);
        $this->cell(30,6,'Perguruan Tinggi',1,0,'C',1);
        $this->cell(20,6,'PC IMM',1,1,'C',1);

    }

    function Content($data)
    {
        $ya = 46;
        $rw = 6;
        $no = 1;
        foreach ($data as $key) {
            $this->setFont('Arial','',10);
            $this->setFillColor(255,255,255);
            $this->cell(10,10,$no,1,0,'L',1);
            $this->cell(60,10,$key->nama,1,0,'L',1);
            $this->cell(34,10,$key->tgl_lahir,1,0,'L',1);
            $this->cell(115,10,$key->alamat,1,0,'L',1);
            $this->cell(20,10,$key->komisariat,1,0,'L',1);
            $this->cell(30,10,$key->perti,1,0,'L',1);
            $this->cell(20,10,$key->nama_sekolah,1,1,'L',1);
            $ya = $ya + $rw;
            $no++;
        }

    }
    function Footer()
    {
        //atur posisi 1.5 cm dari bawah
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10,$this->GetY(),300,$this->GetY());
        //Arial italic 9
        $this->SetFont('Arial','I',9);
        $this->Cell(0,10,'SISKA DPD IMM Jawa Tengah oleh IMM Setengah Abad ' . date('Y'),0,0,'L');
        //nomor halaman
        $this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}

$pdf = new PDF('L','mm',array(215,310));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output();