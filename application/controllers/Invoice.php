<?php
require FCPATH . 'vendor/autoload.php';
defined('BASEPATH') or exit('direct script no access allowed');
class Invoice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('auth');
        $this->load->model('Invoice_model');
        $this->load->model('Payment_model');
        $data['user_detail'] = $this->auth->user_info();

        if($data['user_detail']->role_id == 2){
            redirect(base_url());
        }
    }

    public function index()
    {
        
        $data['title'] =  "List Invoice";
        $data['active4'] =  "Active";
        $data['user_detail'] = $this->auth->user_info();
        $link = base_url() . "list-invoice";
        $limit = 15;
        $total_record = array();
        $segment = $this->input->get('page');
        if ($data['user_detail']->role_id == 1 || $data['user_detail']->role_id == 4 || $data['user_detail']->role_id == 3) {
            if (!empty($this->input->get('s'))) {
                $total_record =  $this->Invoice_model->get_count_invoice_search_admin($this->input->get('s'));                
            } else {
                $total_record =  $this->Invoice_model->get_count_invoice_admin();
            }
            if (!empty($this->input->get('s'))) {
                $result = $this->Invoice_model->get_result_invoice_search_admin($limit, $segment, $this->input->get('s'));
            } else {
                $result = $this->Invoice_model->get_result_invoice_admin($limit, $segment);
         
            }
            $parms = array(
                'limit' => $limit,
                'segment' => $segment,
                'total_record' => $total_record,
                'result'       => $result,
                'link'         => $link
            );
            $data['pagination'] = $this->pagination_setup($parms);
            $data['result']   =  $result;
        } else {
            $total_record =  $this->Invoice_model->get_count_invoice($data['user_detail']->id);
            $result = $this->Invoice_model->get_result_invoice($limit, $segment, $data['user_detail']->id);
            $parms = array(
                'limit' => $limit,
                'segment' => $segment,
                'total_record' => $total_record,
                'result'       => $result,
                'link'         => $link
            );
            $data['pagination'] = $this->pagination_setup($parms);
            $data['result']   =  $result;
        }
        $data['segment']    = $segment;
        $data['links']    = $data['pagination']['links'];
        $this->load->view('include/header', $data);
        $this->load->view('invoice/listinvoice', $data);
        $this->load->view('include/footer',$data);
    }


    public function create()
    {
        if (!empty($this->input->get('id'))) {
            $data['title'] =  "Update Invoice";
            $data['active4'] =  "Active";
            $data['result'] = $this->Invoice_model->getDetailInvoice(base64_decode($this->input->get('id')));
            $data['select_name'] = $this->Invoice_model->fetchSelectName();
            $this->load->view('include/header', $data);
            $this->load->view('invoice/createinvoice', $data);
            $this->load->view('include/footer',$data);
        } else {
            $data['title'] =  "Create Invoice";
            $data['user_detail'] = $this->auth->user_info();
            $data['select_name'] = $this->Invoice_model->fetchSelectName();
            $data['invoice_numer'] = $this->Invoice_model->getinvoice_number();
            $data['get_invoice_number'] = $data['invoice_numer'][0]->id;
            $this->load->view('include/header', $data);
            $this->load->view('invoice/createinvoice', $data);
            $this->load->view('include/footer',$data);
        }
    }
    public function createtwo()
    {
        $month_end = strtotime('last day of this month', time());
        $data['month_end_date'] = date('Y-m-d', $month_end);
        $today_date        = date('Y-m-d');
        $date1=date_create($data['month_end_date']);
        $date2=date_create($today_date);
        $diff=date_diff($date2,$date1);
        $data['month_end'] = $diff->format("%R%a days");
        
        $getNext =  date('Y-m-d', strtotime('first day of +1 month'));
        
        $lastdate = strtotime(date("Y-m-t", strtotime($getNext) ));
        $nextMonthLastday = date("Y-m-d", $lastdate);
        
        $date12=date_create($nextMonthLastday);
        $date13=date_create($today_date);
        $nextmonthdayDiff=date_diff($date12,$date13);
        $data['next_month_end'] = str_replace('-','',$nextmonthdayDiff->format("%R%a"));
  
        $data['page_type'] = "Create_invoice";
        if (!empty($this->input->get('id'))) {
            $data['title'] =  "Update Invoice";
            $data['active4'] =  "Active";
            $data['result'] = $this->Invoice_model->getDetailInvoice(base64_decode($this->input->get('id')));
            $data['select_name'] = $this->Invoice_model->fetchSelectName();
            $this->load->view('include/header', $data);
            $this->load->view('invoice/createinvoice', $data);
            $this->load->view('include/footer',$data);
        } else {
            $data['title'] =  "Create Invoice";
            $data['user_detail'] = $this->auth->user_info();
            $data['select_name'] = $this->Invoice_model->fetchSelectName();
            $data['invoice_numer'] = $this->Invoice_model->getinvoice_number();
            $data['get_invoice_number'] = $data['invoice_numer'][0]->id;
            $this->load->view('include/header', $data);
            $this->load->view('invoice/createinvoicetwo', $data);
            $this->load->view('include/footer',$data);
        }
    }

    public function addInvoice()
    {
        $data['user_detail'] = $this->auth->user_info();
        if (isset($_POST['save'])) {
                $invoice_type = $this->input->post('invoice_type');
                if($invoice_type==1)
                {
                $first_name = $this->input->post('first_name');
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $email = $this->input->post('email');
                }
                else
                {
                $first_name = $this->input->post('custom_name');
                $last_name = $this->input->post('custom_last_name');
                $mobile_1 = $this->input->post('custom_mobile_1');
                $mobile_2 = $this->input->post('custom_mobile_2');
                $email = $this->input->post('custom_email');
                }

                if(empty($first_name) || empty($email))
                {
                    redirect(base_url('create-invoice'));
                }
                
                
                $invoice_number = $this->input->post('invoice_number');
                $order_number = $this->input->post('order_number');
                $date = $this->input->post('date');
                $due_date = $this->input->post('due_date');
                $description1 = $this->input->post('description1');
                $taxable = $this->input->post('taxable');
                $discount = $this->input->post('discount');
                $other_charges = $this->input->post('other_charges');
                $created_date = date('Y-m-d,h:i:s');
                $subject = $this->input->post('subject');
                $custom_notes = $this->input->post('custom_notes');
                $custom_notes_checked = $this->input->post('custom_notes_checked');
                // item code start 
                $item = $this->input->post('item');
                $amount = $this->input->post('amount');
                $quantity = $this->input->post('quantity');
                $description = $this->input->post('description');
                // prx($_POST);
                $get_taxable_amount = 0;
                $get_item_amount = 0;
                $get_discount_amount = 0;
                if(empty($custom_notes_checked))
                {
                    $custom_notes_checked = 0;
                }

                for($i=0;$i<count($item);$i++)
                {
                    $get_item_amount += $amount[$i]*$quantity[$i];
                }
                
                if($discount)
                {
                    $get_discount_amount = $get_item_amount*($discount/100);
                    $get_item_amount -= $get_discount_amount;
                }
                $get_item_amount += $other_charges;
                if($taxable)
                {
                    $get_taxable_amount = $get_item_amount*($taxable/100);
                    $get_item_amount += $get_taxable_amount;
                }
               
              
                $custom_invoice_detail = array();
                $custom_invoice_id = "";
               
                $this->db->trans_begin();
                if($invoice_type==2)
                {
                    $customer_id = substr($first_name,0,4).substr($mobile_1,0,4);
                    $custom_invoice_detail = array(
                        'user_id' => $data['user_detail']->id,
                        'first_name' => $first_name,
                        'last_name'  => $last_name,
                        'mobile_1'   => $mobile_1,
                        'mobile_2'   => $mobile_2,
                        'email'   => $email,
                        'lead_status' => 2,
                        'user_type'   => 2,
                        'data_type'   => 2,
                        'work_status'   => 2,
                        'customer_id'   => $customer_id,
                        'plan_status'   => 1,
                        'sale_date'   => date('m-d-Y'),
                        'created_date' => date('Y-m-d h:i:s')
                    );
                    
                    $custom_invoice_id = $this->Invoice_model->custom_invoice_record($custom_invoice_detail);
                    $first_name = $custom_invoice_id;
                }
                $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($first_name);
                $first_name_get = $data['getnameinvoice'][0]->first_name;
                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'invoice_number' => $invoice_number,
                    'order_number' => $order_number,
                    'email' => $email,
                    'date' => $date,
                    'due_date' => $due_date,
                    'description' => $description1,
                    'taxable' => $get_taxable_amount,
                    'tax_percentage' => $taxable,
                    'discount' => $discount,
                    'discount_amount' => $get_discount_amount,
                    'other_charges' => $other_charges,
                    'custom_notes' => $custom_notes,
                    'custom_notes_status' => $custom_notes_checked,
                    'subject' => $subject,
                    'date' => $date,
                    'created_date' => $created_date,
                    'user_id' => $data['user_detail']->id
                );
                $res = $this->Invoice_model->insertData($insert);

                // log activity 
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Invoice  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;

                // item data insert 
                $insertitem = array(
                    'item' => $item,
                    'quantity'   => $quantity,
                    'amount'   => $amount,
                    'description'   => $description,
                    'created_date'   => $created_date,
                    'invoice_id'   => $id,
                    'user_id' =>  $user_id
                );

                
                $update_user_type = $this->Invoice_model->updateUsertype($first_name);
                $resitem = $this->Invoice_model->insertItem($insertitem);
                // get total amount 
                $get_total_due_amount = $this->Invoice_model->gettotaldueamount($insert_id);
                $set_total_due_amount = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable;
                if($discount)
                {
                    $set_total_due_amount = $set_total_due_amount - $get_discount_amount;
                }
                
                // genrate pdf
                $pdf = $this->print($id);
                // send invoice 
                $mail = $this->mail($invoice_number, $first_name_get, $date, $due_date, $last_name, $insert_id, $set_total_due_amount,$email,$insert);
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    
                    $_SESSION['error'] = "Invoice Not Created";
                    redirect(base_url() . 'list-invoice');
                } else {
                    $this->db->trans_commit();
                }
                if ($res) {  
                    
                    $_SESSION['done'] = "Invoice Send And Save successfully";
                    redirect(base_url() . 'list-invoice');
                } else {
                    
                    $_SESSION['error'] = "Invoice Not Added";
                    redirect(base_url() . 'list-invoice');
                }
            // }
        }
        if (isset($_POST['save_draft'])) {
                $first_name = $this->input->post('first_name');
                $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($first_name);
                $first_name_get = $data['getnameinvoice'][0]->first_name;
                $last_name = $this->input->post('last_name');
                $mobile_1 = $this->input->post('mobile_1');
                $mobile_2 = $this->input->post('mobile_2');
                $invoice_number = $this->input->post('invoice_number');
                $order_number = $this->input->post('order_number');
                $email = $this->input->post('email');
                $date = $this->input->post('date');
                $due_date = $this->input->post('due_date');
                $other_charges = $this->input->post('other_charges');
                $description1 = $this->input->post('description1');
                $taxable = $this->input->post('taxable');
                $discount = $this->input->post('discount');
                $created_date = date('Y-m-d,h:i:s');
                // item code start 
                $item = $this->input->post('item');
                $amount = $this->input->post('amount');
                $quantity = $this->input->post('quantity');
                $description = $this->input->post('description');
                $subject = $this->input->post('subject');
                $custom_notes = $this->input->post('custom_notes');
                $custom_notes_checked = $this->input->post('custom_notes_checked');
                $get_taxable_amount = 0;
                $get_item_amount = 0;
                $get_discount_amount = 0;
                if(empty($first_name) || empty($email))
                {
                    redirect(base_url('create-invoice'));
                }
                for($i=0;$i<count($item);$i++)
                {
                    $get_item_amount += $amount[$i]*$quantity[$i];
                }
                $get_item_amount += $other_charges;
                if($taxable)
                {
                    $get_taxable_amount = $get_item_amount*($taxable/100);
                    $get_item_amount += $get_taxable_amount;
                }
               
                if($discount)
                {
                    $get_discount_amount = $get_item_amount*($discount/100);
                }
                 
                if(empty($custom_notes_checked))
                {
                    $custom_notes_checked = 0;
                }

                $insert = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'mobile_1' => $mobile_1,
                    'mobile_2' => $mobile_2,
                    'invoice_number' => $invoice_number,
                    'order_number' => $order_number,
                    'custom_notes' => $custom_notes,
                    'custom_notes_status' => $custom_notes_checked,
                    'subject' => $subject,
                    'email' => $email,
                    'date' => $date,
                    'due_date' => $due_date,
                    'description' => $description1,
                    'taxable' => $get_taxable_amount,
                    'tax_percentage' => $taxable,
                    'discount' => $discount,
                    'discount_amount' => $get_discount_amount,
                    'invoice_status' => 2,
                    'other_charges' => $other_charges,
                    'date' => $date,
                    'created_date' => $created_date,
                    'user_id' => $data['user_detail']->id
                );
                $this->db->trans_begin();
                $res = $this->Invoice_model->insertData($insert);

                // log activity         
                $insert_id = $this->db->insert_id();
                $user_id           = $data['user_detail']->id;
                $id           = $insert_id;
                $log_title         = "Add Invoice Draft  - " . json_encode($insert);
                $log_create        = app_log_manage($user_id, $id, $log_title);
                // log activity ;

                // item data insert 
                $insertitem = array(
                    'item' => $item,
                    'quantity'   => $quantity,
                    'amount'   => $amount,
                    'description'   => $description,
                    'created_date'   => $created_date,
                    'invoice_id'   => $id,
                    'user_id' =>  $user_id
                );
                $resitem = $this->Invoice_model->insertItem($insertitem);
                
                // item data insert 
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    
                    if ($res) {  
                      
                        $_SESSION['done'] = "Invoice Draft successfully";
                        redirect(base_url() . 'create-invoice');
                    } else {
                        
                        $_SESSION['error'] = "Invoice Not Added";
                        redirect(base_url() . 'create-invoice');
                    }
                } else {
                    
                    $this->db->trans_commit();
                    $_SESSION['done'] = "Invoice Save as draft successfully";
                    redirect(base_url() . 'list-invoice');
                }
               
            }
        // }
    }


    public function resendinvoice()
    {
        $hidden_id = $this->input->post('hidden_id');
        $first_name = $this->input->post('first_name');
        $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($first_name);
        $first_name_get = $data['getnameinvoice'][0]->first_name;
        $last_name = $this->input->post('last_name');
        $invoice_status = $this->input->post('invoice_status');
        $mobile_1 = $this->input->post('mobile_1');
        $mobile_2 = $this->input->post('mobile_2');
        $invoice_number = $this->input->post('invoice_number');
        $order_number = $this->input->post('order_number');
        $email = $this->input->post('email');
        $date = $this->input->post('date');
        $due_date = $this->input->post('due_date');
        $description1 = $this->input->post('description1');
        $taxable = $this->input->post('taxable');
        $tax_percentage = $this->input->post('tax_percentage');
        $discount = $this->input->post('discount');
        $discount_amount = $this->input->post('discount_amount');
        $other_charges = $this->input->post('other_charges');
        // $total_amount = $this->input->post('total_amount');
        $updated_date = date('Y-m-d,h:i:s');
        $update = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'mobile_1' => $mobile_1,
            'mobile_2' => $mobile_2,
            'invoice_number' => $invoice_number,
            'order_number' => $order_number,
            'email' => $email,
            'date' => $date,
            'due_date' => $due_date,
            'description' => $description1,
            'taxable' => $taxable,
            'tax_percentage' => $tax_percentage,
            'discount' => $discount,
            'discount_amount' => $discount_amount,
            'invoice_status' => 1,
            'other_charges' => $other_charges,
            // 'total_amount' => $total_amount,
            'date' => $date,
            'mod_date' => $updated_date,

        );

        $res = $this->Invoice_model->updateInvoice($hidden_id, $update);
        $update_user_type = $this->Invoice_model->updateUsertype($first_name);
        if ($invoice_status == 1) {
            $read = " Resend Invoice  - ";
        } else {
            $read =  " Draft Invoice Send - ";
        }
        // log activity 
        $insert_id = $hidden_id;
        $user_id           = $data['user_detail']->id;
        $id           = $insert_id;
        $log_title         =  $read . json_encode($update);
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        // get total amount 
        $get_total_due_amount = $this->Invoice_model->gettotaldueamount($hidden_id);
        $set_total_due_amount = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
        // genrate pdf
        $pdf = $this->print($hidden_id);
        // send invoice 
        $mail = $this->mail($invoice_number, $first_name_get, $date, $due_date, $last_name, $insert_id, $set_total_due_amount,$email,$update,$hidden_id);
        if (!empty($res)) {
            $this->session->set_flashdata('done', '' . $read . ' successfully');
            redirect(base_url() . 'list-invoice');
        } else {
            $this->session->set_flashdata('error', 'Invoice Not Added ');
            redirect(base_url() . 'list-invoice');
        }
    }


    public function detailinvoice()
    {
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] =  "View Invoice";
        $data['active4'] =  "Active";
        $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
        $get_firstname_invoice = $data['invoice'][0]->first_name;
        $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
        $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable-$get_total_due_amount[0]->discount_amount;
        $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
        $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
        $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
        $data['total_recieved_amt'] = $this->Invoice_model->InvoiceRecievedAmt(base64_decode($this->input->get('id')));
        $data['balance_amt'] = $data['set_total_due_amount']-$data['total_recieved_amt'];
        $this->load->view('include/header', $data);
        $this->load->view('invoice/detailinvoice', $data);
        $this->load->view('include/footer',$data);
    }
    
    public function viewinvoice()
    {
        $data['user_detail'] = $this->auth->user_info();
        $data['title'] =  "View Invoice";
        $data['active4'] =  "Active";
        $data['invoice'] = $this->Invoice_model->getInvoice(base64_decode($this->input->get('id')));
        $get_firstname_invoice = $data['invoice'][0]->first_name;
        $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
        $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
        $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
        $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
        $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
        $this->load->view('invoice/viewinvoice', $data);
    }

    public function deleteinvoice()
    {

        $data['user_detail'] = $this->auth->user_info();
        $delete_id = base64_decode($this->input->get('id'));
        $sess = $this->Invoice_model->deleteInvoice($delete_id);
        // log activity 
        $insert_id = $delete_id;
        $user_id           = $data['user_detail']->id;
        $id           = $delete_id;
        $log_title         = "Delete Invoice  id - " . $delete_id;
        $log_create        = app_log_manage($user_id, $id, $log_title);
        // log activity 
        if ($sess) {
            $this->session->set_flashdata('done', 'Invoice Deleted successfully');
            redirect(base_url() . 'list-invoice');
        }
    }

    public function addItem()
    {
        $data['user_detail'] = $this->auth->user_info();
        $item  = $this->input->post('item');
        $quantity  = $this->input->post('quantity');
        $amounts  = $this->input->post('amounts');
        $invoice_id  = $this->input->post('invoice_id');
        $description  = $this->input->post('description');
        $created_date = date('Y-m-d,h:i:s');

        $insert = array(
            'item' => $item,
            'quantity'   => $quantity,
            'amount'   => $amounts,
            'description'   => $description,
            'created_date'   => $created_date,
            'invoice_id'   => $invoice_id,
            'user_id' => $data['user_detail']->id
        );
        $res = $this->Invoice_model->insertItem($insert);
    }

    public function  mail($invoice_number, $first_name_get, $date, $due_date, $last_name, $insert_id, $set_total_due_amount,$email,$insert,$hidden_id='')

    {
        // $data = array(
        //     'invoice_number' => $invoice_number,
        //     'first_name_get' => $first_name_get,
        //     'date' => $date,
        //     'due_date' => $due_date,
        //     'last_name' => $last_name,
        //     'insert_id' => $insert_id,
        //     'set_total_due_amount' => $set_total_due_amount,
        //     'email' => $email
        // );
        // echo '<pre>';
        // print_r($data);
        // die;
        // send email invoice 
        $activeMail = active_mail()[0];
        $toName = $first_name_get.' '.$last_name;
        $toEmail = $email;
        $fromName = $activeMail->sender_name;
        $fromEmail = $activeMail->sender_email;
        $subject = 'Trust Haven Invoice';
        $fileName =  $invoice_number . '.pdf';
        $fullPath =  base_url() . 'file/' . $invoice_number . '.pdf';
        $htmlMessage = '
        <div style="height: 800px;  background-color: rgb(251,251,251); max-width: 600px;margin: auto;padding: 0 3%;">
        <div style=" max-width: 560px;padding-top: 35px; height: 70px;text-align:center;background: #4190f2; display: block; position:relative; top:30px; color: white; font-weight: 900; font-size: 20px;">
        <span style="position: relative;top: 40px;">Invoice #' . $invoice_number . '</span> 
        </div>
        <div>
        <p style="position: relative;top: 40px; font-size: 16px;">Dear ' . $first_name_get . ' ' . $last_name . ',</p>
        <p style="position: relative;top: 40px;">Thank you for your business. Your invoice can be viewed, printed and downloaded as PDF from the link below. You can also choose to pay it online. </p>
        </div>
        <br>
        <div style="background-color: yellowgreen; height: 450px; position: relative;top: 40px; padding: 3%;background: #fefff1;border: 1px solid #e8deb5;color: #333;">
        <div style="position: relative;top: 10px;    padding: 0 3% 3%;border-bottom: 1px solid #e8deb5;text-align: center;">
            <p style="text-align: center; font-size: large; font-weight: bold;">Invoice Amount</p>
            <p style="text-align: center; font-size: large; font-weight: bold;color: #d61916;">$' . $set_total_due_amount . '</p>
        </div>
        <div style="display: flex; padding: 50px 90px 0;  ustify-content: space-around;">
            <div>
                <p style="text-align:start; margin-left:50px;">Invoice No.</p>
                <p style="text-align:start; margin-left:50px;">Invoice Date</p>
                <p style="text-align:start; margin-left:50px;">Due Date</p>
            </div>
            <div>
                <p style="text-align:start; font-weight:900; margin-left:80px;">' . $invoice_number . '</p>
                <p style="text-align:start; font-weight:900; margin-left:80px;">' . $date . '</p>
                <p style="text-align:start; font-weight:900; margin-left:80px;">' . $due_date . '</p>
            </div>
        </div>
        <div>
           <a href="' . base_url('view_invoice/viewinvoice?id=' . base64_encode($insert_id) . '') . '"><button style=" background-color: #4dcf59;border: 1px solid #49bd54;text-align: center;min-width: 140px; margin-left: 190px;color: #fff;text-decoration: none;padding: 10px 20px;margin-top: 30px;">Pay Now</button></a>
        </div>
        <div>
        </div>
        <p style="text-align:start;">Regards,  <br><span style="color: #8c8c8c;"> Trust Haven Solution Inc. </span></p>
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
            "attachment" => array(
                array(
                    "url" => $fullPath,
                    "name" => $fileName 
                    )
            ), 
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
        $decode = json_decode($result);
        $last_email_id = $decode->messageId;
        curl_close($ch);    
        $get_lead_info = $this->Invoice_model->getInvoicedetail($insert['first_name'])[0];
        $active_mail = active_mail()[0];
        $emailHistory = array(
            'lead_id' => $get_lead_info->id,
            'user_id' => $get_lead_info->user_id,
            'sender_id' => $active_mail->id,
            'module_type' => 7,
            'too' => $toEmail,
            'subject' => 'Send Invocie',
            'message' => $htmlMessage,
            'sent_by_name' => $active_mail->sender_name,
            'sent_by_email' => $active_mail->sender_email,
            'mail_status' => 1,
            'source_by' => 5,
            'lead_type' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'api_response_id'=> $last_email_id
        );
        $saveEmailhistory = $this->Invoice_model->savehistory($emailHistory);
    
    }

    public function print($id)
    {
        $data['invoice'] = $this->Invoice_model->getInvoice($id);
        $get_firstname_invoice = $data['invoice'][0]->first_name;
        $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
        $get_total_due_amount = $this->Invoice_model->gettotaldueamount($id);
        $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable - $get_total_due_amount[0]->discount_amount;
        $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
        $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
        $data['title'] = "pdf libr";
        $html = $this->load->view('invoice/printinvoice', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_top' => 0,
            'margin_right' => 0,
            'margin_left' => 0,
            'margin_bottom' => 0,
        ]);
        $mpdf->WriteHTML($html);
        echo $html; die;
        // $mpdf->Output();
        // die;
        $mpdf->Output(FCPATH . 'file/' . $data['invoice'][0]->invoice_number . '.pdf', 'F');
        echo $Ledger_Group_Report = base_url() . 'file/' . $data['invoice'][0]->invoice_number . '.pdf';
    }

    public function manage_transaction(){
     $id = (int)base64_decode($this->input->get('id'));
     if($id==0)
     {
        redirect(base_url('list-invoice'));
     }
     $data['invoice'] = $this->Invoice_model->getInvoice($id);
     $get_firstname_invoice = $data['invoice'][0]->first_name;
     $get_total_due_amount = $this->Invoice_model->gettotaldueamount(base64_decode($this->input->get('id')));
     $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable-$get_total_due_amount[0]->discount_amount;
     $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
     $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
     $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
     $data['payment_record'] = $this->Invoice_model->getPaymentRecord($id);
     $data['user_detail'] = $this->auth->user_info();
     $data['title'] =  "Manage Invoice Transaction";
     $data['active4'] =  "Active";
     $payment_id = (empty($data['payment_record']))?'1':count($data['payment_record'])+1;
     $data['total_recieved_amt'] = $this->Invoice_model->InvoiceRecievedAmt($id);
     $id = $this->input->get('id');
     $data['payment_id'] = $payment_id;
     $this->load->view('include/header',$data);
     $this->load->view('invoice/manage_transaction',$data);
     $this->load->view('include/footer',$data);
  
    }

    public function addPayment()
    {
        if (isset($_POST['save'])) {
            $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
            $this->form_validation->set_rules('invoice_id', 'invoice_id', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('payment_date', 'Payment Date', 'required');
            $this->form_validation->set_rules('payment_id', 'Payment Id', 'required');
            $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
        }
        $invoice_id = $this->input->post('invoice_id');
        if(empty($invoice_id)){
        redirect(redirect(base_url('list-invoice')));
        }
        if ($this->form_validation->run() == FALSE) {
            $data['invoice'] = $this->Invoice_model->getInvoice($invoice_id);
            $get_firstname_invoice = $data['invoice'][0]->first_name;
            $get_total_due_amount = $this->Invoice_model->gettotaldueamount($invoice_id);
            $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable-$get_total_due_amount[0]->discount_amount;
            $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
            $data['getiteminvoice'] = $this->Invoice_model->getInvoice_item($data['invoice'][0]->id);
            $data['sub_total_first_name'] = $this->Invoice_model->getInvoice_sub_amount($data['invoice'][0]->id);
            $data['payment_record'] = $this->Invoice_model->getPaymentRecord($invoice_id);
            $payment_id = (empty($data['payment_record']))?'1':count($data['payment_record'])+1;
            $data['total_recieved_amt'] = $this->Invoice_model->InvoiceRecievedAmt($invoice_id);
            $data['payment_id'] = $payment_id;
            $this->load->view('include/header', $data);
            $this->load->view('invoice/manage_transaction', $data);
            $this->load->view('include/footer', $data);
        } 
        else
        {
            $data['invoice'] = $this->Invoice_model->getInvoice($invoice_id);
            $get_firstname_invoice = $data['invoice'][0]->first_name;
            $get_total_due_amount = $this->Invoice_model->gettotaldueamount($invoice_id);
            
            $data['getnameinvoice'] = $this->Invoice_model->getInvoiceCustNAme($get_firstname_invoice);
            $data['set_total_due_amount'] = $get_total_due_amount[0]->amount + $get_total_due_amount[0]->other_charges + $get_total_due_amount[0]->taxable-$get_total_due_amount[0]->discount_amount;
            $data['total_recieved_amt'] = $this->Invoice_model->InvoiceRecievedAmt($invoice_id);
           
            $payment_id = $this->input->post('payment_id');
            $amount = $this->input->post('amount');
            $bank_charges = $this->input->post('bank_charges');
            $reference = $this->input->post('reference_no');
            $notes = $this->input->post('notes');
            $payment_mode = $this->input->post('payment_mode');
            $payment_date = $this->input->post('payment_date');
            $created_at   = date('Y-m-d H:i:s');
            $transaction_record = array(
                'invoice_id'   => $invoice_id,
                'payment_id'   => $payment_id,
                'amount'       => $amount,
                'bank_charges' => $bank_charges,
                'reference'    => $reference,
                'notes'        => $notes,
                'payment_mode' => $payment_mode,
                'payment_date' => $payment_date,
                'created_at'   => $created_at
            );
            
            $total_recieved_amount = $data['total_recieved_amt'] + $amount;
            
            if($payment_id==1 && $amount==($data['set_total_due_amount'].'.00'))
                {
                    $payment_type = 1;
                }
                else
                {
                    $payment_type = 2;
                }
            if($this->Invoice_model->addPaymentRecord($transaction_record))
            {
                $customer_email = $data['getnameinvoice'][0]->email;
                $customer_name = $this->input->post('customer_name');
                $detail = array(
                    'amount' => $amount,
                    'invoice_number' => $data['invoice'][0]->invoice_number,
                    'payment_date' => $payment_date,
                    'invoice_id' => $invoice_id,
                    'customer_email' => $customer_email,
                    'customer_name'  => $customer_name
                );
                if($total_recieved_amount==$data['set_total_due_amount'])
                {
                $this->Payment_model->updatePaymentstatus($invoice_id);;
                }
                $this->send_reciept($amount,$data['invoice'][0]->invoice_number,$payment_date,$invoice_id,$customer_email,$customer_name,$payment_type);
                $_SESSION['done'] = "Payment Added Successfully";
                redirect(base_url() . 'manage-transaction?id='.base64_encode($invoice_id));
                
            }
            else
            {
                $_SESSION['error'] = "Payment Added Failed";
                redirect(base_url() . 'manage-transaction?id='.base64_encode($invoice_id));
            }
        }
    }

    public function send_reciept($set_total_due_amount,$invoice_number,$payment_date,$id,$email,$invoice_name,$payment_type)
    {
        $activeMail = active_mail()[0];
        // prx($activeMail);
        $date =   $payment_date; 
        $payment_invoice_type = ($payment_type==1)?'':'Partially';
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
                <p style="text-align: center; font-size: large; font-weight: bold;">'.$payment_invoice_type.' Payment Received</p>
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

    public function invoice_reminder()
    {
        $invoice_id = base64_decode($this->input->get('id'));
        $this->print($invoice_id);
    }

    
    public function PrevgetInvoiceCustomNotes()
    {
        $record = array();
        $customer_id = $_POST['customer_id'];
        $data = array();
        if($customer_id)
        {
        $data = $this->Invoice_model->getCustomerDetail($customer_id)[0];
        if($invoice_record = $this->Invoice_model->getLastCustomNotes($customer_id)[0])
        {
            if($invoice_record->custom_notes_status==1)
            {
                // customer note checked;
                if($data)
                {
                    $data->invoice_record = $invoice_record;
                    $data->response_status = 1;
                    $record = $data;
                }
                echo json_encode($record);
            }
            else
            {
                // customer note not checked;
                $data->response_status = 2;
                $data->customer_detail = "";
                $record = $data;
                echo json_encode($record);
            }
        }
        else
        {
        
        // new customer
        $data->response_status = 3;
        $data->invoice_record = "";
        $record = $data;
        echo json_encode($record);
        }
        }
        return false;
    }

    public function pagination_setup($parms)
    {
        $config['base_url'] = $parms['link'];
        $config['total_rows'] = $parms['total_record'];
        $config['per_page'] = $parms['limit'];
        $config["uri_segment"] = $parms['segment'];

        //config for bootstrap pagination class integration
        // $config['enable_query_strings']= true;
        // $config['use_page_numbers']= true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example " class="float-end"><ul class="pagination float-end pe-2">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] =  '<li class="page-item"> <span class="page-link" href="#">';
        $config['first_tag_close'] = '</span></li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="' . base_url('list-lead    ') . '">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        //config for bootstrap pagination class integration close

        $this->pagination->initialize($config);
        $data['page'] = $parms['segment'];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }

}
