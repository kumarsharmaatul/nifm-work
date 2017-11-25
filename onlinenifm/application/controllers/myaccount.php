<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Atul kumar sharma
* Date  : 19 Aug,2014
* Description: Myaccount controller class
* This is only viewable to those members that are logged in
* Version 2.1
*/
class Myaccount extends CI_Controller{
	var $image_path;
	var $data=array();
	
 
//For Contructor 
function __construct(){
	parent::__construct();
	$this->check_isvalidated();
	$this->lang->load('variables', 'english');
	$this->load->model('mmodule');
	$this->load->model('muser');
	$this->load->helper('text');
	$this->image_path = realpath(APPPATH.'../'.$this->config->item('dir_dynamic_images'));
	$this->load->library('cart');
    $this->load->library('form_validation');
	$this->load->library('session');
	$this->data['announcements']=$this->mmodule->getData('announcement',array('ShortDesc','DateAdded','ID','Title'),array('Status'=>'Active','Limit'=>4,'SortBy'=>'DateAdded','SortDir'=>'desc'));
	$this->data['info_guide']=$this->mmodule->getData('info_guide',array('ShortDesc','DateAdded','ID','Title'),array('Status'=>'Active','Limit'=>4,'SortBy'=>'DateAdded','SortDir'=>'desc'));
	$this->load->library('email');
	

   //use this for your Myaccount page
}




		//Default function for myaccount
	public function index(){
		// If the user is validated, then this function will run
		// Add a link to logout
		$data='';
		$this->maHeader();
		$this->maLeft();
		$data['siteData']=$this->mmodule->getData('site_config',array('*'),array('SiteID'=>'1'));
		$data['announcements']=$this->mmodule->getData('announcement',array('ShortDesc','DateAdded','ID','Title'),array('Status'=>'Active','Limit'=>4,'SortBy'=>'ID','SortDir'=>'desc'));
		//$data['blogs']=$this->mmodule->getData('blogs',array('PostID','Title','PostImage','ShortDesc'),array('Status'=>'Active','Limit'=>3,'SortBy'=>'PostID','SortDir'=>'desc'));
		
		$data['blogs'] = $this->mmodule->getLBlogrightcat();
		
		
		$data['forums']=$this->mmodule->getData('forum',array('ForumID','Title','ShortDesc','LastActivity','DateAdded'),array('Status'=>'Active','Limit'=>3,'SortBy'=>'ForumID','SortDir'=>'desc'));
		$data['modules']=$this->mmodule->getData('modules',array('ModuleID','mrp','Price','ShortDesc','Duration','Title','language','Image','IsBuy'),array('Status'=>'Active','Order by'=>rand()));
		$this->data['info_guide']=$this->mmodule->getData('info_guide',array('ShortDesc','DateAdded','ID','Title'),array('Status'=>'Active','Limit'=>5,'SortBy'=>'ID','SortDir'=>'desc'));
		$data['demo_video1']=$this->mmodule->getData('demo_video',array('*'),array('Status'=>'Active','SortBy'=>'id','SortDir'=>'desc','Limit'=>3));	
		$this-> load-> view('myaccount',$data);
		$this->maFooter();
	}

//Function to check user data (Is user logged in or not)
private function check_isvalidated(){
	if(! $this->session->userdata('validated')){
		redirect('/');
	}
}



	// Function to create my account header part
	private function maHeader(){
		$data['siteData']=$this->mmodule->getData('site_config',array('*'),array('SiteID'=>'1'));
		$data['msg'] = "Welcomec &nbsp;" . $this->session->userdata('FirstName').'&nbsp;' . $this->session->userdata('LastName');;
		$data['link'] = 'myaccount';
		$data['UserID'] =  $this->session->userdata('UserID');
		$data['modules']=$this->mmodule->getData('modules',array('ModuleID','Price','ShortDesc','Duration','Title','Image','IsBuy'),array('Status'=>'Active','Limit'=>6));
		$this->load->view('page_header',$data);
		$this->load->view('header');
		$this->load->view('navigation');
	}


	private function maHeaderVideo(){
		$data['siteData']=$this->mmodule->getData('site_config',array('*'),array('SiteID'=>'1'));
		$data['msg'] = "Welcomec &nbsp;" . $this->session->userdata('FirstName').'&nbsp;' . $this->session->userdata('LastName');;
		$data['link'] = 'myaccount';
		$data['UserID'] =  $this->session->userdata('UserID');
		$data['modules']=$this->mmodule->getData('modules',array('ModuleID','Price','ShortDesc','Duration','Title','Image','IsBuy'),array('Status'=>'Active','Limit'=>6));
		$this->load->view('page_header',$data);
		$this->load->view('header');
		$this->load->view('navigation');
		//$this->load->view('slider',$data);
		//$this->load->view('newsletter');
		
	}


	//Function to create myaccount footer part
	private function maFooter(){
		$data['footer_links']=$this->mmodule->getData('footerlink',array('*'),array('IsEnable'=>'1','SortBy'=>'Priority'));
		$data['modules1']=$this->mmodule->getData('modules',array('ModuleID','Price','ShortDesc','Duration','Title','Image','IsBuy'),array('Status'=>'Active','FooterShow'=>'Active','SortBy'=>'DateAdded'));
		$data['group_company']=$this->mmodule->getData('group_company',array('*'),array('Status'=>'Active'));
				$this -> load -> view('footer',$data);
	}



	//Function to create myaccount left part
	private function maLeft(){
				 $UserID = getUserID();
				$data['userData'] = $this->muser->getUserData('users',array('Password','UserPic'),array('UserID'=>$UserID));
				$data['employers']=$this->mmodule->getData('employers',array('Image','Title','URL'),array('Status'=>'Active','order by'=>'rand()'));
				$data['online_users']=$this->mmodule->getData('users',array('FirstName','UserID','LastName'),array('Online'=>'1'));
				$this -> load -> view('myaccount_left',$data);
	}
	
	//Function for logout
	public function do_logout(){
		$UserID = getUserID();
		$this->muser->logoutUser($UserID);
		$this->session->sess_destroy();
		redirect('/');
	}
	//End logout function
	
	
	//function to show all courses
	function allCourses(){
		$data['heading']='All Courses';
			   $this->maHeader();		
			   $this-> load-> view('all_courses',$data);
			  $this->maFooter();
	}
	//End


	
	//function to show all announcements
	function announcements(){
		$data['heading']='All Announcements';
		$data['announcements']=$this->mmodule->getData('announcement',array('ShortDesc','DateAdded','Title','ID'),array('Status'=>'Active','SortBy'=>'DateAdded'));
			   $this->maHeader();
			   $this->maLeft();		
			   $this-> load-> view('view_all_annoucements',$data);
			  $this->maFooter();
	}
	//End
	
