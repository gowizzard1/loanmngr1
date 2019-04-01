<?php
class Client_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_clients($id=null) {
		if(isset($id)) {
			$query = $this->db->get_where('clients', array('id' => $id));
			$result = $query->row_array();
		}else { 
			$this->db->order_by('firstname', 'ASC');
			$query = $this->db->get('clients');
			$result = $query->result_array();
		}
		return $result;
	}
	function getUsers(){
		$query=$this->db->get('accounts');
		return $query;
	}
	function fetchDesignationsOff(){
		 $this->db->where('designation','officer');
		$query = $this->db->get('employees');
			//$result = $query->result_array();
			return $query;
			
	}
	function fetchDesignations(){
		 $this->db->where('designation','agent');
		$query = $this->db->get('employees');
			//$result = $query->result_array();
			return $query;
			//$this->db->where('identification',$id);
	}
	function getPaymentsReports($to,$from){
        
		//$from=date('Y-m-d h:m:s',strtotime("-1 days"));
  //          $to=date('Y-m-d h:m:s ');
          //echo $from;
          
			
			$this->db->where('date_created >=',$from);
			//$this->db->where('date_created <=',$to);
           $result = $this->db->get('tbl_payments');
			//$query=$this->db->query("SELECT * FROM tbl_payments WHERE date_created BETWEEN $from AND $to ");
			return $result;
	}
	 function getPaymentsReps(){
  $sp=$this->Client_model->getPaymentsReports()->result();
  var_dump($sp);
}
	function fetchAllDesig(){
		 //$this->db->where('designation','agent');
		$query = $this->db->get('employees');
			//$result = $query->result_array();
			return $query;
			//$this->db->where('identification',$id);
	}
	public function create_customer($firstname, $lastname, $address) {
		$data = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'address' => $address
		);
	var_dump($firstname);
		$query = $this->db->insert('clients', $data);
		return $this->db->affected_rows();
	}

	public function new_transaction($client_id) {
		$u_in = $this->input->post();
		$data = array(
			'client_id' => $client_id,
			'date' => $u_in['date'],
			'amount' => $u_in['amount'],
			'charge' => $u_in['charge'],
			'comment' => $u_in['comment'],
			'type' => $u_in['type']
		);

		$query = $this->db->insert('transactions', $data);
		return $this->db->affected_rows();
	}
 	function registerLoan($data){
 		//var_dump ($data);
 		$name=$data['customer_name'];
 		$id=$data['identification'];
 		$amount=$data['amount'];
 		$total_loan=$data['total_loan'];
 		$fine=$data['fine'];
 		$officer=$data['officer'];
 		$agent=$data['agent'];
 		$interest=$data['interest']*$amount;
 		$due_date=$data['due_date'];
 		$principal=$amount+$interest;
 		//check if has a loan before and is paid
        $status=$this->checks($id);
        // echo ($status) ;
        // exit();
       if($status=='paid' OR (empty($status))) {
         $query=$this->db->query("INSERT INTO `loan` (`id`, `customer_name`, `identification`, `amount`, `interest`, `fine`, `total_loan`,`principal`, `status`,`agent`,`officer`, `date_issued`, `date_due`) VALUES (NULL, '$name', '$id', '$amount', '$interest', '$fine', '$total_loan','$principal', 'Unpaid','$agent','$officer', CURRENT_TIMESTAMP, '$due_date')");
       }
       else{
         echo "Cannot have loan";
       }
    }
       // $query=$this->db->query("INSERT INTO `loan` (`id`, `customer_name`, `identification`, `amount`, `interest`, `fine`, `total_loan`,`principal`, `status`,`agent`,`officer`, `date_issued`, `date_due`) VALUES (NULL, '$name', '$id', '$amount', '$interest', '$fine', '$total_loan','$principal', 'Unpaid','$agent','$officer', CURRENT_TIMESTAMP, '$due_date')");

  //}
   function checks($id){

        //get all the table tbl_payments
        //paginate
     // $id=1568955;
     $ch=$this->Client_model->checkStatus($id)->result();
     foreach ($ch as $key => $value) {
       var_dump($value->status);
       return $value->status ;
      // exit();
     }
     
    // if($ch->){
    //   echo "iko hapa";
    // }else{
    //   echo "string";
    // }
    }
  function checkStatus($id){
  	//
  	 $this->db->where('identification',$id);
		$query = $this->db->get('loan');
			//$result = $query->result_array();
			return $query;
  }
  function payKaloa($data){
  	    $amount=$data['amount'];
 		$id=$data['id'];

 		$query=$this->db->query("INSERT INTO `employees` (`id`, `name`, `identification`, `designation`, `salary`, `commission`, `status`) VALUES (NULL, '$name', '$id', '$desig', '$salo', '$comm', '1')");
  }
  function registerEmployee($data){
 		//var_dump ($admin);
 		$name=$data['name'];
 		$id=$data['identification'];
 		$desig=$data['designation'];
 		$salo=$data['salary'];
 		$comm=$data['commission'];
   //      //  $this->db->insert('employees', $admin);
   //      // return $this->db->affected_rows();
  	 $query=$this->db->query("INSERT INTO `employees` (`id`, `name`, `identification`, `designation`, `salary`, `commission`, `status`) VALUES (NULL, '$name', '$id', '$desig', '$salo', '$comm', '1')");
  }
  function registerUser($data){
 		//var_dump ($data);
 		$username=$data['username'];
 		$password=$data['password'];
 		$email=$data['email'];
 		
   //      //  $this->db->insert('employees', $admin);
   //      // return $this->db->affected_rows();
  	 $query=$this->db->query("INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES (NULL, '$username', '$password', '$email')");
  }

   function updatePayment($amount,$id){
    
 	$query=$this->db->query("UPDATE `loan` SET `total_loan`='$amount' WHERE `identification`='$id'");
 }
 function addPayment($id,$amount,$name,$interest,$agent){
 	$query=$this->db->query("INSERT INTO `tbl_payments` (`id`, `name`,`agent`, `identification`, `amount`, `interest`,`date_created`) VALUES (NULL,'$name','$agent', '$id', '$amount','$interest', CURRENT_TIMESTAMP)");
 }
  function completePayment($amount,$id){
     
 	$query=$this->db->query("UPDATE `loan` SET `total_loan`='$amount',`status`='paid' WHERE `identification`='$id'");
 }
 function getLoanParams($id){
 	$this->db->where('identification',$id);
 	$this->db->where('status','Unpaid');
 	$query = $this->db->get('loan');
			$result = $query->result_array();
		return $result;
 }
 //    function officerSaloo($from,$to){
 //    	$this->db->where('date_created >=',$from);
 //    $this->db->where('designation','officer');
 	
 // 	$query = $this->db->get('employees');
	// //$result = $query->result_array();
	// 	return $query;
 //    }
 function officerSaloo($from,$to){
 	$query=$this->db->query("SELECT * FROM employees WHERE designation='officer' AND date_created BETWEEN '$from' AND '$to'");
 	return $query;
 }
    function salesPerAgent($from,$to){
      //$this->db->where('date_created >=',$from);
    	//echo $from;
		$query =  $this->db->query("SELECT agent, identification, SUM(interest) as value_sum FROM tbl_payments WHERE date_created BETWEEN  '$from' AND '$to' GROUP BY name ");
		
		return $query;
    }
	public function get_transactions($client_id) {
		$this->db->group_by('group_code');
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get_where('transactions', array('client_id' => $client_id));
		$result = $query->result_array();
		return $result;
	}

	public function transaction($group_code) {
		$query = $this->db->get_where('transactions', array('group_code' => $group_code));
		$result = $query->result_array();
		return $result;
	}
	function getLoanAmount($id)
	{

		$this->db->where('identification',$id);
		return $this->db->get('loan');
	}


	public function loan_information($group_code) {
		$query = $this->db->get_where('transactions', array('group_code' => $group_code));
		$result = $query->row_array();
		return $result;
	}

	public function add_loan($client_id) {
		$u_in = $this->input->post();
		$data = array(
			'client_id' => $client_id,
			'date' => $u_in['date'],
			'amount' => $u_in['amount'],
			'rate' => $u_in['rate'],
			'code' => $u_in['code']
		);
		$query = $this->db->insert('loans', $data);
		return $this->db->affected_rows();
	}

	public function get_loans($client_id) {
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get_where('loans', array('client_id' => $client_id));
		$result = $query->result_array();
		return $result;
	}

	public function get_unpaid() {
		$this->db->where('status','Unpaid');
		 return $this->db->get('loan');
		
		//var_dump($query);
	}
      public function get_paid() {
		$this->db->where('status','Paid');
		 return $this->db->get('loan');
		// $this->db->select('c.firstname, c.lastname, l.amount, l.date_due, l.id, l.identification');
		// $this->db->from('customers c, loan l');
		// $this->db->where('l.status', 'Unpaid');
		// $this->db->where('c.identification = l.iidentification');
		// //$this->db->order_by('date', 'ASC');
		// $query = $this->db->get()->result();
		//$result = $query->result_array();
		//return $result;
		var_dump($query);
	}
	// /* Retrieve customers */
	// public function get_customer($id=null) {
	// 	/* Specific user */
	// 	if(isset($id)) {
	// 		$query = $this->db->get_where('clients', array('id' => $id));
	// 		$result = $query->row_array();
	// 	}else { 
	// 		/* All users */
	// 		$query = $this->db->get('clients');
	// 		$result = $query->result_array();
	// 	}
	// 	return $result;
	// }

	public function add_payment($client_id) {
		$u_in = $this->input->post();
		$data = array(
			'loan_id' => $u_in['code'],
			'date' => $u_in['date'],
			'amount' => $u_in['amount'],
			'description' => $u_in['description']
		);
		$query = $this->db->insert('payments', $data);
		return $this->db->affected_rows();
	}

	public function get_payments($loan_id) {
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get_where('payments', array('loan_id' => $loan_id));
		$result = $query->result_array();
		return $result;
	}

	public function updateLoanStatus($loan_id, $status) {
		$this->db->where('id', $loan_id);
		$this->db->update('loans', array('status'=>$status));
	}
}