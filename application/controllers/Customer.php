<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	// num of records per page
	
	function __construct()
	{
		parent::__construct();
		
		// load library
		$this->load->library(array('table','form_validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('Client_model','',TRUE);
	}
	function getDesignation(){
      $data['officer']=$this->Client_model->fetchDesignationsOff()->result();
    //$data['designation']=$this->Client_model->fetchDesignations()->result();
  
   
   // $this->load->view('/home', $data);
}
 function getEmployees(){
        $data['desigs']=$this->Client_model-> fetchAllDesig()->result();
       // var_dump($data['desigs']);
       
    }
  function getDesignation1(){
 
    $des=$this->Client_model->fetchDesignationsOff()->result();
    var_dump($des);

   // if($des->designation='officer'){
   // $data['officer']=$des;
   // }else{
   //  $data['designation']=$des;
   // }
    

   // $this->load->view('/home', $data);
}

function get(){
  $this->Client_model->registerLoan();
      // $data= $this->Client_model->getUsers()->result();
      // var_dump($data);
      // $this->load->view('header');
   //         $this->load->view('generic-page', $data);
   //         $this->load->view('footer');
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
    function getSalary(){
        //check if the employee has loan
        //salary= salary-loan-deductions
    }
    function getLoanDue(){
        //get all with due status
    }
    function payLoan(){
    $amount=$this->input->post('amount');
    $id_num=$this->input->post('identification');
    $this->Client_model->addPayment($id_num,$amount);
    $sp=$this->Client_model->getLoanAmount($id_num)->result();
    foreach ($sp as $key => $val) {
    $pay=$val->total_loan-$amount;
    //echo $pay;
    if($pay==0){
      $this->Client_model->completePayment($pay,$id_num);
    }else{
      $this->Client_model-> updatePayment($pay,$id_num);
    }
   
    }
    
   // $data = array('id' =>$id_num ,'amount'=>$amount );
   //  $this->Client_model->payKaloan($data);
    //get customer's total amount
    //total_amount= amount
    //save payment on the tbl_payments table
    }
    function caller(){
      $id=77686386;
      $status=$this->getPayments($id);
        // echo ($status) ;
        // exit();
       if($status=='paid' OR (empty($status))) {
        echo "wewe ni mzuri";

       }
       else{
        echo "wewe ni fala";
       }
    }
    function getPayments($id){

        //get all the table tbl_payments
        //paginate
      
     $ch=$this->Client_model->checkStatus($id)->result();
     foreach ($ch as $key => $value) {
      // var_dump($value->status);
       return $value->status ;
       
     }
     
    // if($ch->){
    //   echo "iko hapa";
    // }else{
    //   echo "string";
    // }
    }
function createloan(){
  
    $name=$this->input->post('c_name');
    $id_num=$this->input->post('identification');
    $amount=$this->input->post('amount');
    $interest=$this->input->post('interest');
   $agent=$this->input->post('agent');
   $officer=$this->input->post('officer');
   $fine=0;
   $pricipal=$amount*(1+$interest)+$fine;
   
  $total_loan=$amount*(1+$interest)+$fine;
   $Date=date("Y-m-d H:i:s");
   $due_date=date('Y-m-d', strtotime($Date. ' + 21 days'));
  $data = array('customer_name' => $name, 'identification'=>$id_num,'amount'=>$amount,'total_loan'=>$total_loan,'interest'=>$interest,'fine'=>$fine,'pricipal'=>$pricipal,'due_date'=>$due_date,'agent'=>$agent,'officer'=>$officer);
// var_dump($data);
  $this->Client_model->registerLoan($data);


}
function createEmployee(){
  
    $name=$this->input->post('employee');
    $id_num=$this->input->post('identification1');
    $salary=$this->input->post('salary');
    $designation=$this->input->post('designation');
   $commission=$this->input->post('commission1');
   $data = array('name' =>$name ,'identification'=>$id_num,'designation'=>$designation,'salary'=>$salary,'commission'=>$commission,'status'=>1 );
  //check if has unpaid loan if no...below
   //create 
   //var_dump($data);
   $this->Client_model->registerEmployee($data);

}
function createUser(){
  
    $username=$this->input->post('username');
    $email=$this->input->post('email');
    $pass=$this->input->post('password');
    $pass1=$this->input->post('password1');
    //$designation=$this->input->post('designation');
    $password= password_hash($pass, PASSWORD_DEFAULT);
   $data = array('username' =>$username ,'password'=>$password,'email'=>$email);
  //check if has unpaid loan if no...below
   //create 
   //var_dump($data);
   if($pass==$pass1){
    $this->Client_model->registerUser($data);
   }
   // $this->Client_model->registerUser($data);

}
function test(){
  $data = array('customer_name' => 'Isaac', 'identification'=>12255,'amount'=>50,'total_loan'=>52,'interest'=>0.5,'fine'=>0,'due_date'=>'2019-02-13 ');
  $this->Client_model->registerLoan($data);
}

}