	//function to show all information guide
	function info_guide(){
		$data['heading']='Information Guide';
		$data['info']=$this->mmodule->getData('info_guide',array('ShortDesc','DateAdded','Title','ID'),array('Status'=>'Active','SortBy'=>'DateAdded'));
			   $this->maHeader();	
			   $this->maLeft();	
			   $this-> load-> view('view_all_info',$data);
			  $this->maFooter();
	}
	//End
	
	
	
	
	//function for ask question for course
	function askquestion(){
		$data['heading']='Ask Question';
		$this->maHeader();
		$this->maLeft();
		$this-> load-> view('askquestion',$data);
		 $this->maFooter();
	}
	//End
	
	
	
	
	
	
	//Functio to second step of cart
	function step2(){
		if($this->input->post("Discount")){//if discount code and voucher code there redirect include only discount code
			
		$UserID = getUserID();
		$data['heading']='Billing Information';
		$this->maHeader();
		$this->maLeft();
		$data['userData'] = $this->muser->getUserData('users',array('Address','ContactNo','City','State'),array('UserID'=>$UserID));
		$this-> load-> view('cart2',$data);
		 $this->maFooter();
			
		}elseif($this->input->post("Voucher")){//if voucher code there
		$this->input->post("Voucher");
		//$data['VoucherData']= $this->muser->getUserData('generate_voucherCode',array('course_id','coupon_code','valid_till'),array('coupon_code'=>$this->input->post("Voucher"),"course_id"=>$this->input->post("course_id"),"used_to"=>'',"disableEnable"=>'0'));
		$query = $this->db->query("SELECT `course_id`, `coupon_code`, `valid_till` FROM (`generate_voucherCode`) WHERE IFNULL(used_to='',TRUE) AND `course_id` = '".$this->input->post("course_id")."' AND `coupon_code` = '".$this->input->post("Voucher")."' AND `disableEnable` = '0'");
		//echo $this->db->last_query();
		//$data['VoucherData'] = $query->row_array();
		$row = $query->row_array();
		 $row['coupon_code'];
		 //echo $data['VoucherData'][0]['coupon_code'];
		
		$CurrentDate = date ("d-m-Y");
		
		//$originalDate = "2010-03-21";
		$VoucherTill = date("d-m-Y", strtotime($row['valid_till']));
		 //$VoucherTill = date("d-m-Y", strtotime($data['VoucherData'][0]['valid_till']));
		//var_dump($CurrentDate<$VoucherTill); 
		//var_dump($VoucherTill<$CurrentDate);
		//exit();
	 	
		/*exit;  */
		//var_dump( $this->cart->total_items()); exit;
		if($this->cart->total_items() > 1){//if course more then one 
					echo "<script language=\"javascript\">alert('You Select Multiple Course');
					window.location.href='http://www.onlinenifm.com/myaccount/my_cart';
					</script>";
		}
		//elseif($data['VoucherData'][0]['coupon_code']==""){
			elseif($row['coupon_code']==""){
			//echo"<script>alert(Wrong Voucher Code);</script>";
			echo "<script language=\"javascript\">alert('Wrong Voucher Code');
			window.location.href='http://www.onlinenifm.com/myaccount/my_cart';
			</script>";
			//redirect("myaccount/my_cart");
		//}elseif($CurrentDate<$VoucherTill){	
		}elseif($VoucherTill<$CurrentDate){
			//echo"<script>alert(Wrong Voucher Code);</script>";
			echo "<script language=\"javascript\">alert('Voucher Code Expire');
			window.location.href='http://www.onlinenifm.com/myaccount/my_cart';
			</script>";
			//redirect("myaccount/my_cart");
			
		}else{
		
		$UserID = getUserID();
		$data['heading']='Billing Information';
		$this->maHeader();
		$this->maLeft();
		$data['userData'] = $this->muser->getUserData('users',array('Address','ContactNo','City','State'),array('UserID'=>$UserID));
		$this-> load-> view('cart2',$data);
		$this->maFooter();
		}
		}else{
			
			
		$UserID = getUserID();
		$data['heading']='Billing Information';
		$this->maHeader();
		$this->maLeft();
		$data['userData'] = $this->muser->getUserData('users',array('Address','ContactNo','City','State'),array('UserID'=>$UserID));
		$this-> load-> view('cart2',$data);
		 $this->maFooter();
			
		}
	}
	//End
	
	
	//Function for change password
	function change_password($data=array()){
		$data['heading']='Change Password';
		$UserID = getUserID();
		$data['userData'] = $this->muser->getUserData('users',array('Password','UserPic'),array('UserID'=>$UserID));
	
		$this->maHeader();
		$this->maLeft();
		$this-> load-> view('change_password',$data);
		 $this->maFooter();
	}
	//End 
	
	
	
	//function for edit profile
	function editProfile($data=array()){
		
		$data['heading']='Edit Profile';
		$UserID = getUserID();
		$this -> load -> model( 'muser');
		$data['userData'] = $this->muser->getUserData('users',array('*'),array('UserID'=>$UserID));
		$this->maHeader();
		$this->maLeft(); 		
		$this-> load-> view('edit_profile',$data);
		 $this->maFooter();
	}
	//End 
	
	
	
	
	
