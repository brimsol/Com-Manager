<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model File: welcome_model.php
 * Scope: Login processing
 */
class Login_model extends MY_Model
{

	/**
	 * Constructor of this model
	 */
	function __construct()
	{
		parent::__construct('default');
	}

	/**
	 * Login processing
	 *
	 * @param string $username
	 * @param string $password
	 * @return array|boolean Query data on success, FALSE otherwise
	 */
	function login($username, $password)
	{
		$query = $this->db->get_where('users', array(
			'username' => $username,
			'password' => sha1($password)
		));
                
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Update user login details with the given info
	 *
	 * @param int $user_id Current user id value
	 * @param string $current_time Current time
	 * @param string $ip_address User's current IP address
	 */
	function update_login($user_id, $current_time, $ip_address)
	{
		$query = $this->db->update('users', array(
			'last_loggedin' => $current_time,
			'last_loggedin_ip' => $ip_address
		), "user_id = {$user_id}");
	}

}

/* End of file welcome_model.php */
/* Location: ./application/model/welcome_model.php */

