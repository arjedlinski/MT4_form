<?php
/**
 * Created by AJ.
 * Date: 11.07.2017
 * Time: 12:41
 */
 
 class MT4{
	 
    private $_optionsName = 'MT4-options';
    private $_options = array();
    private $tablename = 'MT4_form';
    public $data = array();
	function MT4()
    {
        DEFINE('MT4', true);

        $this->_options = array(
            'send_from'       => 'no-reply@' . str_replace('www.', '', $_SERVER['HTTP_HOST']),
            'mail_title'      => 'New From Request',
			'enable' => '0',
            'server'  => '#',
			'login'  => '#',
			'password'  => '#',
			'from_header' => '#',
			'mailmessage' => '#',
			'leverage' => 50,
			'group' => 'groupname',
            'formbackground' => '#',
            'titlebackground' => '#',
			'inputbackground' => '#',
            'buttonbackground' => '#',
			'buttontextcolor' => '#',
			'inputborder' => '#',
			'titleborder' => '#',
			'buttonborder' => '#',
			'inputcolor' => '#',
			'inputfocus' => '#',
			'balance' => '#',
        );
        $this->pluginName = plugin_basename(MT4_DIR);
        $this->pluginUrl = trailingslashit(WP_PLUGIN_URL . '/' . $this->pluginName);
		//add_filter( 'plugin_action_links_'. plugin_basename( __FILE__ ), array($this , 'plugin_add_settings_link' ));
        register_activation_hook(MT4_EXEC_FILE, array(&$this, 'activate'));
        register_deactivation_hook(MT4_EXEC_FILE, array(&$this, 'deactivate'));
		
		add_action( 'wp_enqueue_scripts','MT4_DIR_CSS');
		add_action( 'admin_enqueue_scripts', 'MT4_DIR_CSS' );
		function MT4_DIR_CSS() {
		wp_enqueue_style('MT4_DIR_CSS', MT4_DIR_CSS.'style.css');
			
		}
        if (is_admin()) {
            add_action('admin_menu', array(&$this, 'systemAdminGenerateMenu'));
        } else {

            add_shortcode('MT4form', array(&$this, 'siteShowForm'));
        }
        add_action( 'wp_enqueue_scripts', 'wptuts_add_color_picker' );
        add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
		
        
        function wptuts_add_color_picker( $hook ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'custom-script-handle', MT4_DIR_JS.'colorpick.js', array( 'wp-color-picker' ), false, true ); 
		// Skrypt poniżej nie jest ukończony dynamiccss w settings admin
		wp_enqueue_script( 'custom-script', MT4_DIR_JS.'dynamicformcss.js' );
        }

    }
	 function __construct(){
		add_action('init', array($this, 'MT4'));
	}
