<?php 
require FCPATH.'vendor/autoload.php';
class Receipt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function print()
    {
        $data['title'] = "pdf libr";
        $html = $this->load->view('receipt_pdf',$data,true);
        $mpdf = new \Mpdf\Mpdf([
            'format'=>'A4',
            'margin_top'=>0,
            'margin_right'=>0,
            'margin_left'=>0,
            'margin_bottom'=>0,
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();die;
        // $mpdf->Output(FCPATH.'file/invoice.pdf','F');
        // echo $Ledger_Group_Report = base_url().'file/invoice.pdf';

    }
}