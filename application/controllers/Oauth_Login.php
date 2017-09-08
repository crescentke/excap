<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Oauth_Login extends CI_Controller
{
    function __construct() {
		parent::__construct();

		// Load facebook library
		$this->load->library('facebook');

		//Load user model
		$this->load->model('user');
    }

    public function index(){
		$userData = array();

		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');

            // Preparing data for database insertion
            $userData = array(
              'oauth_provider' => 'facebook',
              'oauth_uid' => $userProfile['id'],
              'first_name' => $userProfile['first_name'],
              'last_name' => $userProfile['last_name'],
              'email' => $userProfile['email'],
              'profile_url' => 'https://www.facebook.com/'.$userProfile['id'],
              'picture_url' => $userProfile['picture']['data']['url']);

            // Insert or update user data
            $userID = $this->user->checkUser($userData);

			// Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }

			// Get logout URL
			$data['logoutUrl'] = $this->facebook->logout_url();
		}else{
            $fbuser = '';

			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

		// Load login & profile view
        $this->load->view('welcome_message',$data);
    }

	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_userdata('userData');
		// Redirect to login page
        redirect(base_url());
    }
}
