<?php

class Share_likes_model extends CI_Model
{
	function _construct()
	{
		parent::_construct();
	}
	
    
    
    function get_share_likes($where)
    {
        $this->db->select('share_likes_id, share_id, user_id, (select user_nickname from user where user_id = share_likes.user_id) as user_nickname');
        
		return $this->db->where($where)->get('share_likes');
    }
    
    
    function insert_share_likes($data)
    {
        if($this->db->insert('share_likes',$data))
            return TRUE;
		else
            return FALSE;
    }
    
    function delete_share_likes($where)
    {
        if($this->db->where($where)->delete('share_likes'))
            return TRUE;
		else
            return FALSE;
    }
    
    function update_share_likes($data)
    {
        if($this->db->update('share_likes', $date))
            return TRUE;
        else
            return FALSE;
    }
    
}