<?php

use GuzzleHttp\RetryMiddleware;

defined('BASEPATH') OR exit('direct script no access allowed');

class Invoice_model extends CI_Model{

    public function listInvoice(){

        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_count_invoice_admin() {
        
        $this->db->select('a.*,b.first_name as first');
        $this->db->join("tbl_lead_contact_user b","a.first_name=b.id","inner");
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_invoice a');
        
    }

    public function get_result_invoice_admin($limit, $start) {
        
        $this->db->select('a.*,b.first_name as first');
        $this->db->join("tbl_lead_contact_user b","a.first_name=b.id","inner");
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get('tbl_invoice a');
        return $query->result();
    }

    public function get_count_invoice_search_admin($gsearch) {
        
        $this->db->group_start();
        $this->db->or_like('a.invoice_number', $gsearch);
        $this->db->or_like('a.order_number', $gsearch);
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.due_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->order_by('a.id', 'desc');
        return $this->db->count_all_results('tbl_invoice a');
    //    echo $this->db->last_query();
    //    die;
        
    }

    public function get_result_invoice_search_admin($limit, $start,$gsearch) {
        $this->db->limit($limit, $start);
        $this->db->group_start();
        $this->db->or_like('a.invoice_number', $gsearch);
        $this->db->or_like('a.order_number', $gsearch);
        $this->db->or_like('b.first_name', $gsearch);
        $this->db->or_like('a.last_name', $gsearch);
        $this->db->or_like('a.email', $gsearch);
        $this->db->or_like('a.mobile_1', $gsearch);
        $this->db->or_like('a.mobile_2', $gsearch);
        $this->db->or_like('a.date', $gsearch);
        $this->db->or_like('a.due_date', $gsearch);
        $this->db->or_like('a.description', $gsearch);
        $this->db->group_end();
        $this->db->select('a.*, b.first_name as first');
        $this->db->join('tbl_lead_contact_user b' , 'a.first_name=b.id','inner');
        $this->db->where('a.status',1);
        $this->db->where('b.status',1);
        $this->db->order_by('a.id', 'desc');
        $query =  $this->db->get('tbl_invoice a');
        return $query->result();
    }

    public function get_count_invoice($user_id) {
        $this->db->where('status',1);
        $this->db->where('status',1);
        $this->db->where('user_id',$user_id);
        $this->db->order_by('id', 'desc');
        return $this->db->count_all_results('tbl_invoice');
    }   

    public function get_result_invoice($limit, $start,$user_id) {
        $this->db->limit($limit, $start);
        $this->db->where('status',1);
        $this->db->where('status',1);
        $this->db->where('user_id',$user_id);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tbl_invoice');
        return $query->result();
    }

    public function fetchSelectName(){
        $this->db->where('status' , 1);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }

    public function insertData($data){

        if($this->db->insert('tbl_invoice',$data)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getInvoiceCustNAme($id){
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
    }

    public function deleteInvoice($id){
        $this->db->set('status',3);
        $this->db->where('id',$id);
        if($this->db->update('tbl_invoice')) {
            return true;
        }
        else{
            return false;
        }
    }

    public function getinvoice_number(){

        $this->db->select('id');
        $this->db->from('tbl_invoice');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();

    }

    public function getDetailInvoice($id){
        $this->db->where('id',$id);
        $this->db->where('status',1);
        $query = $this->db->get('tbl_invoice');
        return $query->result();
    }

    public function updateInvoice($hidden_id,$update){
        $this->db->set($update);
        $this->db->where('id' , $hidden_id);
        $this->db->where('status' , 1);
        if($this->db->update('tbl_invoice')){
            return true ;
        }
        else{
            return false;
        }
    }

   public function  getInvoice($id){

    $this->db->where('id',$id);
    $this->db->where('status',1);
    $query = $this->db->get('tbl_invoice');
    return $query->result();

   }

   public function getInvoice_item($id){
    $this->db->where('invoice_id',$id);
    $this->db->where('status',1);
    $query= $this->db->get('tbl_items');
    return $query->result();
   }

   public function getInvoice_sub_amount($id){

        $query = $this->db->query("SELECT SUM(quantity*amount) as total FROM tbl_items WHERE invoice_id = '$id' ");
        return $query->result();

   }

   public function gettotaldueamount($id){
    $query = $this->db->query("SELECT SUM(tbl_items.quantity*tbl_items.amount) as amount , tbl_invoice.other_charges as other_charges , tbl_invoice.taxable as taxable,tbl_invoice.discount_amount  FROM `tbl_invoice` LEFT JOIN tbl_items ON tbl_items.invoice_id = tbl_invoice.id WHERE tbl_invoice.id = $id ");
    return $query->result();
   }

  
   public function insertItem($data){
    
    $record = array();
    for($i=0;$i<count($data['item']);$i++)
    {
        $record[] = array(

            'item'           => $data['item'][$i],
            'description'    => $data['description'][$i],
            'quantity'       => $data['quantity'][$i],
            'amount'         => $data['amount'][$i],
            'user_id'           => $data['user_id'],
            'invoice_id'   => $data['invoice_id'],
            'created_date'   => $data['created_date']
        );   
             
    }

    if($this->db->insert_batch('tbl_items',$record)){
        return true;
    }
    else{
        return false;
    }
}

public function payment_info($info)
{
    if($this->db->insert("tbl_payment_info",$info))
    {
        return $this->db->insert_id();
    }
    else
    {
        return false;
    }
}

public function billing_info($info)
{
    if($this->db->insert("tbl_billing",$info))
    {
        return $this->db->insert_id();
    }
    else
    {
        return false;
    }
}

public function transaction_info($info)
{
    if($this->db->insert("tbl_transaction",$info))
    {
        return true;
    }
    else
    {
        return false;
    }
}

public function updateUsertype($id){
    $data = array(
        'user_type' => 2,
        'lead_status' => 2,
        'sale_date' => date('m-d-Y'),
    );
    $this->db->where('id',$id);
    if($this->db->update('tbl_lead_contact_user',$data)){
        return true;
    }
    else{
        return false;
    }
}

public function custom_invoice_record($record)
{
    if($this->db->insert("tbl_lead_contact_user",$record))
    {
        return $this->db->insert_id();
    }
}

public function getInvoicedetail($id){
    $this->db->where('status',1);
    $this->db->where('id',$id);
    $query = $this->db->get('tbl_lead_contact_user');
    return $query->result();
}

 public function savehistory($insert){
    if($this->db->insert('tbl_email',$insert)){
        return true;
    }else{
        return false;
    }
 }

 public function getLastCustomNotes($customer_id)
 {
    $data = array();
    $this->db->where('first_name',$customer_id);
    $this->db->order_by('id',"desc");
    $this->db->limit(1);
    $query = $this->db->get('tbl_invoice');
    if($query->num_rows()>0)
    {
        $data = $query->result();
        return $data;
    }
    return false;
    
 }

 public function getCustomerDetail($id)
 {      
        
        $this->db->where('status', 1);
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_lead_contact_user');
        return $query->result();
 }

 public function addPaymentRecord($data)
 {
    if($this->db->insert('tbl_invoice_transaction',$data))
    {
        return true;
    }
    return false;
 }

 public function getPaymentRecord($invoice_id)
 {
    $data = array();
    $this->db->where('invoice_id',$invoice_id);
    $this->db->where('status',1);
    $this->db->order_by('id',"asc"); 
    $query = $this->db->get('tbl_invoice_transaction'); 
    if($query->num_rows()>0)
        {   
            foreach($query->result() as $key=>$record)
            {
                $data[] = $record;
            }
            return $data;
        }
        return false;
 }

 public function InvoiceRecievedAmt($invoice_id)
 {
    $data = array();
    $total_recieved_amt = 0;
    $this->db->where('invoice_id',$invoice_id);
    $this->db->where('status',1);
    $this->db->order_by('id',"asc"); 
    $query = $this->db->get('tbl_invoice_transaction'); 
    if($query->num_rows()>0)
        {   
            foreach($query->result() as $key=>$record)
            {
                $total_recieved_amt += $record->amount;
            }
        }
        return $total_recieved_amt;
 }
}