	//function for edit profile picture
	function editPic(){
		$data['heading']='Edit Profile Picture';
		$UserID = getUserID();
		$data['userData'] = $this->muser->getUserData('users',array('Password','UserPic'),array('UserID'=>$UserID));
		$this->maHeader();
		$this->maLeft(); 	 		
		$this->load->view('change_image',$data);
		$this->maFooter();
	}
	//End 
	
	
	//function for order history
	function orderHistory(){
		$data['heading']='Order History';
		$this->maHeader();
		$this->maLeft();
		$UserID = getUserID();
		$data['orders']=$this->mmodule->getData('orders',array('OrderID','OrderCode','OrderDate','OrderStatus','OrderTotal'),array('UserID'=>$UserID));	
		$this-> load-> view('order_history',$data);
		$this->maFooter();
	}
	//End 
	
	
	//function for order details
	function orderDetail($OrderID){
		$data['heading']='Order Detail';
		$this->maHeader(); 
		$this->maLeft(); 
		$UserID = getUserID();
		
		$data['orderDetail']=$this->muser->getOrderData($OrderID);
		$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$OrderID));			
		$this-> load-> view('order_detail',$data);
		$this->maFooter();
	}
	//End 
	
	
	
	//function for purchased course
	function mycourse(){
		$data['heading']='Purchased courses';
		$this->maHeader(); 
		$this->maLeft(); 
		$UserID = getUserID();
		$data['module_data']=$this->muser->getOrderModules($UserID);			
		$this-> load-> view('purchased_course',$data);
		$this->maFooter();
	}
	//End 
	
	
	
	//function for Certificate 
	function mycertificate(){
		$data['heading']='My Certificate';
		$this->maHeader(); 
		$this->maLeft(); 
		$UserID = getUserID();
		$data['module_data']=$this->muser->getOrderModules($UserID);			
		$this-> load-> view('my_certificate',$data);
		$this->maFooter();
	}
	//End 	
	
	
	
	
	
	//function for view Certificate pdf formate 
	function mycertificatePdf($ID){
		$data['heading']='My Certificate';
		//$this->maHeader(); 
		//$this->maLeft(); 
		$UserID = getUserID();
		$data['module_datac']=$this->muser->getCourseCertificate($ID);			
		$this-> load-> view('my_certificate_pdf',$data);
		
			// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		//$dompdf->set_paper('letter', 'landscape');
		$this->dompdf->set_paper('letter', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("certificate.pdf", array("Attachment" => false));
		
		//$this->maFooter();
	}
	//End 	
	
	
	
	
	
	//function for course_detail
	function courseDetail(){
		$data['heading']='Course Details';
		$this->maHeader(); 		
		$this-> load-> view('course_detail',$data);
		$this->maFooter();
	}
	//End 
	
	
	
	
	
	//function for counselling 
	function counselling(){
		$data['heading']='Counselling';
		$this->maHeader(); 	
		$this->maLeft(); 	
		$this-> load-> view('counselling',$data);
		$this->maFooter();
	}
	//End 
	
	
	//function for assignments 
	function assignment(){
		$data['heading']='Assignments/Projects';
		$data['assignments']=$this->mmodule->getData('assignment',array('*'),array('Status'=>'Active'));
		$this->maHeader(); 	
		$this->maLeft(); 	
		$this-> load-> view('assignments',$data);
		$this->maFooter();
	}
	//End 
	
	
	//function to get user assignments 
	function user_assignment(){
		$UserID = getUserID();
		$data['heading']='User Assignments';
		$this->load->model('muser');
		$data['userAssignments']=$this->muser->getUserAssignment($UserID);
		$this->maHeader(); 	
		$this->maLeft(); 	
		$this-> load-> view('user_assignment',$data);
		$this->maFooter();
	}
	//End 
	
	
	
	//Function for processing forms
	function process($form){
		 $UserID = getUserID(); 
		
		if($form=='edit_profile'){
			  $this->form_validation->set_rules('FirstName', 'First Name', 'trim|required');
			  $this->form_validation->set_rules('LastName', 'Last Name', 'trim|required');
			  $this->form_validation->set_rules('ContactNo', 'Contact no', 'trim|required');
			  $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
			  
	
		 if ($this->form_validation->run() == FALSE)
			{
				$this->editProfile();		
				
			}
			else
			{
				$updateProfile=$this->muser->UpdateUser($UserID);
				if($updateProfile){
					$this->session->set_flashdata( 'message','Your Profile has been updated successfully.');
				}else{
					$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				redirect('myaccount/editprofile');
			}
		}
		//For Adding Testimonials
		if($form=='testimonial'){
			  
			  $this->form_validation->set_rules('Message', 'Message', 'trim|required');
	
		 if ($this->form_validation->run() == FALSE)
			{
				$this->maHeader();
				$this->maLeft();
				$this->load->view('my_testimonial');
				$this->maFooter();
			}
			else
			{		
				$this->load->model('muser');
				$testimonial=$this->muser->AddTestimonial();
				if($testimonial){
					$this->session->set_flashdata( 'message','Your Testimonial has been submitted successfully for admin approval.');
					//$this->data['email']="testimonial";
					//$MailMsg = $this->load->view('email_template', $this->data, true);
					$MailMsg = "<b>".$this->session->userdata('Name')." Submiting a Testimonial please verify.</b></br>
					 <tr><td colspan='2'>&nbsp;</td></tr>
					 <tr><td>Name </td><td> " .$this->session->userdata('Name')."</td></tr>
					<tr><td>Email Id: </td><td>" .$this->session->userdata('Email')."</td></tr>
					<tr><td>Testimonial. </td><td>".$this->input->post('Message')."</td></tr>
					";
					$subject = "New Testimonial at Online NIFM";
					$from = "info@onlinenifm.com";
					$fromname = "NIFM";
					$to = "info@onlinenifm.com";
					//$bcc = "gabruthe@gmail.com";
					 //($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
					$this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc);
					
							
				}else{
				$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				redirect('myaccount/my_testimonial');
			}
		}
		//End Testimonial
		
		
		
		if($form=='counselling'){
			  $this->form_validation->set_rules('Name', 'Name', 'trim|required');
			  $this->form_validation->set_rules('ContactNo', 'Contact no', 'trim|required');
			  $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
			  $this->form_validation->set_rules('Message', 'Message', 'trim|required');
	
		 if ($this->form_validation->run() == FALSE)
			{
				$this->maHeader();
				$this->maLeft();
				$this->load->view('counselling');
				$this->maFooter();
			}
			else
			{		
				$this->load->model('muser');
				$counselling=$this->muser->AddCounselling();
				if($counselling){
					$this->session->set_flashdata( 'message','Your Query for Counselling has been submitted successfully.');
				}else{
				$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				//Send mail for couselling
				//$data['email']="OrderConfirm";
				//$this->email->from('info@onlinenifm.com', 'NIFM');
				//$this->email->to('info@onlinenifm.com'); 
				//$this->email->cc('info@onlinenifm.com'); 
				//$this->email->bcc('info@nifm.in'); 
				//$this->email->subject('New Query for counselling');
				$MailMsg='<table width="400px" border="0">
						  <tr>
							<td colspan="2">A new query for counselling is received .The details are as follows:<br /></td>
						  </tr>
						  <tr>
							<td colspan="2">&nbsp;</td>
						  </tr>
						  <tr>
							<td>Name</td>
							<td>'.$this->input->post('Name').'</td>
						  </tr>
						  <tr>
							<td>Email</td>
							<td>'.$this->input->post('Email').'</td>
						  </tr>
						  <tr>
							<td>Contact No</td>
							<td>'.$this->input->post('ContactNo').'</td>
						  </tr>
						  <tr>
							<td>Message</td>
							<td>'.$this->input->post('Message').'</td>
						  </tr>
						  <tr>
							<td>Counselling Type</td>
							<td>'.$this->input->post('CounsellingType').'</td>
						  </tr>
						</table>';
				
				
				//$this->email->message($MailMsg);		
				//$this->email->send();		
				
				
				$subject = "New Query for Counselling at Online NIFM";
				$from = "info@onlinenifm.com";
				$fromname = "NIFM";
				$to = "info@onlinenifm.com";
				$bcc = "";
				 //($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
				$this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc);
				redirect('myaccount/counselling');
			}
		}
		
		
		if($form=='askquestion'){
			  $this->form_validation->set_rules('Name', 'Name', 'trim|required');
			  $this->form_validation->set_rules('ContactNo', 'Contact no', 'trim|required');
			  $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
			  $this->form_validation->set_rules('Quest', 'Question', 'trim|required');
	
		 if ($this->form_validation->run() == FALSE)
			{
				$this->maHeader();
				$this->maLeft();
				$this->load->view('askquestion');
				$this->maFooter();
			}
			else
			{
				$this->load->model('muser');
				$askQuest=$this->muser->AddQuestion();
				if($askQuest){
					$this->session->set_flashdata( 'message','Your Question has been submitted successfully.');
				}else{
					$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				//Send mail for ask a question
				$data['email']="askquestion";
				//$this->email->from('info@onlinenifm.com', 'NIFM');
				//$this->email->to('info@onlinenifm.com'); 
				//$this->email->cc('info@onlinenifm.com'); 
				//$this->email->bcc('info@nifm.in'); 
				//$this->email->subject('A new query for ask a question is received');
				
				$MailMsg='<table width="400px" border="0">
						  <tr>
							<td colspan="2">A new query for ask a question is received. The details are as follows:<br /></td>
						  </tr>
						  <tr>
							<td colspan="2">&nbsp;</td>
						  </tr>
						  <tr>
							<td>Name</td>
							<td>'.$this->input->post('Name').'</td>
						  </tr>
						  <tr>
							<td>Email</td>
							<td>'.$this->input->post('Email').'</td>
						  </tr>
						  <tr>
							<td>Contact No</td>
							<td>'.$this->input->post('ContactNo').'</td>
						  </tr>
						  <tr>
							<td>Message</td>
							<td>'.$this->input->post('Quest').'</td>
						  </tr>
						  
						</table>';
					//$this->email->message($MailMsg);		
				//$this->email->send();	
				
				
					$subject = "New Query for Ask a Question at Online NIFM";
					$from = "info@onlinenifm.com";
					$fromname = "NIFM";
					$to = "info@onlinenifm.com";
					$bcc = "";
					 //($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
					$this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc);
				
				
				//echo $this->email->print_debugger();
				redirect('myaccount/askquestion');
				
			}
		}
		
		if($form=='change_password'){
			$this->form_validation->set_rules('Password', 'Password', 'trim|required');
			$this->form_validation->set_rules('ConfPassword', 'Confirm Password', 'trim|required');
		 if ($this->form_validation->run() == FALSE)
			{
				$this->maHeader();
				$this->maLeft();
				$this->load->view('change_password');
				$this->maFooter();
				
			}
			else
			{
			   $updatePassword=$this->muser->UpdateUserPassword($UserID);
				if($updatePassword){
					$this->session->set_flashdata( 'message','Your Password has been updated successfully.');
				}else{
					$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				redirect('myaccount/change_password');
			}
		}
		
		
		
		if($form=='do_upload'){
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']    = '1000';
			$config['max_width']  = '22222';
			$config['max_height']  = '22222';
			$config['overwrite'] = FALSE;
			$config['file_name']  = 'userprofilepic'.$UserID;
			
			$this->load->library('upload', $config);		
			// You can give video formats if you want to upload any video file.
			 
			if (!$this->upload->do_upload())
			{
			$data = array('error' => $this->upload->display_errors());
			$this->editPic($data);		
			// uploading failed. $error will holds the errors.
			}
			else
			{
			$image_data=$this->upload->data();
			$data = $this->upload->data();
			
			
			 $updateUserPic=$this->muser->UpdateUserPic($UserID,$data['file_name']);
				if($updateUserPic){
					$this->session->set_flashdata( 'message','User Image has been updated successfully.');
				}else{
					$this->session->set_flashdata( 'message','There is a error in Processing your request.Please try again.');
				}
				redirect('myaccount/edit-pic');
			}
		}
		
		
		
		
	}
	
	
	//fucntion to upload assignments
	function upload_assignment()
	{
		
		$config['upload_path'] = './upload/assignments';
		$config['allowed_types'] = 'doc|docx|pdf|txt|ppt';
		$config['max_size']    = '5120';
		
		 
		// You can give video formats if you want to upload any video file.
		 
		$this->load->library('upload', $config);
		 
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = $this->upload->display_errors();
			//print_r($error);
			$this->session->set_flashdata( 'assignment_error',$error);
			redirect('myaccount/assignment');
			 
			// uploading failed. $error will holds the errors.
		}
		else
		{
			$uploaded_data = $this->upload->data();
			//print_r($uploaded_data);
			$data = array(
						  'UserID'=>getUserID(),
						  'AssignmentID'=>$this->input->post('AssignmentID'),
						  'Upload'=>$uploaded_data['file_name'],
						  'Status'=>'Active',
						  'DateAdded'=>date("F j, Y, g:i a"),			 
						);
				$this->db->insert('user_assignments',$data);
				$this->session->set_flashdata( 'assignment_success','Your assignment has been uploaded successfully.');
				redirect('myaccount/assignment');
			 
			// uploading successfull, now do your further actions
		}
	}
	
	


/*
	*	Add item to shopping cart 
	*/
	function add($ModuleID)
	{
		//$product_id = $this->input->post('product_id');
		
		//Check for valid product id
		$query = $this->db->get_where('modules',array('ModuleID'=>$ModuleID),1);
		//echo $this->db->last_query();

		
		
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			
			$data = array('id' => $item->ModuleID,
						  'qty' => 1,
						  'price' => $item->Price,
						  'name' => $item->Title,
						  'desc' => $item->ShortDesc,
						  'discount' => $item->discount,
						  'code' => $item->code, 
						  'ExpirCodeDate' => $item->ExpirCodeDate,						  
						  );
			
			//print_r($data);
			
			
			 //$data1=mysql_real_escape_string($data);
			//print_r($data1);
			
			$prin= $this->cart->insert($data);
			
			//echo $this->db->last_query();
			
		}
		
		
		redirect('myaccount/my_cart');
	}
	
	/*
	*	Delete item from cart
	*/
	function delete($id)
	{
		$row_id = $id;
		$data = array('rowid'=>$row_id,
					  'qty' => 0);
		$this->cart->update($data);
		
		//echo $this->db->last_query();
		
		redirect('myaccount/my_cart');
	}
	
	/*
	*	Empty cart contents
	*/
	function empty_cart()
	{
		
		$this->cart->destroy();
		redirect('myaccount/my_cart');
	}
	
	/*
	*	Update items in myaccount
	*/
	function update()
	{
		
		//Get number of items in myaccount
		$count = $this->cart->total_items();
		
		//Get info from POST
		$item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');
		
		//Step through items
		for($i=0;$i < $count;$i++)
		{
			$data = array(
               'rowid' => $item[$i],
               'qty'   => $qty[$i]
            );
			$this->cart->update($data);
			
		}
		
		redirect('myaccount/my_cart');
	}
	
	
	/*
	*	Display shopping cart contents
	*/
	function my_cart()
	{
		
		
		$data['custom_jquery'] = '
		$("input[name=\'delete\']").click(function(){
		   var status = $(this).val();
		   location.href = "'.site_url('myaccount/delete').'/" + status; 
			
})';
		$this->maHeader();
		$this->maLeft();
		$data['title'] = 'My Cart';
		
		$this->load->view('my_cart',$data);
		$this->maFooter();
	}
	
	/*
	*	Display items for sale
	*/
	function view_items()
	{
	
		//Get item from DB
		$query = $this->db->get('product');
		//echo $this->db->last_query();
		$data['items'] = $query;
		
		$data['page_title'] = 'View Items for Sale';
		$this->load->view('myaccount/view_items',$data);
	}
	
	
	
	/*
	*/
	
	function module_detail(){
		//Get item from DB
		$query = $this->db->get('modules');
	
		$query = $this->db->where('ModuleID',$ModuleID);
	}
	
	
		
	function explore($ModuleID,$chapterID='',$mediaID=''){
		
		//Get item from DB
		$UserID = getUserID();
		$purModule=$this->mmodule->getData('products',array('ProductID'),array('Status'=>'1','UserID'=>$UserID,'ModuleID'=>$ModuleID));
		
		if(count($purModule)>0){
			$this->load->helper('function');
		if(!empty($mediaID) && !empty($chapterID) ){
			$data['video_data']=$this->mmodule->getData('media',array('Title','MediaContent'),array('MediaID'=>'SubID','Type'=>$Type));
			$data['chapter_id']=$chapterID;
		}
		
		
		$data['module_data']=$this->mmodule->getData('modules',array('SampleVideo','Title','ModuleID','ebook'),array('Status'=>'Active','ModuleID'=>$ModuleID));
		
		
		$data['chapters']=$this->mmodule->getData('chapters',array('Title','Flash','ChapterID'),array('Status'=>'Active','ModuleID'=>$ModuleID));
		
		$data['e_book']=$this->mmodule->getData('ebook_m',array('Title','ebook','BookID','ModuleID'),array('ModuleID'=>$ModuleID,'Status'=>'Active'));
		
		
		$query = $this->db->query("SELECT * FROM ebook_m where Status='Active' and  ModuleID=$ModuleID and ebook!='' limit 1");

		$data['ebook_if'] = $query->row_array();//fetch ebook is there or not
		
		//echo $this->db->last_query();
		
		
		$query = $this->db->query("SELECT * FROM chapters where Status='Active' and  ModuleID=$ModuleID and Flash!='' limit 1");

		$data['row'] = $query->row_array();
		 $this->maHeaderVideo();		
		  $this->load->view('video1',$data);
		  $this->maFooter();
		}else{
			redirect('/');
			
		}
		
		
		
	}
	
	// For video play
	function play_video($video_id){
		$data['video_data']=$this->mmodule->getData('media',array('Title','MediaContent'),array('MediaID'=>$video_id,'Type'=>'Video'));
	  $this->load->view('diaply_video',$data);
	}

	
	//End Video Play
		
	function get_chapter_data($ModuleID,$ChapterID,$SubID,$Type){
		switch($Type){
		//For flash data	
		case 'flash':
		$data['chapters_flash']=$this->mmodule->getData('chapters',array('Title','Flash','ChapterID'),array('ModuleID'=>$ModuleID,'ChapterID'=>$ChapterID));
		//echo $this->db->last_query();
		//print_r($data['chapters_flash']);
		
		$data['type']=$Type;
		$this->load->view('show_chapter_data',$data);
		break;
		
		//for video data
		case 'video':
		$data['chapters_video']=$this->mmodule->getData('media',array('Title','MediaContent'),array('MediaID'=>$SubID,'Type'=>'Video'));
		$data['type']=$Type;
		$this->load->view('show_chapter_data',$data);
		break;
		
		
		//for slide_share data
		case 'slide':
		//$data['chapters_slide']=$this->mmodule->getData('media',array('Title','MediaContent'),array('MediaID'=>$SubID,'Type'=>'Slide Share'));
		
		//$SubID=$BookID;
		
		$data['book']=$this->mmodule->getData('ebook_m',array('Title','ebook','BookID'),array('ModuleID'=>$ModuleID,'BookID'=>$SubID
		,'Status'=>'Active'));
		
		//$data['chapters_flash']=$this->mmodule->getData('chapters',array('Title','Flash','ChapterID'),array('ModuleID'=>$ModuleID,'ChapterID'=>$ChapterID));
		
		//echo $this->db->last_query();
		//print_r($data['book']);
		
		$data['type']=$Type;
		$this->load->view('show_chapter_data',$data);
		break;
		
		
		//for audio data
		case 'audio':
		$data['chapters_audio']=$this->mmodule->getData('media',array('Title','MediaContent'),array('MediaID'=>$SubID,'Type'=>'Audio'));
		$data['type']=$Type;
		$this->load->view('show_chapter_data',$data);
		break;
		
		//for full test data
		case 'full_test':
		$data['test_data']=$this->mmodule->getData('tests',array('*'),array('TestID'=>$SubID));
		
		$data['module_full_test']=$this->mmodule->getData('questions',array('*'),array('TestID'=>$SubID,'SortBy'=>'RAND()','Limit'=>$data['test_data'][0]['NoOfQuestion']));
		//$data['module_full_test']=$this->mmodule->getData('questions',array('*'),array('TestID'=>$SubID,'Limit'=>$data['test_data'][0]['NoOfQuestion']));
		
		//print_r($data['module_full_test']);
		//echo "<pre></pre>";exit;
		//echo $this->db->last_query();
		$data['type']=$Type;
		$this->load->view('show_chapter_data',$data);
		break;
		
		//for sectioanl test
		case 'sectional_test':
		
      	//$data['chapters_flash']=$this->mmodule->getData('chapters',array('Title','Flash','ChapterID'),array('ModuleID'=>$ModuleID,'TestID'=>$TestID));
		
		
		//$data['module_sectional_test']=$this->mmodule->getData('questions',array('*'),array('TestID'=>$SubID,'SortBy'=>'RAND()','Limit'=>$data['test_data'][0]['NoOfQuestion']));
		
		$data['test_data']=$this->mmodule->getData('tests',array('*'),array('TestID'=>$SubID));
		
		$data['module_sectional_test']=$this->mmodule->getData('questions',array('*'),array('TestID'=>$SubID,'SortBy'=>'RAND()','Limit'=>$data['test_data'][0]['NoOfQuestion']));
		
		
		
		
		
		$data['type']=$Type;
		//echo $this->db->last_query();
		$this->load->view('show_chapter_data',$data);
		break;		
		}
}


		
		//Functio to second step of cart
		function cart_detail(){
			if($this->cart->total_items()>0){
			$UserID = getUserID();
			$data['heading']='Order Overview';
			$this->maHeader();
			$this->maLeft();
			$data['userData'] = $this->muser->getUserData('users',array('Address','ContactNo','City','State'),array('UserID'=>$UserID));
			$this-> load-> view('cart_detail',$data);
			 $this->maFooter();
			}else{
				redirect('myaccount');
			}
			
		}
		//End
		
	
	
	function submit_cart(){
		if($this->cart->total_items()>0){
		$UserID = getUserID();
		$this->muser->update_address($UserID);
		$Discount=$this->input->post("Discount");
		
		
		
		echo $this->session->set_userdata('discount1', $Discount);
		redirect('myaccount/cart_detail');
		}else{
		redirect('myaccount');
		}		
	}
	
	
		function submit_order(){

			 $codeD=ucwords($this->session->userdata("discount1"));
			 $totalD=ucwords($this->session->userdata("totalD"));
			 $subtotalDCe=ucwords($this->session->userdata("subtotalDCe"));
			 
			if($this->cart->total_items()>0){
			$UserID = getUserID();
			$orderCode=$this->muser->submitOrder($UserID);
			$orderQuery= $this->db->query("select * from orders where OrderCode='$orderCode'");
			//$this->db->last_query();	
		
				if ($orderQuery->num_rows() > 0)
				{
				   $row = $orderQuery->row_array(); 
					if(!empty($orderCode) && $row['PaymentType']=='1'){//for COD orders
					   
					  
						$data['orderCode']=$orderCode;
						$this->muser->updateBillerID($orderCode);
						//echo $this->db->last_query();
						//exit();
						$this->maHeader();
						$this->maLeft();
						$this->load->view('order_confirm',$data);
						 $this->sendOrderMail($orderCode);
						$this->maFooter();
					}
					elseif(!empty($orderCode) && $row['PaymentType']=='2'){//Redirect to payment gateway
					    
						$params = array('OrderID'=>$orderCode,'OrderTotal'=>$row['OrderTotal']);
						$this->load->library('CCavenue',$params);
						$data['orderCode']=$orderCode;
						$data['userDetail']=$this->mmodule->getData('users',array('*'),array('UserID'=>$UserID));
						$this->session->set_userdata('userDetail', $data['userDetail']);
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$orderCode));
						$this->session->set_userdata('orderData', $data['orderData']);
						$data['orderCode']=$orderCode;
						$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$data['orderData'][0]['OrderID']));//where clouse useing order id behalf of orderData
						$this->session->set_userdata('products', $data['products']);
						$data['merchant_id']=$this->ccavenue->merchant_id;
						$data['redirect_url']=$this->ccavenue->redirect_url;
						$data['checkSum']=$this->ccavenue->checkSum();	
						$this->maHeader();
						//$this->maLeft();
						$this->sendOrderMail($orderCode);					
						//$this->load->view('submit_payment',$data);
						$this->load->view('payu_order',$data);
						//$this->maFooter();
						
									
					}elseif(!empty($orderCode) && $row['PaymentType']=='3'){//Redirect to free gateway{

						
						$data['userDetail']=$this->mmodule->getData('users',array('*'),array('UserID'=>$UserID));
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$orderCode));//fetch oder detail where is oreder code
						$data['orderCode']=$orderCode;
						
						$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$data['orderData'][0]['OrderID']));//where clouse useing order id behalf of orderData
						
						 $OrderID11=$data['orderData'][0]['OrderID'];
						
							
					//	$data['UpdateorderCode']=$this->muser->updateOrderStatus($OrderID,'1');
							$dataU = array('OrderStatus' => '1',
										   'DateUpdated' => date("F j, Y, g:i a"),
										   'remarks'=>'Free Course'
										);
						
						$this->db->where('OrderID', $OrderID11);
						$this->db->update('orders', $dataU); // update status on orders table			
					
						//echo $this->db->last_query();					
										
										
						$datap = array('Status' =>'1');			
						$this->db->where('OrderID', $OrderID11);
						$this->db->update('products', $datap); 	//update status on products table
					
						$this->muser->updateBillerID($orderCode); // update billing column on order table
						//echo $this->db->last_query();
						$this->maHeader();
						$this->maLeft();
						$this->load->view('free_order',$data);
						$this->sendOrderMail($orderCode);
						$this->maFooter();
					
					}elseif(!empty($orderCode) && $row['PaymentType']=='5'){//Voucher code Submission

						
						$data['userDetail']=$this->mmodule->getData('users',array('*'),array('UserID'=>$UserID));
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$orderCode));//fetch oder detail where is oreder code
						$data['orderCode']=$orderCode;
						$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$data['orderData'][0]['OrderID']));//where clouse useing order id behalf of orderData
						$OrderID11=$data['orderData'][0]['OrderID'];
						$data['VendorNameID']=$this->mmodule->getData('generate_voucherCode',array('issue_to'),array('coupon_code'=>$this->session->userdata("VoucherCodeS")));//where clouse useing Vender id from generate_voucherCode 
						$VendorNameIDIssueTo=$data['VendorNameID'][0]['issue_to'];
						$data['VendorName']=$this->mmodule->getData('generate_vendor',array('vendor_name'),array('vid'=>$VendorNameIDIssueTo));//fetch vendor name detail where is vendeor id
						//echo $this->db->last_query();		
							
					//	$data['UpdateorderCode']=$this->muser->updateOrderStatus($OrderID,'1');
							$dataU = array('OrderStatus' => '1',
										   'DateUpdated' => date("F j, Y, g:i a"),
										   'remarks'=>$this->session->userdata("VoucherCodeS")
										);
						
						$this->db->where('OrderID', $OrderID11);
						$this->db->update('orders', $dataU); // update status on orders table			
					
						//echo $this->db->last_query();					
										
										
						$datap = array('Status' =>'1');			
						$this->db->where('OrderID', $OrderID11);
						$this->db->update('products', $datap); 	//update status on products table
						
						
						$dataVoucherCode = array('used_to' =>$UserID,
												'status'=>'1');			
						$this->db->where('coupon_code', $this->session->userdata("VoucherCodeS"));
						$this->db->update('generate_voucherCode', $dataVoucherCode); 	//update used to  on generate_voucherCode table
					
						//echo $this->db->last_query(); exit;
						
						$this->muser->updateBillerID($orderCode); // update billing column on order table
						
						$this->maHeader();
						$this->maLeft();
						$this->load->view('VoucherOrder',$data);
						$this->sendOrderMail($orderCode);
						$this->maFooter();
					
					}
					
				}
				else{
				redirect('myaccount');
				}
		}
				
	}
	
	
		function redirecturl(){
			 //Collect all return parameters from ccavenue 
			 $Amount= $_REQUEST['Amount'];
			 $Order_Id= $_REQUEST['Order_Id'];
			 $Checksum= $_REQUEST['Checksum'];
			 $AuthDesc=$_REQUEST['AuthDesc'];
			 $params = array('OrderID'=>$Order_Id,'OrderTotal'=>$Amount);
			 $this->load->library('CCavenue',$params);
			 $Checksum=$this->ccavenue->verifyCheckSum($Checksum,$AuthDesc);
			 if($Checksum=="true" && $AuthDesc=="Y")
				{
					$orderCode=$this->muser->updateOrderStatus($Order_Id,'1');
					$data['msg']= "<br>Thank you for shopping with us. Your credit/Debit card has been charged and your transaction is successful. Now you can access the modules. To Explore your Purchase Course please <a href='http://www.onlinenifm.com/myaccount/mycourse'>Click here</a>";
				}
				else if($Checksum=="true" && $AuthDesc=="B")
				{
					$orderCode=$this->muser->updateOrderStatus($Order_Id,'2');
					$data['msg']= "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
				}
				else if($Checksum=="true" && $AuthDesc=="N")
				{
					$orderCode=$this->muser->updateOrderStatus($Order_Id,'2');
					$data['msg']=  "<br>Thank you for shopping with us.However,the transaction has been declined.";
				}
				else
				{
					redirect('myaccount');
				}	
				
				$this->maHeader();
						//$this->maLeft();
				$ename=ucwords($this->session->userdata("Name"));
	
				if(!empty($Order_Id)){
					$data['email']="OrderConfirm";
					$this->email->from('info@onlinenifm.com', 'NIFM');
					$this->email->to($this->session->userdata("Email")); 
					$this->email->bcc('info@onlinenifm.com'); 
					//$this->email->bcc('info@nifm.in'); 
					//$this->email->subject('Order Details of OrderCode : '.$OrderCode.' from Onlinenifm');
					
					$this->email->subject('Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$Order_Id);
					
					$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$OrderID));
					$OrderID=$this->muser->getOrderID($Order_Id);
					$data['orderDetail']=$this->muser->getOrderData($OrderID);
					$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$OrderID));
					$MailMsg = $this->load->view('email_template', $data, true);
					$this->email->message($MailMsg);		
					$this->email->send();				
				}		
								
						
						
						
				$this->load->view('thanks',$data);					
				$this->maFooter();
				
											
									
			
		}
	
	
	function payu_check(){
		
		$this->load->view('payu_check',$data);		
	}
	
	function PayuSuccess(){
			
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$Order_Id = $txnid;
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt="mr5vhAEI";

		If (isset($_POST["additionalCharges"])) {
        $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
          }
		else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	        $data['msg']="Invalid Transaction. Please try again";
		   }
	   else {
           	   
			$orderCode=$this->muser->updateOrderStatus($Order_Id,'1');
			$this->muser->updateBillerID($Order_Id); // update billing column on order table
					$data['msg']= "<br>Thank you for shopping with us. Your credit/Debit card has been charged and your transaction is successful. Now you can access the modules. To Explore your Purchase Course please <a href='http://www.onlinenifm.com/myaccount/mycourse'>Click here</a>";
					$data['msg'].= "<p style='color:#000000'><br><br><br><br><b>Procedure to explore the course:</b><br><br>
									Step:-1. Log onto www.onlinenifm.com / login (if not already done)<br>
									Step:-2. Click on My Account<br>
									Step:-3. Go to My Purchased Courses (on left hand side) in My account<br>
									Step:-4. Your Course Will be displayed on right hand side<br>
									Step:-5. Click on EXPLORE button to explore the course<br>
									Step:-6. Now the Course will be displayed on your screen, Select Chapter1 Video1 OR MOCK TEST on left hand side <br>			
									</p>";	
		   } 
				 
				 $this->maHeader();
								//$this->maLeft();
					$ename=ucwords($this->session->userdata("Name"));

					if(!empty($Order_Id)){
						$data['email']="OrderConfirm";
						//$this->email->from('info@onlinenifm.com', 'NIFM');
						//$this->email->to($this->session->userdata("Email")); 
						//$this->email->bcc('info@onlinenifm.com'); 
						//$this->email->bcc('info@nifm.in'); 
						//$this->email->subject('Order Details of OrderCode : '.$OrderCode.' from Onlinenifm');
						
						$this->email->subject('Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$Order_Id);
						
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$OrderID));
						$OrderID=$this->muser->getOrderID($Order_Id);
						$data['orderDetail']=$this->muser->getOrderData($OrderID);
						$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$OrderID));
						$MailMsg = $this->load->view('email_template', $data, true);
						//$this->email->message($MailMsg);		
						//$this->email->send();	


					$subject = 'Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$Order_Id;
					$from = "info@onlinenifm.com";
					$fromname = "NIFM";
					$to = $this->session->userdata("Email");
					//$to = $this->session->userdata("Email");
					$bcc = "accounts@nifm.in";
					$cc = "info@onlinenifm.com";
					//($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
					$this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc, $cc);


						
					}		
					
					
			$this->load->view('thanks',$data);					
			$this->maFooter();
		 
	}
	
	
	function Payufailure(){
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$Order_Id = $txnid;
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt="mr5vhAEI";

		If (isset($_POST["additionalCharges"])) {
			   $additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
				
						  }
			else {	  

				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

				 }
				 $hash = hash("sha512", $retHashSeq);
		  
			   if ($hash != $posted_hash) {
				   $data['msg']= "Invalid Transaction. Please try again";
				   }
			   else {
					$orderCode=$this->muser->updateOrderStatus($Order_Id,'0');
					$data['msg']= "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";	
					
				 //echo "<h3>Your order status is ". $status .".</h3>";
				 //echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
				  
				 } 
				 
				 
				 $this->maHeader();
								//$this->maLeft();
					$ename=ucwords($this->session->userdata("Name"));

					if(!empty($Order_Id)){
						$data['email']="OrderConfirm";
						$this->email->from('info@onlinenifm.com', 'NIFM');
						$this->email->to($this->session->userdata("Email")); 
						$this->email->bcc('info@onlinenifm.com'); 
						//$this->email->bcc('info@nifm.in'); 
						//$this->email->subject('Order Details of OrderCode : '.$OrderCode.' from Onlinenifm');
						
						$this->email->subject('Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$Order_Id);
						
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$OrderID));
						$OrderID=$this->muser->getOrderID($Order_Id);
						$data['orderDetail']=$this->muser->getOrderData($OrderID);
						$data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$OrderID));
						$MailMsg = $this->load->view('email_template', $data, true);
						$this->email->message($MailMsg);		
						$this->email->send();				
					}		
									
					
					
					
			$this->load->view('thanks',$data);					
			$this->maFooter();
		 
		 
		 
	}
	
	
	
	
	function testing(){
		$UserID = getUserID();
		$orderCode='ORDNIFM38XX111 ';
		$data['orderCode']=$orderCode;
						$data['userDetail']=$this->mmodule->getData('users',array('*'),array('UserID'=>$UserID));
						$data['orderData']=$this->mmodule->getData('orders',array('*'),array('OrderCode'=>$orderCode));
		$params = array('order_id'=>111,'OrderTotal'=>100,'redirect_url'=>'http://www.onlinenifm.com/');
						$this->load->library('CCavenue',$params);
						echo $data['merchant_id']=$this->ccavenue->merchant_id."<br />";
						 echo $data['redirect_url']=$this->ccavenue->redirect_url."<br />";
						 echo $data['checkSum']=$this->ccavenue->checkSum()."<br />";						
						$this->load->view('submit_payment',$data);
		
	}
	
	


	//function for order delete
	function orderDelete($OrderID){
			if($OrderID!=''){
				$this->db->delete('orders', array('OrderID' => $OrderID));
				$this->session->set_flashdata('order_delete_success', $this->lang->line('order_delete')); 
				redirect('myaccount/orderhistory');
				
			}else{
				redirect('myaccount');
			}
		}
		
	//fucntion for send order mail
	private function sendOrderMail($OrderCode){
		$ename=ucwords($this->session->userdata("Name"));
	
		if(!empty($OrderCode)){
			$data['email']="OrderConfirm";
			//$this->email->from('info@onlinenifm.com', 'NIFM');
			//$this->email->to($this->session->userdata("Email")); 
			//$this->email->bcc('info@onlinenifm.com'); 
			//$this->email->bcc('info@nifm.in'); 
			//$this->email->subject('Order Details of OrderCode : '.$OrderCode.' from Onlinenifm');
			
			//$this->email->subject('Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$OrderCode);
			
			
			$OrderID=$this->muser->getOrderID($OrderCode);
			$data['orderDetail']=$this->muser->getOrderData($OrderID);
	        $data['products']=$this->mmodule->getData('products',array('*'),array('OrderID'=>$OrderID));
			$MailMsg = $this->load->view('email_template', $data, true);
			$this->email->message($MailMsg);		
			//$this->email->send();	
			
			
			$subject = 'Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').' Thanks for Placing Order at NIFM your Order Number is '.$OrderCode;
			$from = "info@onlinenifm.com";
			$fromname = "NIFM";
			$to = $this->session->userdata("Email");
			//$to = $this->session->userdata("Email");
			$bcc = "accounts@nifm.in";
			$cc = "info@onlinenifm.com";
			//($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
			$this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc, $cc);
			

		

				
		}
		
	}
	
	
	
