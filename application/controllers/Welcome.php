<?php defined('BASEPATH') OR exit('direct script no access allowed');

class Welcome extends CI_Controller{
    function get_pdf_test($id)
  {
 
    require_once (APPPATH. 'vendor/autoload.php');
    $path = '/tmp/mpdf'; 
     if (!file_exists($path)) {
    mkdir($path, 0777, true);
     }
     $html = "<p>welcome</p>";
     $mpdf = new \mpdf\mpdf();
     $html = $this->load->view('admin/incidents/incidentsPdf',[],true);
     $mpdf->WriteHTML($html);
     $mpdf->Output(); 
     $mpdf->Output('incidentsPdf.pdf','D'); 

}
}