/*	function plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=MT4_form">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}*/
	function dynamiccss(){
        wp_enqueue_style('MT4_DIR_DYNAMIC_CSS', MT4_DIR_CSS.'dynamic.css');
        $custom_css = '';
        $css_options = array(
            'mt4form' => array(
				'background' => $this->_options['formbackground'],
			),
			
            'mt4form h2' => array(
				'background' => $this->_options['titlebackground'],
				'border-color' => $this->_options['titleborder'],
			),
			
            'mt4form input[type=submit]' => array(
				'background' => $this->_options['buttonbackground'],
				'color' => $this->_options['buttontextcolor'],
			),
			'mt4form input[type=submit]:hover' => array(
				'border-color' => $this->_options['buttonborder'],
			),
			'mt4form input[type=text], .mt4form input[type=email], .mt4form select' => array(
				'background' => $this->_options['inputbackground'],
				'border-color' => $this->_options['inputborder'],
				'color' => $this->_options['inputcolor'],
			),
			'mt4form input::placeholder' => array(
				'color' => $this->_options['inputcolor'],
			),
			'mt4form input[type="text"]:focus' => array(
				'border-color' => $this->_options['inputfocus'],
			),
			'mt4form input[type="submit"]:focus' => array(
				'background-color' => $this->_options['formbackground'],
			),
			'mt4form input[type="email"]:focus' => array(
				'border-color' => $this->_options['inputfocus'],
			),
			'mt4form select:focus' => array(
				'border-color' => $this->_options['inputfocus'],
			),
			'mt4form span' => array(
				'color' => $this->_options['inputcolor'],
			),
        ); 
        foreach($css_options as $key => $value)
        {
			if (is_array($value)){
        		foreach ($value as $key2 => $value2) {
            	$custom_css .= '.'.$key.'{ '.$key2.': '.$value2.';}';
				}
			} 
			 
	    }
		wp_add_inline_style( 'MT4_DIR_DYNAMIC_CSS', $custom_css );
	 }
	 
	public function siteShowForm()
    {
		$i = 0;
        $this->data = $this->getOptions();
        if ($this->_post('mt4') != '') {
			$postData = $this->prepare_form($this->_post('mt4'));
			foreach($this->_post('mt4') as $key => $value)
			{
				if (strlen($value) <= 0 && (($key == 'name' && !preg_match('/[a-zA-Z p{L}]{3,}/',$value)) || ($key == 'email' && !preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/',$value)) ))
				{
					$error[$key] = $key;
					$i++;
				}
			}
			if (!isset($error))
			{
				try{
				$this->newAccount($postData);
				}catch(Exception $e){
					echo 'Error Code: ', $e->getMessage(), "\n";
				}
			}
        }
        $this->dynamiccss();
		ob_start();
        include_once(MT4_DIR_TEMPLATES . 'view_site_form.php');
		$output = ob_get_clean();
		return $output;
    }
	 
    function newAccount($data)
	{

		$url = 'http://202.155.210.245:8080/connect';
		$url2 = 'http://202.155.210.245:8080/login';
		$url3 = 'http://202.155.210.245:8080/create_user';

		$response = wp_remote_post( $url, array(
			'method' => 'POST',
			'timeout' => 500,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array(),
			'body' => array('server' => $this->_options['server']),
			'cookies' => array(),
		)
		);
		if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		throw new Exception("1");
		}
		$response2 = wp_remote_post( $url2, array(
			'method' => 'POST',
			'timeout' => 500,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array(),
			'body' => array('login' => $this->_options['login'], 'password' => $this->_options['password']),
			'cookies' => array()
		)
		);

		if ( is_wp_error( $response2 ) ) {
		$error_message = $response2->get_error_message();
		throw new Exception("2");
		}
		$response3 = wp_remote_post( $url3, array(
			'method' => 'POST',
			'timeout' => 500,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking' => true,
			'headers' => array(),
			'body' => $data,
			'cookies' => array()
		)
		);
		if ( is_wp_error( $response3 ) ) {
		$error_message = $response3->get_error_message();
		throw new Exception("3");
		}else{
			$mt4response = json_decode($response3['body']);
			if ($mt4response->error_code == 0)
			{
				echo "Your account has been created";
				$this->send_mail($data['name'],$data['email'], $mt4response->login, $mt4response->password);
			}else{
				echo 'Your account cannot be created. Try again.';
			}
		}
	}
	 
	function send_mail($name,$emailto,$login,$password){
		$email = sanitize_email($emailto);
		$emailadmin   = $this->_options['send_from'];
		$header = $this->_options['from_header'];
        $subject = $this->_options['mail_title'];
        $message = $this->_options['mailmessage'];
		$message =	preg_replace('/{userName}/', $name, $message);
		$message =	preg_replace('/{loginMT4}/', $login, $message);
		$message =	preg_replace('/{passwordMT4}/', $password, $message);

		$headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: ".$header." <$emailadmin>" . "\r\n";

        if ( wp_mail( $email, $this->_options['mail_title'], $message, $headers ) ) {
            echo '<div>';
            echo '<p>Login and password has been sent to your email</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
	}
	 
	function prepare_form($forms){
		$nameofgroup = "";
		$balance = $this->_options['balance'];
		$group = explode("," , $this->_options["group"]);
		foreach($group as $groupname){
			$currencies = explode( "|" , $groupname);
			if ($currencies[1] == $forms["currency"])
			{
			 if($currencies[1] == 'JPY'){
			 	$balance = $balance * 100;
			 }elseif($currencies[1] == 'HKD'){
			 	$balance = $balance * 8;
			 }elseif($currencies[1] == 'CNH'){
			 	$balance = $balance * 7;
			 }
			 $nameofgroup = $currencies[0];
			 break;
			}
		}
		$postData = array(
		'name' => $forms["name"],
		'email' => $forms["email"],
		'city' => $forms["city"],
		'country' => $forms["country"],
		'zipcode' => $forms["zipcode"],
		'address' => $forms["address"],
		'phone' => $forms["phone"],
		'leverage' => $this->_options["leverage"],
		'group' => $nameofgroup,
		'enable' => $this->_options["enable"],
		'balance' => $balance,
		);
		return $postData;
	}
	 
	function systemAdminGenerateMenu()
    {
        add_submenu_page('options-general.php',
            __('MT4 Form Settings'),
            __('MT4 Form'),
            'manage_options',
            'MT4_form', array(&$this, 'actionFormSettings'));
		
    }
	 
	public function actionFormSettings()
    {
        $options = $this->getOptions();

        // Save data to database
        if ($this->_post('formdata') != '') {
            $input = $this->_post('formdata');

            foreach ($options as $key => &$value) {
                if (array_key_exists($key, $input)) {
                    $value = stripslashes($input[$key]);
                }
            }

            $this->setOptions($options);
        }

        $this->data = $options;
		$this->dynamiccss();
        include_once(MT4_DIR_TEMPLATES . 'admin_settings.php');
    }
	 
	public function getOptions()
    {
        if (!$options = get_option($this->_optionsName)) {
            update_option($this->_optionsName, $this->_options);

            return $this->_options;
        }

        $needUpdate = false;

        foreach ($this->_options as $key => $value) {

            if (!array_key_exists($key, $options)) {
                $needUpdate = true;
                $options[$key] = $value;
            }

        }

        if  ($needUpdate) {
            update_option($this->_optionsName, $options);
        }

        $this->_options = $options;

        return $this->_options;
    }

    public function setOptions( $options )
    {
        $this->_options = $options;
        update_option($this->_optionsName, $this->_options);

        return $this->_options;
    }
	private function _get($value)
    {
        if (isset($_GET[$value]) && !empty($_GET[$value])) {
            return $_GET[$value];
        }

        return null;
    }

    private function _post($value)
    {
        if (isset($_POST[$value]) && !empty($_POST[$value])) {
            return $_POST[$value];
        }

        return null;
    }
 }
?>