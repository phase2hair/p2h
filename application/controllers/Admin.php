<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $activation_code;
	private $format = 'Y-m-d h:s:i';

	
	public function index()
	{
		$this->load->view('login');
	}
	

	public function login()
	{
		# code...
		if($_POST){
			if($this->admins->loginUser($_POST['password'])){
				redirect('admin/dashboard');
			}else{
				$data['error']  = "Incorrect Access Code";
				$this->load->view('login', $data);
			}
		}
	}

	
	public function backupDb()
	{
		# code...
		$prefs = array(
            'format'        => 'zip',                       // gzip, zip, txt
            'filename'      => 'mybackup_as_at_'.Date("Y-m-d").'.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'newline'       => "\n"                         // Newline character used in backup file
        );

        $this->load->dbutil();

        $backup = $this->dbutil->backup($prefs);
        
        $this->load->helper('file');
        write_file(APPPATH.'/logs/mybackup.gz', $backup);
        

		$this->load->library('email');

		$config = array();
		$config['protocol'] = 'mail';
		$config['smtp_host'] = "mail.clienthair.info";
		$config['smtp_user'] = "clearance@clienthair.info";
		$config['smtp_pass'] = "PASS123word£$";
		$config['smtp_port'] = "587";


		$this->email->initialize($config);

		$this->email->set_newline("\r\n");

		$this->email->from('clearance@clienthair.info');
		$this->email->to("bleemster@hotmail.com");
		$this->email->subject("P2H SQL Backup");
		$this->email->message("Dont worry about a message, there is an attachment!!");
		$this->email->attach(APPPATH.'/logs/mybackup.gz');
		if($this->email->send()){
			echo "success";
		}else{
			echo "failure";
		}


	}
	

	public function dashboard($limit=100)
	{
	    if(isset($_GET['page'])){
	        $page=(int)$_GET['page'];
	    }else{
	        $page=1;
	    }
		$this->isLoggedIn();
		$cc = $this->clients->getCheckedIn();
		
		$data['checked_in'] = $cc;
		$data['not_checked_in'] = $this->clients->getNotCheckedIn();
		if(!isset($_GET['query'])){
		    $_GET['query'] = 'B';
		   $data['stylists'] = $this->admins->getAdmins();
			$clients = $this->clients->getAllClients($_GET['query']);
			$data['pages'] = ceil(count($clients)/(int)$limit);
			$data['current_page'] = $page;
			$data['clients'] = array_slice($clients,(((int)$page-1)*(int)$limit), (int)$limit);
		}else{
		    $data['stylists'] = $this->admins->getAdmins();
			$clients = $this->clients->getAllClients($_GET['query']);
			$data['pages'] = ceil(count($clients)/(int)$limit);
			$data['current_page'] = $page;
			$data['clients'] = array_slice($clients,(((int)$page-1)*(int)$limit), (int)$limit);
		}
		$this->load->view('dash', $data);
	}

	public function book_client()
	{
		# code...
		$this->clients->modifyClient($_POST['id'], $_POST);
		redirect('admin/dashboard');
	}


	public function users($page=1, $limit=20)
	{
		$this->isLoggedIn();
		$clients = $this->admins->getAdmins();
		$data['pages'] = ceil(count($clients)/(int)$limit);
		$data['current_page'] = $page;
		$data['clients'] = array_slice($clients,(((int)$page-1)*(int)$limit), (int)$limit);
		$this->load->view('users', $data);
	}

	public function modify_client($client)
	{
		# code...
		$data['client'] = $this->clients->getClient($client);
		$data['stylists'] = $this->admins->getAdmins();
		$this->load->view('modify', $data);
	}

	
	function delete_client($client){
	    $this->db->where('Id', $client)->delete('clients');
	    redirect('admin/dashboard');
	}


	public function modify_admin($admin)
	{
		# code...
		$data['client'] = $this->admins->getAdmin($admin);
		$this->load->view('admin_change', $data);
	}

	public function settings()
	{
		# code...
		$data['client'] = $_SESSION['user'];
		$this->load->view('settings', $data);
	}


	public function updateClient($client)
	{
		# code...
		unset($_POST['_wysihtml5_mode']);
		if(!isset($_POST['last_change'])){
		    $_POST['last_edited'] = Date($this->clients->format_two);
		   } else{
		  unset($_POST['last_change']);
		}
		if(isset($_POST['stylist']) && $_POST['stylist']=="Select a stylist"){
		    $_POST['stylist'] = "4";
		   } 
		   
		if(isset($_POST['allow_checkout'])&&$_POST['allow_checkout']=='1'){
		    $d = '';
		    foreach($this->admins->getAdmins() as $harry){
		        if($harry->id == $_POST['stylist']){
		            $d = $harry->first_name.' '.$harry->last_name;
		        }
		    }
		    $_POST['requirement'] = $_POST['requirement'].'&#13;&#10;>> '.$d.' - '.Date($this->clients->format_two).'&#13;&#10----NEXT VISIT BELOW----&#13;&#10';
		}
		$this->clients->modifyClient($client, $_POST);
		$data['success'] = "Client Info Modified Successfully";
		$data['client'] = $this->clients->getClient($client);
		$data['stylists'] = $this->admins->getAdmins();
		$this->load->view('modify', $data);
	}


	public function updateMe($client)
	{
		# code...
		if(strlen($_POST['password'])<1){
			unset($_POST['password']);
		}
		$this->admins->modifyAdmin($client, $_POST);
		$data['success'] = "Admin Info Modified Successfully";
		$data['client'] = $_SESSION['user'];
		$this->load->view('settings', $data);
	}



	public function updateUser($admin)
	{
		# code...
		
		$this->admins->modifyAdmin($admin, $_POST);
		$data['success'] = "Admin Info Modified Successfully";
		$data['client'] = $this->admins->getAdmin($admin);
		$this->load->view('admin_change', $data);
	}


	public function add_user()
	{
		$this->load->view('add_user');
	}


	public function stylist_records()
	{
		$this->isLoggedIn();
		$admins = $this->admins->getAdmins();
		$data['stylists'] = $admins;
		$data['activities'] = [];
		
		$data['cdnt'] = [];
		$data['colouring'] = [];
		$data['foiling'] = [];
		$data['treatments'] = [];
		$data['extras'] = [];
		
		$completed = $this->db->where('date', Date('m/d/Y'))->get('treatments')->result();
		$stylists = [];
		$totals = [];
		foreach($completed as $item){
		    if(in_array($item->stylist, $stylists)){
		        $in = array_search($item->stylist, $stylists);
		        $totals[$in] = $totals[$in]+$item->cost;
		    }else{
		        array_push($stylists, $item->stylist);
		        array_push($totals, $item->cost);
		    }
		}
		
		foreach($stylists as $dre){
		    $goor = '';
            foreach($admins as $admin){
                if($admin->id==$dre){
                    $goor = $admin->first_name.' '.$admin->last_name;
                    $dn = array_search($dre, $stylists);
                    $stylists[$dn] = $goor;
                }
            }
            
		}
		
		$data['total_stylists'] = $stylists;
		$data['totals'] = $totals;
		$sty = $this->db->get('styles')->result();
		foreach ($sty as $key) {
			if($key->category == "cdnt"){
				array_push($data['cdnt'], $key);
			}

			if($key->category == "colouring"){
				array_push($data['colouring'], $key);
			}
			if($key->category == "foiling"){
				array_push($data['foiling'], $key);
			}

			if($key->category == "treatments"){
				array_push($data['treatments'], $key);
			}

			if($key->category == "extras"){
				array_push($data['extras'], $key);
			}
		}
        $data['commons'] = array_merge($data['cdnt'], $data['foiling'],$data['colouring']);
		if(isset($_GET['stylist']) && isset($_GET['date'])){
			$stylist = $_GET['stylist'];
			$date = $_GET['date'];
			$data['activities'] = $this->db->select('*')->where('stylist', $stylist)->where('date', $date)->get('treatments')->result();
		}

		if(isset($_GET['stylist']) && !isset($_GET['date'])){
			$stylist = $_GET['stylist'];
			$date = Date('m/d/Y');
			$data['activities'] = $this->db->select('*')->where('stylist', $stylist)->where('date', $date)->get('treatments')->result();
		}
		$this->load->view('records', $data);
	}


	function saveTreatment($style="", $stylist="", $cost="", $discounted=false){
		$input = array('style' => urldecode($style), 'stylist'=>$stylist,'cost'=>$cost,'discounted'=>$discounted,'date'=>Date('m/d/Y'));

		$this->db->insert('treatments', $input);
		
		redirect('admin/stylist-records?stylist='.$stylist);
	}

	function deleteStyle($id=null){
		if($id !== null){
			$this->db->where('id', $id)->delete('styles');
		}
		redirect('admin/stylist-records');
	}

	function delete_treatment($id = null){
		if($id !== null){
			$this->db->where('id', $id)->delete('treatments');
		}
		if(isset($_GET['stylist'])){
		    redirect('admin/stylist-records?stylist='.$_GET['stylist']);
		}else{
		    redirect('admin/stylist-records');
		}
	}
	
	
	public function check_in($id = null)
    {
        if($id == null){
            redirect('admin/dashboard');
        }else{
            $this->clients->checkClientIn($id);
            $data['client'] = $this->clients->getClient($id);
           redirect('admin/dashboard');
        }
    }
    
	public function save_user()
	{
		# code...
		if($_POST){
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');	
            $this->form_validation->set_error_delimiters('', '<br />');
            if($this->form_validation->run() == TRUE){
				// echo "fjdf";
               $this->admins->createUser($_POST);
               $data['success'] = "New User Added Successfully";
                $this->load->view('add_user', $data);
            }else{
                $data['error'] = validation_errors();
                $this->load->view('add_user', $data);
            }
        }
	}

	public function logout()
	{
		$this->isLoggedIn();
		unset(
			$_SESSION['user'],
			$_SESSION['loggedIn']
		);
		redirect('Home');
		
	}


	public function isLoggedIn()
	{
		# code...
		if(isset($_SESSION['loggedIn'])){
			return true;
		}else{
			redirect('admin');
		}
	}

	public function search()
	{
		# code...
		$this->isLoggedIn();
		if(!isset($_GET['q'])){
			$clients = $this->clients->getAllClients();
			$data['pages'] = ceil(count($clients)/(int)$limit);
			$data['current_page'] = $page;
			$data['clients'] = array_slice($clients,(((int)$page-1)*(int)$limit), (int)$limit);
		}else{
			$clients = $this->clients->getAllClients($_GET['q']);
			$data['pages'] = ceil(count($clients)/(int)$limit);
			$data['current_page'] = $page;
			$data['clients'] = array_slice($clients,(((int)$page-1)*(int)$limit), (int)$limit);
		}
		$this->load->view('dash', $data);
	}

	
	public function last_year()
            	{
            		# code...
            		$this->isLoggedIn();
            		$lastYear = [];
            			$clients = $this->clients->getAllClients();
            			
            
            			foreach($clients as $kane){
            			  if(strlen($kane->last_visit)>5){
            			      $date2 = Date('Y-m-d');
            			       $date = str_replace('/', '-', $kane->last_visit);
                              $date1 = date('Y-m-d', strtotime($date));
                              $diff = abs(strtotime($date2) - strtotime($date1));
            
                            $years = floor($diff / (365*60*60*24));
                            if($years>0){
                                array_push($lastYear, $kane);
                            }
            			  }
            			}
            			$data['previous'] = $lastYear;
            		$this->load->view('older', $data);
            	}
	
		public function duplicateInfo()
	        {
                    $sql = "SELECT * FROM clients WHERE postal_code IN (SELECT postal_code FROM clients GROUP BY first_name, postal_code HAVING COUNT(*) > 1) ORDER BY `postal_code` ASC";
                    $query = $this->db->query($sql)->result();
                    $data2['dupe'] = $query;
                    $this->load->view('duplicate', $data2);
	        }


	    function add_new_style(){
	    	if($_POST){
	    		$this->db->insert('styles', $_POST);
	    	}
	    	redirect('admin/stylist-records');
	    }

	    function modify_style(){
	    	if($_POST){
	    		$this->db->where('id', $_POST['id'])->update('styles', $_POST);
	    	}
	    	redirect('admin/stylist-records');
	    }
	
	function upload_style_photo($id){
	    $client = $this->clients->getClient($id);
	    $photos = explode("--",$client->old_styles );
	    if(count($photos)==5){
	       // remove from the array and remove from server
	       if (file_exists('./uploads/'.$photos[0])) {
                unlink('./uploads/'.$photos[0]);
                array_splice($photos, 0, 1);
            }
	    }
	    if (!file_exists('./uploads')) {
            mkdir('./uploads', 0777, true);
        }
	    $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'bmp|gif|jpg|png|aae|heif|heic|exr|hdr';
        $config['file_name'] = date($this->format).'-'.$id;
        

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $_SESSION['error_message'] = 'Upload failed because: '.$this->upload->display_errors();
            $this->session->mark_as_temp('error_message', 3);
            redirect('admin/modify_client/'.$id);
        }
        else
        {
             $this->resizeImage($this->upload->data('file_name'));
             if(strlen($client->old_styles)>0){
                 array_push($photos, $this->upload->data('file_name'));
                 $client->old_styles = implode('--', $photos);
             }else{
                 $client->old_styles = $client->old_styles.$this->upload->data('file_name');
             }
             
             $this->clients->modifyClient($id, $client);
            $_SESSION['success_message'] = 'Upload Successfull';
            $this->session->mark_as_temp('success_message', 3);
            redirect('admin/modify_client/'.$id);
        }
	}
	
	function resizeImage($image){
	    $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/'.$image;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['height']       = 600;
        $config['width']         = 400;

        $config['rotation_angle'] = '270';
        $config['wm_text'] = 'Copyright Phase 2 Hair';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size']	= '8';
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '0';
        $config['wm_opacity'] = '50';
        
        
        $this->load->library('image_lib', $config);
        
        $this->image_lib->resize();
        $this->image_lib->rotate();
        $this->image_lib->watermark();
	}
	
    
    

    
}

