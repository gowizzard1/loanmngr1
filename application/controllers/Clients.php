<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->helper("myHelper");

        if(null === $this->session->userdata('uid')) {
            header("Location: ".site_url('welcome?fa=1')."");
        }
    }

    public function index() {
       if(null !== $this->input->post('create_customer')) {
            $data['create_customer'] = $this->Client_model->create_customer(
                                $this->input->post('password1'),
                                $this->input->post('email'),
                                $this->input->post('password2')
                            );
                if($data['create_customer'] == 1) { // Database insert success, refresh page, display alert msg, clear fields
                    header("Location: ".site_url('users')."?create_alert=Success");
                }
                else { // Database insert failed, display alert msg, repopulate fields
                    $data['create_alert'] = "Failed! Please try again.";
                    // $default_username = set_value('username');
                    // $default_email = set_value('email');
                }
    }
    // else if(null !== $this->input->post('reset')) {
    //         header("Location: ".site_url('clients')."");
    //     }
    /* Create form */
        $form =     array('class' => 'form-horizontal user-form');
        $username = array('name' => 'id', 
                        'id' => 'id', 
                        //'value' => '',
                        'placeholder' => 'ID', 
                        'class' => 'form-control username', 
                        'style' => ''
                    );
        $email =    array('name' => 'firstname', 
                        'id' => 'firstname', 
                       // 'value' => '',  
                        'placeholder' => 'First Name', 
                        'class' => 'form-control username', 
                        'style' => ''
                    );
        $password1 = array('name' => 'lastname', 
                        'id' => 'lastname', 
                        'placeholder' => 'last name', 
                        'class' => 'form-control username', 'size' => '30', 
                        'style' => ''
                    );
        $password2 = array('name' => 'address', 
                        'id' => 'address', 
                       // 'type' => 'password', 
                        'maxlength' => '30', 
                        'placeholder' => 'Address', 
                        'class' => 'form-control password', 'style' => ''
                    );
        $reset =    array('name' => 'reset', 
                        'id' => 'reset', 
                        'value' => 'Clear', 
                        'class' => 'btn btn-normal', 
                        'style' => ''
                    );
        $submit =   array('name' => 'create_customer', 
                        'id' => 'submit', 
                        'value' => 'Submit', 
                        'class' => 'btn btn-cyan', 
                        'style' => ''
                    );
        $data['form1'] = form_open('clients', $form)
                       // .form_input($username)
                        .form_input($email)
                        .form_input($password1)
                        .form_input($password2)
                        .form_submit($reset)
                        .form_submit($submit) 
                        .form_close();
      $data['breadcrumbs'] =  breadcrumbs(array('clients'));
        $data['table_header'] = "List of clients";
        $data['form_header'] = "Add new customer";
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        $list = $this->Client_model->get_clients();  
   // $list = $this->Client_model-> get_clients();
        $this->table->set_heading('first name', 'last name', 'telephone', 'address' ,'&nbsp;');
        if(null !== $list) {
            foreach ($list as $l):
                $this->table->add_row($l['firstname'], $l['lastname'], '', '', '<a href="'.site_url().'/clients/profile/'.$l['id'].'">View</a>');
            endforeach;
        }
        $template = array('table_open' => '<table class="table table-condensed table-striped myTable" id="client-table">');
        $this->table->set_template($template);
         $data['navbar_left'] = navbar_left($this->uri->segment(1));
        $data['table'] = $this->table->generate();

        $this->generic_page($data);
    }

    function generic_page($data) {
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('footer');
    }
    function getSalary(){
        //check if the employee has loan
        //salary= salary-loan-deductions
    }
    function getLoanDue(){
        //get all with due status
    }
    function payLoan(){
    $amount=$this->input->post('c_name');
    $id_num=$this->input->post('identification');
    //get customer's total amount
    //total_amount= amount
    //save payment on the tbl_payments table
    }
    function getPayments(){
        //get all the table tbl_payments
        //paginate
    }
