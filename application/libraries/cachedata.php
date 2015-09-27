<?php 
class CacheData
{
    public function __construct()
	{
        
	}
    //order页dosubmit
    public function saveCache()
    {
        $ci = & get_instance();
        $order = $ci->db->select('*')->limit(5)->order_by('opublish desc')->get('order')->result_array();
        
        $ci->load->driver('cache');
        $ci->cache->file->save('order_'.date("Y_m_d"),$order, 60*60*12);
    }
}
?>