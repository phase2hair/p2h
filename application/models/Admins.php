<?php 

class Admins extends CI_Model 
{

      /**
	 * Date format
	 *
	 * @var string
	 **/
    private $format = 'Y-m-d';
    
    function loginUser($password){
        $query = $this->db->select('*')->where('password', $password)->get('users');
        if($query->num_rows()>0){
            $_SESSION['user'] = $query->row();
            $_SESSION['loggedIn'] = true;
            return true;
        }else{
            return false;
        }
    }

    public function modifyAdmin($admin, $details)
    {
        $this->db->where('id', $admin)->update('users', $details);
        if($_SESSION['user']->id==$admin){

            $query = $this->db->select('*')->where('id', $admin)->get('users');
            if($query->num_rows()>0){
                $_SESSION['user'] = $query->row();
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }

    public function createUser($user)
    {
        # code...
        $this->db->insert('users', $user);
    }


    public function getAdmin($admin)
    {
        # code...
        $query = $this->db->select('*')->where('id', $admin)->get('users');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getAdmins()
    {
        # code...
        return $this->db->select('*')
        ->where('type!=', TRUE)
        ->get('users')->result();
    }
}





#
# function fetch_data()
# {
#    $query = $this->db->get("users");
#    return $query;
# } 




