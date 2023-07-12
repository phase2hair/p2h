<?php 

class Clients extends CI_Model 
{
      /**
	 * Date format
	 *
	 * @var string
	 **/
    public $format = 'Y-m-d';
    public $format_two = 'd/m/Y';

    public function getUsers($month, $day, $today)
    {
        # code...

        $query = $this->db->select('*')->from('clients')
        // ->where('booked_for',Date($this->format_two))
        ->where('checked_in', FALSE)
        ->order_by("last_name", "asc")
        ->where('birth_month',$month)->where('birth_day', $day)->get();

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }




    public function getNotCheckedIn()
    {
        # code...
        
        $query = $this->db->select('*')->from('clients')->where('checked_in',FALSE)
        // ->where('booked_for',Date($this->format_two))
        ->get();

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }





    public function getCheckedIn()
    {
        # code...

        $query = $this->db->select('clients.first_name,clients.old_styles, clients.last_name, clients.postal_code, clients.last_visit, clients.total_visits, clients.requirement, clients.Id, clients.allow_checkout, users.first_name AS stylist_first_name, users.last_name AS stylist_last_name')->from('clients')->where('checked_in',TRUE)
        // ->where('booked_for',Date($this->format_two))
        ->order_by("last_name", "asc")
        ->join('users', 'users.id=clients.stylist')
        ->get();

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }






    public function createClient($client)
    {
        # code...
        $this->db->insert('clients', $client);
    }






    public function checkClientIn($client)
    {
        # code...
        
            $this->db->where('Id', $client)->set('checked_in', TRUE)
            ->set('total_visits','total_visits+1', FALSE)
    #        ->set('last_visit', Date($this->format_two))
    # removed so checking in does not edit the last visit date as i want this to take place at check OUT not check IN
            ->update('clients');
            
            return true;
        
    }





    public function checkClientOut($client,$visit, $visit2)
    {
        # code...
        $this->db->where('Id', $client)->set('checked_in', FALSE)->set('booked_for','')->set('booked_time','')
        # added the last visit to checked out instead of checkin
        ->set('last_visit', Date($this->format_two))->set('last_visit2', $visit)->set('last_visit3', $visit2)
        ->update('clients');
        return true;
    }





    public function getClient($client)
    {
        # code...
        $query = $this->db->select('*')->where('Id', $client)->get('clients');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }






    public function modifyClient($client, $details)
    {
        # code...
        $this->db->where('Id', $client)->update('clients',$details);
    }


    public function getAllClients($q=null)
    {
        # code...
        if($q==null){
            return $this->db->select('*')
            ->order_by("last_name", "asc")
            ->get('clients')->result();
        }else{
            return $this->db->like('first_name', $q)
            ->or_like('last_name', $q)
            ->or_like('postal_code', $q)
            ->order_by("last_name", "asc")
            ->get('clients')->result();
        }
    }
}
