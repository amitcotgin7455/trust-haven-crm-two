<?php 
require FCPATH.'vendor/autoload.php';
class Testing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function print()
    {
        $html = $this->load->view('receipt_pdf','',true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>0,
            'margin_right'=>0,
            'margin_left'=>0,
            'margin_bottom'=>0,
        ]);
        // $html = '<img src="https://www.trusthavensolution.com/assets/images/ths-logo.png"/>';
       // $mpdf->debug = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        // die;
        // $mpdf->Output('welcome.pdf','D');
    }
}