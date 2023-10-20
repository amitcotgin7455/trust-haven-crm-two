<?php
defined('BASEPATH') or exit('direct script no access allowed');
require FCPATH . 'vendor/autoload.php';

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class View_invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        // $this->load->library('auth');
    }

    public function index()
    {
        $data['title'] =  "Payment Invoice";
        $data['active4'] =  "Active";
        $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
        if ($data['invoice'][0]->payment_status == 1) {
            $get_firstname_invoice = $data['invoice'][0]->first_name;
            $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
            $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable;
            $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
            $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
            $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
            $this->load->view('invoice/paymentinvoice', $data);
        } else {
            $this->load->view('invoice/paymentpaid', $data);
        }
    }
    public function pay()
    {
        $data['title'] =  "Payment Invoice";
        $data['active4'] =  "Active";
        $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
        if ($data['invoice'][0]->payment_status == 1) {
            $get_firstname_invoice = $data['invoice'][0]->first_name;
            $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
            $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
            $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
        
            $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
            $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
            $this->load->view('invoice/pay', $data);
        } else {
            $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
            $get_firstname_invoice = $data['invoice'][0]->first_name.' ' .$data['invoice'][0]->last_name;
            $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
            $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
            $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
            $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
            $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
            $this->load->view('invoice/viewinvoice', $data);
        }
    }

    public function gateway()
    {
        define("AUTHORIZENET_LOG_FILE", "phplog");
        // Common setup for API credentials  
        $card_number = str_replace('-', '', $this->input->post('card_number'));
        $expiry_month = $this->input->post('expiry_month');
        $expiry_year = $this->input->post('expiry_year');
        $cvv = $this->input->post('cvv');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip_code = $this->input->post('zip_code');
        $payment_status = $this->input->post('payment_status');
        $total_amount = intval($this->input->post('total_amount'));
        $id =  $this->input->post('id');
        $invoice_number =  $this->input->post('invoice_number');
        // authenticate 
        @$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();

        // original live credential
        // $merchantAuthentication->setName("6ZR99ZhQ9r7");
        // $merchantAuthentication->setTransactionKey("77cU9VtzQLa87u27");

        // localhost credential  
        $merchantAuthentication->setName("9FBC3YSbs7D");
        $merchantAuthentication->setTransactionKey("5vJ7aZu5FW7s857D");

        // local test sunil sir credential  
        // $merchantAuthentication->setName("6ZR99ZhQ9r7");
        // $merchantAuthentication->setTransactionKey("9R47jbD359MA5ne5");

        $refId = 'ref' . time();
        // Create the payment data for a credit card
        @$creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($card_number);
        $creditCard->setExpirationDate($expiry_year . '-' . $expiry_month);
        @$paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);
        // Create a transaction
        @$transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($total_amount);
        $transactionRequestType->setPayment($paymentOne);
        @$request = new AnetAPI\CreateTransactionRequest();
        @$request->setMerchantAuthentication($merchantAuthentication);
        @$request->setRefId($refId);
        @$request->setTransactionRequest($transactionRequestType);
        @$controller = new AnetController\CreateTransactionController($request);
        @$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
        $payment_info = array();
        $billing_info = array();
        $transaction_info = array();
        if ($response != null) {
            $payment_info = array(
                'card_number' => $card_number,
                'expiry' => $expiry_month . '-' . $expiry_year,
                'cvv' => $cvv,
                'created_date' => date('Y-m-d h:i:s')
            );

            $billing_info = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip_code' => $zip_code,
                'created_date' => date('Y-m-d h:i:s')
            );
            $this->db->trans_begin();
            $payment_info_id = $this->Invoice_model->payment_info($payment_info);
            $billing_info_id = $this->Invoice_model->billing_info($billing_info);
            // $data['user_detail'] = $this->auth->user_info();
            $tresponse = $response->getTransactionResponse();
            if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
                "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
                //  $this->load->view('invoice/success');
                //    $array = array('success'   => 'Successfull payment',);
                //    echo json_encode($array);
                $transaction_detail = array(
                    // 'user_id' => $data['user_detail']->id,
                    'payment_id' => $payment_info_id,
                    'billing_id' => $billing_info_id,
                    'transaction_id' => $tresponse->getTransId(),
                    'invoice_id' => $id,
                    'invoice_number' => $invoice_number,
                    'created_date' => date('Y-m-d h:i:s')
                );
                $this->Invoice_model->transaction_info($transaction_detail);
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('done', 'Invoice Not Created');
                    redirect(base_url() . 'list-invoice');
                } else {
                    $this->db->trans_commit();
                }

                $this->load->model('Payment_model');
                $this->Payment_model->updatePaymentstatus($id);
                // get total amount 
                $get_total_due_amount = $this->Invoice_model->gettotaldueamount($id);
                $set_total_due_amount = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
                // get invoice number and date 
                $data['invoice'] = $this->Invoice_model->getInvoice($id);
                $invoice_number = $data['invoice'][0]->invoice_number;
                $first_name = $data['invoice'][0]->first_name;
                $last_name = $data['invoice'][0]->last_name;
                $payment_date = $data['invoice'][0]->payment_date;
                $email = $data['invoice'][0]->email;
                $id = $data['invoice'][0]->id;
                $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($first_name);
                $first_name_get = $data['getnameinvoice'][0]->first_name;
                $invoice_name =$first_name_get. $last_name;
                $this->send_reciept($set_total_due_amount,$invoice_number,$payment_date,$id,$email,$invoice_name);
                echo 1;
                // prx($tresponse);
            } else {
                echo 2;
                // prx($tresponse);
            }
        } else {
            echo 3;
        }
        //tsClientReferenceInformation($cliRefInfoArr);
    }

    public function send_reciept($set_total_due_amount,$invoice_number,$payment_date,$id,$email,$invoice_name)

    {
        $activeMail = active_mail()[0];
        // prx($activeMail);
        $date =   date("d M Y", strtotime($payment_date)); 
        // send email invoice 
        $toName = $invoice_name;
        $toEmail = $email;
        $fromName = $activeMail->sender_name;
        $fromEmail = $activeMail->sender_email;
        $subject = 'Trust Haven Payment Recevied';
        //  $fileName =  $invoice_number . '.pdf';
        //  $fullPath =  base_url() . 'file/' . $invoice_number . '.pdf';
        $htmlMessage = '
        <div style="height: 800px;  background-color: rgb(251,251,251); max-width: 600px;margin: auto;padding: 0 3%;">
        <div style=" max-width: 560px;padding-top: 35px; height: 70px;text-align:center;background: #4190f2; display: block; position:relative; top:30px; color: white; font-weight: 900; font-size: 20px;">
            <span style="position: relative;top: 40px;">Payment Received</span>
        </div>
        <div>
            <p style="position: relative;top: 40px; font-size: 16px;">Dear '.$invoice_name.',</p>
            <p style="position: relative;top: 40px;">Thank you for your payment. It was a pleasure doing business with you. We look forward to work together again!</p>
        </div>
        <br>
        <div style="background-color: yellowgreen; height: 450px; position: relative;top: 40px; padding: 3%;background: #fefff1;border: 1px solid #e8deb5;color: #333;">
            <div
                style="position: relative;top: 10px;    padding: 0 3% 3%;border-bottom: 1px solid #e8deb5;text-align: center;">
                <p style="text-align: center; font-size: large; font-weight: bold;">Payment Received</p>
                <p style="text-align: center; font-size: large; font-weight: bold;color: green;">$'.$set_total_due_amount.'</p>
            </div>
            <div
                style="display: flex; padding: 50px 90px 0;  ustify-content: space-around;">
                <div>
                    <p style="text-align:start; margin-left:50px;">Invoice No.</p>
                    <p style="text-align:start; margin-left:50px;">Payment Date</p>
                </div>
                <div>
                    <p style="text-align:start; font-weight:900; margin-left:80px;">'.$invoice_number.'</p>
                    <p style="text-align:start; font-weight:900; margin-left:80px;">'.$date.'</p>
                </div>
            </div>
            <div>
                <a href="' . base_url('view_invoice/viewinvoice?id=' . base64_encode($id) . '') . '"><button style=" background-color: #4dcf59;border: 1px solid #49bd54;text-align: center;min-width: 140px; margin-left: 190px;color: #fff;text-decoration: none;padding: 10px 20px;margin-top: 30px;">View Invoice</button></a>
            </div>
            <div>
            </div>
            <p style="text-align:start;">Regards, <br>
            <span style="color: #8c8c8c;">Trust Haven Solution Inc.</span><br>
        </div>
    </div>';
        $data = array(
            "sender" => array(
                "email" => $fromEmail,
                "name" => $fromName
            ),
            "to" => array(
                array(
                    "email" => $toEmail,
                    "name" => $toName
                )
            ),
            // "attachment" => array(
            //     array(
            //         "url" => $fullPath,
            //         "name" => $fileName 
            //         )
            // ), 
            "subject" => $subject,
            "htmlContent" => '<html><head></head><body><p>' . $htmlMessage . '</p></p></body></html>'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Api-Key: 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';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        
        curl_close($ch);
        // send email invoice 


    }

    function paynow()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('card_number', 'Card Number', 'required');
        $this->form_validation->set_rules('cvv', 'CVV', 'required');
        $this->form_validation->set_rules('expiry_month', 'Expiry Month', 'required');
        $this->form_validation->set_rules('expiry_year', 'Expiry Year', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        if ($this->form_validation->run() == FALSE) {
            $array = array(
                'error'   => true,
                'card_number' => form_error('card_number'),
                'cvv' => form_error('cvv'),
                'expiry_month' => form_error('expiry_month'),
                'expiry_year' => form_error('expiry_year'),
                'first_name' => form_error('first_name'),
                'last_name' => form_error('last_name'),
                'address' => form_error('address'),
                'city' => form_error('city'),
                'zip_code' => form_error('zip_code'),
                'state' => form_error('state'),
                'country' => form_error('country')
            );
            echo json_encode($array);
        } else {
            $this->gateway();
        }
    }

    public function payment_success()
    {
        $this->load->view('invoice/success');
    }

    public function payment_failed()
    {
        $this->load->view('invoice/failed');
    }

    public function viewinvoice()
    {   
        $data['title'] =  "View Invoice";
        $data['active4'] =  "Active";
        $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
        if(empty($data['invoice']))
        {
            echo '<h4>This invoice does not exist';
            exit();
        }
        $get_firstname_invoice = $data['invoice'][0]->first_name;
        $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
        $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
        $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
        $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
        $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
        $this->load->view('invoice/viewinvoice', $data);
    }
}
