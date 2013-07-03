<?php
/*
Plugin Name: github-api3
Version: 1.0
Author: Christoffer Artmann
Author URI: http://artmann.co/
License: GPL2
*/

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Github API</h3>

	<table class="form-table">
		<tr>
			<th><label for="twitter">Github Access Token</label></th>

			<td>
				<input type="text" name="token" id="token" value="<?php echo esc_attr( get_the_author_meta( 'token', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Github access token. It can be found under account settings.</span>
			</td>
		</tr>

	</table>

<?php 
}

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_usermeta( $user_id, 'token',  $_POST['token']);
}


class GHAPI {

	private $id = "";
	private $secret = "";
	private $token = "";
	private $baseURL = "https://api.github.com";
	private $repo;
	private $user;

	function __construct($user, $repoURL) {
		$this->token = get_the_author_meta('token', $user->ID);
		$parts = explode("/", $repoURL);
		if(count($parts) > 2) {
			$size = count($parts);
			$gUser = $parts[$size-2];
			$gRepo = $parts[$size-1];	
			$this->user = $gUser;
			$this->repo = $gRepo;
		}
		else 
			throw new Exception("Could not parse repo url.");
	}

	public function getCommits() {
		$response = $this->doGetRequest("/repos/".$this->user."/".$this->repo."/commits");
		$data = json_decode($response["response"]);
		$commits = array();

		foreach($data as $entry) {
			$commits[] = array($entry->commit);
		}

		return $commits;
	}


  public function renderLatestCommits($amount = 10) {
  	$commits = $this->getCommits();
  	$c = 0;
  	?>

  	<ul class="commits">
  		<?php foreach($commits as $commit) { ?>
  			<li>
  				<strong><?php echo $commit[0]->author->name; ?></strong><a href=""><?php echo date("Y-m-d H:i:s", strtotime($commit[0]->author->date)); ?></a><br/>
  				<p><?php echo $commit[0]->message; ?></p>
  			</li>
  		<?php 
				if($c++ == $amount)
					break;
  	} ?>
  	</div>

  	<?php
  }

	private function doGetRequest($url, $parameters = array())
  {
		$url = $this->baseURL.$url;
    $curlOptions = array();

    if(strlen($this->token) > 0)
    		$parameters["access_token"] = $this->token;

    if (!empty($parameters)) {
    	$url .= "?";
    	foreach($parameters as $k => $v) {
    		$url .= "&".$k."=".$v;
    	}
   	}

  	 $curlOptions += array(
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5',
            );

    $curl = curl_init();

    curl_setopt_array($curl, $curlOptions);

    $response = curl_exec($curl);
    $headers = curl_getinfo($curl);
    $errorNumber = curl_errno($curl);
    $errorMessage = curl_error($curl);

    curl_close($curl);

    return compact('response', 'headers', 'errorNumber', 'errorMessage');
  }


}

?>