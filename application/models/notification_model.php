<?php
class Notification_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
	}
	
	function insert_notification($data)
	{
		return $this->db->insert('notification',$data); 
	}
	
	function get_notification($where,$limit=0,$offset=0)
	{
		$this->db->order_by('notification_time','DESC');
        $this->db->join('user','notification.user_id_sender = user.user_id');
        $this->db->select('notification.*, timediff(notification_time, now()) as notification_timediff, user.user_nickname as sender_user_nickname');
        if ($limit !=0)
        {
            return $this->db->where($where)->get('notification', $limit, $offset);

        }
        else
        {
            return $this->db->where($where)->get('notification');
   
        }
		
	}
	
	function delete_notification($where)
	{
		if($this->db->where($where)->delete('notification'))
		return TRUE;
		return FALSE;
	}
	
	function update_notification($notification_array,$update_field)
	{
		if($this->db->where($update_field)->update('notification',$notification_array))
		return TRUE;
		return FALSE;
	}
	
}
?>