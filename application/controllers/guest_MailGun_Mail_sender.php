<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest extends CI_Controller {


	/*************************************************
			Constructor 
	**************************************************/
	public function __construct(){
		parent::__construct();
			$this->load->library('user_agent');
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->library('form_validation');
		}
		
		
	/*************************************************
			Index method
	**************************************************/	
	public function index()
	{
		$data['message']="";
		$to="";
		$subject="";
		$email="";
		$header="";
		$name="";
		$message="";
		
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[60]|min_length[2]|xxs_clean'); 
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[60]|xxs_clean'); 
		$this->form_validation->set_rules('message','Message','trim|required|max_length[600]|min_length[10]|xxs_clean'); 
		if($this->form_validation->run()==TRUE ){	
			if(ctype_alpha($this->input->post('name'))){
				
				$to = "ankit.wasankar12@gmail.com";
				$subject = "Email from DCoders.MyTechBlog.in";
				$email = $this->input->post('email');
				
				/** preparing the mail body which is $message**/
				/**********************************************/
					$name = $this->input->post('name');
					$message = $this->input->post('message');
					/** identifying browser, platform and ip address **/
					$agent = "";
					if ($this->agent->is_browser())				{
						$agent = $this->agent->browser().' '.$this->agent->version();
					}elseif ($this->agent->is_robot()){
						$agent = $this->agent->robot();
					}elseif ($this->agent->is_mobile()){
						$agent = $this->agent->mobile();
					}else{
						$agent = 'Unidentified User Agent';
					}
					$browser = $agent;
					$platform = $this->agent->platform();
					$ip = $this->input->ip_address();	

					$msgPart1="<br>\r\nName: ".$name."<br>\r\nEmail: ".$email."<br><br>\r\nMessage: ";
					$msgPart2="<br><br>\r\nSender details:<br>\r\nIP Address: ".$ip."<br>\r\nBrowser: ".$browser."<br>\r\nPlatform: ".$platform;

					$message = $msgPart1.$message.$msgPart2;

					/** configuring email **/
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.mailgun.org',
						'smtp_port' => 465,
						'smtp_user' => '***********',
						'smtp_pass' => '***********',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					
					/** creating email **/
					$this->email->from($email, $name);
					$this->email->to('ankit.wasankar12@gmail.com'); 
					$this->email->subject($subject);
					$this->email->message($message);
										
					/** sending email **/
					if($this->email->send()) {
						$data['message']="Your query submitted successfully. You will receive a reply soon..";
					} else {
						$data['message']="Sorry, Please try again later.. ";
					}
			}
			else{
				$data['message']="Please enter valid name | only first name. ";
			}
		}		
		$this->load->view('guest/header/header',$data);
		$this->load->view('guest/index',$data);
		$this->load->view('guest/footer/footer',$data);
	}
}

/* End of file guest.php */
/* Location: ./application/controllers/welcome.php */