function createloan(){
    $name=$this->input->post('c_name');
    $id_num=$this->input->post('identification');
    $amount=$this->input->post('amount');
    $interest=$this->input->post('interest');
   $agent=$this->input->post('agent');
   $officer=$this->input->post('officer');
   $fine=0;
  $total_loan=$amount*(1+$interest)+$fine;
   $Date=date("Y-m-d H:i:s");
   $due_date=date('Y-m-d', strtotime($Date. ' + 21 days'));

//check if customer is registered

   //if not register to db customer table
   //check if has unpaid loan if no...below
   //create loan

}
function createEmployee(){
    $name=$this->input->post('c_name');
    $id_num=$this->input->post('identification');
    $salary=$this->input->post('salary');
    $designation=$this->input->post('designation');
   $commission=$this->input->post('commission');
  //check if has unpaid loan if no...below
   //create 

}
function getDesignation(){
 echo "string";
    $des=$this->Client_model->fetchDesignations();
    foreach ($des as $key => $ds) {
       var_dump($des);
    }
}
function checkPenalty(){
//get all the due dates
    //foreach due_dates more than 21 days
    //apply penalty
    $now = time(); // or your date as well
$your_date = strtotime("2010-01-01");
$datediff = $now - $your_date;
$datediff= round($datediff / (60 * 60 * 24));
if($date>21){
    //update table fine column
    //update total too
    //update status as due
}


}
    function client_information($c_id) {
        $profile = $this->Client_model->get_clients($c_id);
        $fullname = $profile['firstname']." ".$profile['lastname'];
        
        $this->table->set_heading('Client Information');
        $this->table->add_row(array('ID', $profile['id']));
        $this->table->add_row(array('Last Name', $profile['lastname']));
        $this->table->add_row(array('First Name', $profile['firstname']));
        $this->table->add_row(array('Address', $profile['address']));
        $this->table->add_row(array('Telephone', $profile['telephone']));
        $template = array('table_open' => '<table class="table table-condensed table-striped myTable client-info-tbl">', 'heading_cell_start' => '<th colspan="2">');
        $this->table->set_template($template);
        $table =  $this->table->generate();
        
        return $table;
    }

    function loan_information($group_code) {
        $loan = $this->Client_model->loan_information($group_code);
        $this->table->set_heading('Loan Information');
        $this->table->add_row(array('Transaction No.', $loan['group_code']));
        $this->table->add_row(array('Date', $loan['date']));
        $this->table->add_row(array('Amount', "P ".number_format($loan['amount'],2)));
        $this->table->add_row(array('Charge', $loan['charge'].'%'));
        $template = array('table_open' => '<table class="table table-condensed table-striped myTable loan-info-tbl">', 'heading_cell_start' => '<th colspan="2">');
        $this->table->set_template($template);
        $table = $this->table->generate();

        return $table;
    }

    function loan_form($client_id) {
        $form = array('class' => '');
        $date = array('name' => 'date', 
                        'id' => 'date',
                        'type'  => 'date',
                        'class' => 'form-control', 
                        'required' => true
                    );
        $code = array('name' => 'code', 
                        'id' => 'code',
                        'type'  => 'text',
                        'placeholder' => 'Code', 
                        'class' => 'form-control', 
                        'required' => true
                    );
        $amount = array('name' => 'amount', 
                        'id' => 'amount', 
                        'type' => 'number',
                        'placeholder' => 'Amount', 
                        'class' => 'form-control', 
                        'required' => true
                    );
        $rate = array('name' => 'rate', 
                        'id' => 'number', 
                        'type' => 'number',
                        'placeholder' => 'Interest Rate', 
                        'class' => 'form-control', 
                        'required' => true
                    );
        $submit = array(
            'type'  => 'submit',
            'name'  => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-default'
        );
        $this->table->set_heading('Add Loan');
        $this->table->add_row(array('Date',form_open('clients/add_loan/'.$client_id.'', $form).form_input($date)));
        $this->table->add_row(array('Transaction #',form_input($code)));
        $this->table->add_row(array('Amount',form_input($amount)));
        $this->table->add_row(array('Rate (%)',form_input($rate)));
        $this->table->add_row(array('',form_submit($submit).form_close()));
        $add_loan_form = array('table_open' => '<table class="table table-condensed myTable client-new-loan">', 'heading_cell_start' => '<th colspan="2">');
        $this->table->set_template($add_loan_form);
        $table = $this->table->generate();

        return $table;
    }

    function payment_form($client_id) {
        $loans = $this->Client_model->get_loans($client_id);
        $transaction_options = array(''=>'Select');
        $description_options = array(''=>'Select', 'Interest'=>'Interest', 'Payment' => 'Payment' );
        $form = array('class' => '');

        if(null !== $loans) {
            foreach ($loans as $key => $each_loan) {
                $options[$each_loan['code']] = $each_loan['code'];
                $transaction_options = $options;
            }
        }

        $transaction = form_dropdown('loan_id', $transaction_options, ' ', 'class="form-control" required');
        $description = form_dropdown('description', $description_options, ' ', 'class="form-control" required');

        $date = array('name' => 'date', 
                        'id' => 'date',
                        'type'  => 'date',
                        'class' => 'form-control', 
                        'required' => true
                    );
        $amount = array('name' => 'amount', 
                        'id' => 'amount', 
                        'type' => 'number',
                        'placeholder' => 'Amount', 
                        'class' => 'form-control', 
                        'required' => true
                    );
        $submit = array(
            'type'  => 'submit',
            'name'  => 'submit',
            'value' => 'Submit',
            'class' => 'btn btn-default'
        );
        $this->table->set_heading('Pay Loan');
        $this->table->add_row(array('Date',form_open('clients/add_payment/'.$client_id.'', $form).form_input($date)));
        $this->table->add_row(array('Transaction #', $transaction));
        $this->table->add_row(array('Amount',form_input($amount)));
        $this->table->add_row(array('Description',$description));
        $this->table->add_row(array('',form_submit($submit).form_close()));
        $add_payment_form = array('table_open' => '<table class="table table-condensed myTable client-payment-form">', 'heading_cell_start' => '<th colspan="2">');
        $this->table->set_template($add_payment_form);
        $table = $this->table->generate();

        return $table;

    }

    function loan_table($client_id) {
        $loans = "";
        $loans = $this->Client_model->get_loans($client_id);
        if(null !== $loans) {
            foreach ($loans as $key => $each_loan) {
                $total_payment = 0;
                $balance = 0;
                $interest = 0;
                $status = "";
                $loan_value = 0;

                // $loan_id = $each_loan['id'];
                $loan_id = $each_loan['code'];
                $loan_amount = $each_loan['amount'];
                $status = $each_loan['status'];

                // $occDate='2014-12-31';
                // $forOdNextMonth = date('m d y', strtotime("+1 month", strtotime($occDate)));
                $date = date_create($each_loan['date']);

                $row_line = array('data' => '', 'class' => 'row-line', 'colspan' => 4);
                $row_gap = array('data' => '', 'class' => 'row-gap', 'colspan' => 4);
                $subtbl_start = array('data' => '', 'class' => 'subtbl-start', 'colspan' => 4);
                $subtbl_end = array('data' => '', 'class' => 'subtbl-end', 'colspan' => 4);
                $this->table->add_row(array($subtbl_start) );

                $transaction_no_label = array('data' => 'Transaction No.: ', 'class' => 'transaction-no-label');
                $transaction_no_data = array('data' => $loan_id, 'class' => 'transaction-no-data'); 
                $date_label = array('data' => 'Loan Date: ', 'class' => 'date-label');
                $date_data = array('data' => date_format($date, "M. d, Y"), 'class' => 'date-data'); 
                $amount_label = array('data' => 'Amount: ', 'class' => 'amount-label');
                $amount_data = array('data' => number_format($loan_amount, 2), 'class' => 'amount-data'); 
                $status_label = array('data' => 'Status: ', 'class' => 'status-label');
                $status_data = array('data' => $status, 'class' => 'status-data'); 
                
                $this->table->add_row(
                    array($transaction_no_label, $transaction_no_data, $amount_label, $amount_data)
                );

                $this->table->add_row(
                    array($date_label, $date_data, $status_label, $status_data)
                );


                $payments = $this->Client_model->get_payments($loan_id);

                $trans_th_date = array('data' => 'Date', 'class' => 'transaction-th-date transaction-th');
                $trans_th_amount = array('data' => 'Payment', 'class' => 'transaction-th-amount transaction-th');
                $trans_th_interest = array('data' => 'Interest', 'class' => 'transaction-th-interest transaction-th');
                $trans_th_desc = array('data' => 'Description', 'class' => 'transaction-th-description transaction-th');
                $this->table->add_row(
                    array($trans_th_date, $trans_th_interest, $trans_th_amount, $trans_th_desc)
                );
                $this->table->add_row(array($row_line) );

                if(null !== $payments) {
                    foreach ($payments as $each_payment) {
                        $trans_td_amount = array('data' => number_format($each_payment['amount'],2), 'class' => 'transaction-td-amount');
                        
                        if($each_payment['description'] == 'Payment') {
                            $total_payment = $total_payment + $each_payment['amount'];
                            $this->table->add_row(
                                array($each_payment['date'], '', $trans_td_amount, $each_payment['description'])
                            );
                        }
                        if($each_payment['description'] == 'Interest') {
                            $interest = $interest + $each_payment['amount'];
                            $this->table->add_row(
                                array($each_payment['date'], $trans_td_amount, '', $each_payment['description'])
                            );
                        }

                    }
                }
                $this->table->add_row(array($row_line) );
                
                // Total payment
                $total_payment_label = array('data' => 'Total', 'class' => 'total-payment-label');
                $total_payment_data = array('data' => number_format($total_payment,2), 'class' => 'total-payment-data'); 
                
                // Total interest
                $interest_label = array('data' => 'Total', 'class' => 'interest-label');
                $interest_data = array('data' => number_format($interest,2), 'class' => 'interest-data'); 

                // $this->table->add_row(array($total_payment_label,'',,'') );
                $this->table->add_row(array($interest_label, $interest_data, $total_payment_data ,'') );

                $balance = ($loan_amount + $interest)- $total_payment;
                $balance_label = array('data' => 'Balance', 'class' => 'balance-label');
                $balance_data = array('data' => number_format($balance,2), 'class' => 'balance-data'); 

                $this->table->add_row(array($row_gap) );
                $this->table->add_row(
                    array($balance_label,$balance_data,'','')
                );

                $loan_value = ($loan_amount + $interest);
                $loan_value_label = array('data' => 'Loan Value', 'class' => 'loan-value-label');
                $loan_value_data = array('data' => number_format($loan_value,2), 'class' => 'loan-value-data'); 
                $this->table->add_row(array($loan_value_label, $loan_value_data, '', '') );
                
                
                $this->table->add_row(array($subtbl_end));
                //update status
                if($balance <= 0) {
                    $this->Client_model->updateLoanStatus($loan_id, 'Fully paid');
                }
                
            }
        }
        $loan_table = array('table_open' => '<table class="client-loans-table" id="">');
        // $this->table->set_heading('Transaction #', 'Date', 'Amount', 'Status', 'Action');
        $this->table->set_template($loan_table);
        $table = $this->table->generate();

        return $table;
    }

    public function profile($client_id) {
        $profile = $this->Client_model->get_clients($client_id);
        $fullname = $profile['firstname']." ".$profile['lastname'];

        // Generate Information table
        $data['form1'] = $this->client_information($client_id); 
        $data['form2'] = $this->loan_form($client_id); 
        $data['form3'] = $this->payment_form($client_id); 
        $data['table'] = $this->loan_table($client_id); 

        $data['breadcrumbs'] =  breadcrumbs(array('clients', $fullname));
        $data['form_header'] = $fullname;
        $data['table_header'] = "Loans";
        $data['navbar_left'] = navbar_left($this->uri->segment(1));

        $this->generic_page($data);
    }

    public function add_loan($client_id) {
        $add_loan = $this->Client_model->add_loan($client_id);
        if($add_loan == 1) {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form2_alert=Success");
        }else {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form2_alert=Failed");
        }
    }

    public function add_payment($client_id) {
        $add_payment = $this->Client_model->add_payment($client_id);
        if($add_payment == 1) {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form3_alert=Success");
        }else {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form3_alert=Failed");
        }
    }


    public function transaction($c_id, $group_code) {
        $profile = $this->Client_model->get_clients($c_id);
        $fullname = $profile['firstname']." ".$profile['lastname'];
        $data['form'] = $this->client_information($c_id);
        $data['form2'] = $this->loan_information($group_code);

        // Generate Transaction table 
        $transaction = $this->Client_model->transaction($group_code);
        if(null !== $transaction) {
            $ctr = 0;
            $total_amount = 0;
            foreach ($transaction as $key => $t) {
                $date = date_create($t['date']);
                $due_date = date('M. d, Y', strtotime("+1 month", strtotime($t['date'])));
                $ctr++;
                $this->table->add_row(
                    array(
                        $ctr,
                        date_format($date, "M. d, Y"),
                        $due_date,
                        number_format($t['amount'], 2),
                        $t['comment']
                        // anchor(site_url().'/clients/transaction/'.$id.'/'.$t['id'], 'View', 'title="View transaction"')
                    )
                );
                $total_amount = $total_amount + $t['amount'];
            }
            $this->table->add_row('','','', number_format($total_amount,2), '');

        }
        $trans_tbl_tem = array('table_open' => '<table class="table table-condensed table-striped myTable client-trans-tbl" id="client-transaction">');
        $this->table->set_heading('#', 'Date', 'Due Date', 'Amount', 'Charge');
        $this->table->set_template($trans_tbl_tem);
        $data['table'] = $this->table->generate();

        $data['breadcrumbs'] =  breadcrumbs(array('clients', anchor(site_url().'/clients/profile/'.$c_id, $fullname)." / Transaction No. ".$group_code));
        $data['form_header'] = $fullname;
        $data['table_header'] = "Transactions No. ".$group_code;
        $data['navbar_left'] = navbar_left($this->uri->segment(1));

        $this->generic_page($data);
    }

    public function update($id) {
        echo $id;
    }

    public function new_transaction($client_id) {
        $transaction = $this->Client_model->new_transaction($client_id);
        if($transaction == 1) {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form2_alert=Success");
        }else {
            header("Location: ".site_url()."/clients/profile/".$client_id."?form2_alert=Failed");
        }
    }



}