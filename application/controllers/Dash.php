<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){
        parent::__construct();
        $this->load->helper("myHelper");
		
		// load model
		$this->load->model('User_model','',TRUE);
    }

    public function index(){
		
		//$this->output->enable_profiler(TRUE);
		
		//$data = array('title'=>'Dashboard');

	//	if (isCompanyUser()) {		
 		
			$data['users']= $this->User_model->getUsers();
					}
// 			$data['leads']= $this->Common_model->get_row('leads',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['contacts']= $this->Common_model->get_row('contacts',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['clients']= $this->Common_model->get_row('clients',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['proposals']= $this->Common_model->get_row('proposals',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['invoices']= $this->Common_model->get_row('invoices',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['tickets']= $this->Common_model->get_row('tickets',array('parent_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['tasks']= $this->Common_model->get_row('tasks',array('parent_id' => getUserId(),'precentage >'=>0,'precentage <' =>100),array('COUNT(*) AS counts'));


// 			$data['all_time_income']       = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'income'),array('SUM(amount) AS total'));

// 			$data['last_month_income'] = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'income', 'MONTH(transaction_date)' => date('Y-m', strtotime('last month')) ),array('SUM(amount) AS total'));

// 			$data['this_month_income'] = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'income', 'MONTH(transaction_date)' => date('Y-m')),array('SUM(amount) AS total'));

			
// 			$data['all_time_expenses']  = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'expense'),array('SUM(amount) AS total'));
// 			$data['last_month_expenses'] = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'expense', 'MONTH(transaction_date)' => date('Y-m', strtotime('last month')) ),array('SUM(amount) AS total'));
// 			$data['this_month_expenses'] = $this->Common_model->get_row('income_expenses',array('parent_id' => getUserId(), 'transaction_type'=>'expense', 'MONTH(transaction_date)' => date('m')),array('SUM(amount) AS total'));


// //
// 			$columnsName = array('user_packages.*','packages.package_name','packages.validity','packages.trial_free');
// 			$joinTable  = array(
// 				'user_packages' => array('join_table_column' => 'user_packages.user_id','from_table_column' => 'users.id','join_type' => 'left'),
// 				'packages' => array('join_table_column' => 'packages.id','from_table_column' => 'user_packages.package_id','join_type' => 'left')
// 				);		
// 	        $data['user_packages'] = $this->Common_model->get_join_row('users',$joinTable, getCommonWhereCondition(array('user_packages.status'=> 1),'user_packages.') , $columnsName);
// 	        //var_dump($data['user_packages']);

// 		//}

// 		if (isEmployeeUser()) {		
 		
// 			$data['users']= $this->Common_model->get_row('users',array('id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['leads']= $this->Common_model->get_row('leads',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['contacts']= $this->Common_model->get_row('contacts',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['clients']= $this->Common_model->get_row('clients',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['proposals']= $this->Common_model->get_row('proposals',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['invoices']= $this->Common_model->get_row('invoices',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['tickets']= $this->Common_model->get_row('tickets',array('user_id' => getUserId()),array('COUNT(*) AS counts'));
// 			$data['tasks']= $this->Common_model->get_row('tasks',array('user_id' => getUserId(),'precentage >'=>0,'precentage <'=>100),array('COUNT(*) AS counts'));


// 			$data['all_time_income']       = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'income'),array('SUM(amount) AS total'));

// 			$data['last_month_income'] = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'income', 'MONTH(transaction_date)' => date('Y-m', strtotime('last month')) ),array('SUM(amount) AS total'));

// 			$data['this_month_income'] = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'income', 'MONTH(transaction_date)' => date('Y-m')),array('SUM(amount) AS total'));

			
// 			$data['all_time_expenses']  = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'expense'),array('SUM(amount) AS total'));
// 			$data['last_month_expenses'] = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'expense', 'MONTH(transaction_date)' => date('Y-m', strtotime('last month')) ),array('SUM(amount) AS total'));
// 			$data['this_month_expenses'] = $this->Common_model->get_row('income_expenses',array('user_id' => getUserId(), 'transaction_type'=>'expense', 'MONTH(transaction_date)' => date('m')),array('SUM(amount) AS total'));
// 		}
		
// 		if(isAdminUser()){
// 		//print_r($data);
//  			$data['allCompanies']= $this->Common_model->get_row('users',array('role' => 1),array('COUNT(*) AS counts'));
//  			$data['activeCompanies']= $this->Common_model->get_row('users',array('role' => 1,'status'=>1),array('COUNT(*) AS counts'));
//  			$data['deactiveCompanies']= $this->Common_model->get_row('users',array('role' => 1,'status'=>0),array('COUNT(*) AS counts'));
//  			$data['template']='admin/dashboard/admin';
//  		}else{
//  			$data['template']='admin/dashboard/index';
//  		}

// 		$this->load->view('layouts/admin/layout', $data);
// 	}
  
}