//function for webinar 
function webinar(){
	$data['heading']='Webinar';
	$this->maHeader(); 	
	//$this->maLeft(); 	
	$this-> load-> view('webinar');
	$this->maFooter();
}
//End


// function for showing user testimonials
function my_testimonial(){
	$data['heading']='My Testimonials';
	$data['testimonials']=$this->mmodule->getData('testimonial',array('Name','Email','ShortDesc','DateAdded'),array('Email'=>$this->session->userdata('Email')));
	$this->maHeader(); 	
	$this->maLeft(); 	
	$this-> load-> view('my_testimonial',$data);
	$this->maFooter();
	
}
	
	
	// function for SubmitFinalTest
	function SubmitFinalTest($ProductID, $OrderID, $UserID, $ModuleID, $totalNumberQutions, $AttemptedQutions, $QuestionNotAttempted, $correct_answer, $wrong_answer, $total_marks, $total_percentage, $result, $nagetive){
		
		//var_dump($this->input->post);
		//exit;
		
		 $ProductID=$this->input->post('ProductID');
		 $OrderID=$this->input->post('OrderID');
		 $UserID=$this->input->post('UserID');
		 $ModuleID=$this->input->post('ModuleID');
		 $nagetive=$this->input->post("nagetiveMarkingFinal");	
		 $totalNumberQutions=$this->input->post("TotalNumberQuestionsFinal");	
		 $AttemptedQutions=$this->input->post("QuestionsAttemptedFinal");	
		 $QuestionNotAttempted=$this->input->post("QuestionsNotAttemptedFinal");	
		 $correct_answer=$this->input->post("CorrectAnswersFinal");	
		 $wrong_answer=$this->input->post("IncorrectAnswersFinal");	
		 $total_marks=$this->input->post("TotalMarksFinal");	
		 $total_percentage=$this->input->post("PercentageFinal");	
		 $result=$this->input->post("ExamResult");	
			
		$data=$this->muser->AddFinalTest($ProductID, $OrderID, $UserID, $ModuleID, $totalNumberQutions, $AttemptedQutions, $QuestionNotAttempted, $correct_answer, $wrong_answer, $total_marks, $total_percentage, $result, $nagetive);
		
		$dataF=$this->muser->updateProductFinal($ProductID);
		$data['ProductTitle']=$this->mmodule->getData('products',array('Title'),array('ProductID'=>$ProductID));
		//echo$this->db->last_query();
		//$data['email']="submitFinalTest";
			$this->email->from('info@onlinenifm.com', 'NIFM');
			$this->email->to($this->session->userdata("Email")); 
			$this->email->bcc('info@onlinenifm.com'); 
			//$this->email->bcc('info@nifm.in'); 
			//$this->email->subject('Order Details of OrderCode : '.$OrderCode.' from Onlinenifm');
				//var_dump($data['ProductTitle']); exit;
			$this->email->subject('Dear '.$this->session->userdata('FirstName').' '.$this->session->userdata('LastName').'  We are Pleased to Award  you a Certificate on Successful completion Final Certificate Test of the course '.$data['ProductTitle'][0]['Title']);
			
			
			$MailMsg="Dear ".$this->session->userdata('FirstName')." ".$this->session->userdata('LastName').",<br/> <br/>  We are Pleased to Award  you a Certificate on Successful completion Final Certificate Test of the course <b>".$data['ProductTitle'][0]['Title']."</b>. <br/><br/> 
				
				Please  <b>Download</b> your Certificate from <b>My Account</b>-><b>My Certificate</b>.
				
				
				<br/><br/>
				Please visit <b>www.onlinenifm.com</b> to Purchase another course.<br/><br/> Feel free to contactus for any kind of Query.<br/><br/><br/><br/>Thanks & Regards<br/>Team NIFM<br/>Ph: 011-45646322, 9910300590<br/>E-mail: info@nifm.in<br/>Website: www.nifm.in";
			//$MailMsg = $this->load->view('email_template', $data, true);
			$this->email->message($MailMsg);		
			$this->email->send();
	//echo$this->db->last_query();
		
		//var_dump($data);
	}
	
	function addrating()
	{
		$ModuleID = $this->input->post('ModuleID');
		$UserID = $this->input->post('UserID');
		$Rating = $this->input->post('Rating'); 
		$Review = $this->security->xss_clean($this->input->post('Review'));
		$data['review']=$this->mmodule->getData('review',array('*'),array('ModuleID'=>$ModuleID,'UserID'=>$UserID));
		//exit();
		//var_dump($data['review'][0]['ModuleID']);
		if($data['review'][0]['ModuleID']) {
			$status = array("status"=>"already");
		}else {
			$data['reviewAdd']=$this->muser->AddRevieRating($ModuleID, $UserID, $Rating, $Review);
			//echo $this->db->last_query();
		
			$status = array("status"=>"success");
		}
		//var_dump($data);
		$this->output->set_content_type('application/json');
		echo json_encode($status);	
		
			
		 
	}
	
/* 	
	public function test(){
		
		echo $subject = "New Testimonial at Online NIFM";
					$from = "info@onlinenifm.com";
					$fromname = "NIFM";
					$to = "kumarsharmaatul@gmail.com";
					$cc = "gabruthe@gmail.com";
					$MailMsg = "test";
					 //($to, $message, $subject, $from="", $fromname="", $bcc="", $cc="");
					$mail = $this->SendSendgrid($to, $MailMsg, $subject, $from, $fromname, $bcc, $cc);
					var_dump($mail);
	}
	 */
	 /******************************************/
  //Start send grid library mail function
   public function SendSendgrid($to, $message, $subject, $from="", $fromname="", $bcc="", $cc=""){
		$this->load->library('sendgrid');
		$this->sendgrid->to = $to;
		$this->sendgrid->MailMsg = $message;
		$this->sendgrid->subject = $subject;
		$this->sendgrid->from = $from;
		$this->sendgrid->fromname = $fromname;
		$this->sendgrid->bcc = $bcc;
		$this->sendgrid->cc = $cc;
		$this->sendgrid->getSendgrid();
    }
  /******************************************/
  //End send grid library mail function
	
}
?>