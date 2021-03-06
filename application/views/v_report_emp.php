<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Group 15');
$pdf->SetTitle('EMPLOYEE LIST');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$date = date('Y/m/d H:i:s');
$outlet = $this->session->userData('loggerOutletName');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'WRF HOLDINGS (PVT) LTD.'," Outlet -  $outlet \n On $date ");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage('L','A4');

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
// $txt = 'DATE:   ';
// $txt1 = 'AREA WORKED: ';
// $txt2 = 'VEHICLE NO: ';

// $pdf->MultiCell(40, 10, $txt, 0, 'L', 0, 0, '', '', true);
// $pdf->MultiCell(80, 10, $txt1, 0, 'L', 0, 0, '', '', true);
// $pdf->MultiCell(45, 10, $txt2, 0, 'L', 0, 1, '', '', true);



$pdf->Ln(5);

$title1 = <<<EOT
<h3>EMPLOYEE INFORMATION</h3>
EOT;
$pdf->WriteHTMLCell(0,0,'','',$title1,0,1,0,true,'C',true);

$table1 = '<table style="border:1px solid #000; padding:4px; width: 100%;">';
$table1 .='<tr>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">#</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Employee ID</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Name with Initials</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">NIC</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">DOB</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Contact No</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Address</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Outlet ID</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Position</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Joined Date</th>
             <th bgcolor="#B2BEB5" style="border:1px solid #000;">Email</th>

                          
              </tr>';
$no=1;
foreach ($emp as $row) {
$table1 .='<tr>
            <td style="border:1px solid #000;">'.$no++.'</td>
            <td style="border:1px solid #000;">'.$row->idEmployee.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeNameWithInitials.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeNIC.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeBirthdate.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeContactNumber.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeAddress.'</td>
            <td style="border:1px solid #000;">'.$row->Outlet_idOutlet.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeePosition.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeJoinedDate.'</td>
            <td style="border:1px solid #000;">'.$row->EmployeeEmail.'</td>

          </tr>';
      }      

$table1 .='</table>';

$pdf->WriteHTMLCell(0,0,'','',$table1,0,1,0,true,'C',true);

$pdf->Ln(5);

$log= $this->session->userdata('loggerName');
$logrole= $this->session->userdata('loggerRole');
$gen = <<<EOT
<h4>This Report was Generated by $log ($logrole) </h4>
EOT;


$pdf->WriteHTMLCell(0,0,'','',$gen,0,1,0,true,'L',true);

// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------


ob_clean();

//Close and output PDF document
$pdf->Output('example_005.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
