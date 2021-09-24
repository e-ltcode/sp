<?php 
namespace App\Classes;
use Vimeo\Vimeo;

class VimeoAPI {
	public $credentials,$apikey,$secret,$signature;

	public function __construct(){
		$this->apikey = "480ec14757bfe45cee4760c5380a8789";
		$this->secret = "67d183f0d8";
		$this->signature = hash("sha256", $this->apikey.$this->secret.time());
	}


	public function get_specific_video($uri){
		$client = new Vimeo("b7d813bd3bdc8576b2bc16173f2a35e9e09dbe96", "nFp034eOkzTvSBZEhHd4DP0zDwom655GiBGw/fpmSURCmBphBa5J2ix6IHDtbReB4gG6Ws46TrlAISCQfa4DOSqMNESbepUdXQwqD81Ad249ZB+cSuAjFd55NkFWu408", "3cc123872b2a1e67bbb928b5c8fae141");
		$response = $client->request($uri);
		return $response['body']['embed']['html'];
	}


	public function upload_video($path,$filename,$description){
		$client = new Vimeo("b7d813bd3bdc8576b2bc16173f2a35e9e09dbe96", "nFp034eOkzTvSBZEhHd4DP0zDwom655GiBGw/fpmSURCmBphBa5J2ix6IHDtbReB4gG6Ws46TrlAISCQfa4DOSqMNESbepUdXQwqD81Ad249ZB+cSuAjFd55NkFWu408", "3cc123872b2a1e67bbb928b5c8fae141");
		$uri = $client->upload($path, array(
			"name" => $filename,
			"description" => $description,
			'privacy' => array(
				'view' => 'disable'
			)
		));
		return $uri;
	}


	public function check_upload_status($uri){
		$client = new Vimeo("b7d813bd3bdc8576b2bc16173f2a35e9e09dbe96", "nFp034eOkzTvSBZEhHd4DP0zDwom655GiBGw/fpmSURCmBphBa5J2ix6IHDtbReB4gG6Ws46TrlAISCQfa4DOSqMNESbepUdXQwqD81Ad249ZB+cSuAjFd55NkFWu408", "3cc123872b2a1e67bbb928b5c8fae141");
		$response = $client->request($uri . '?fields=transcode.status');
		if ($response['body']['transcode']['status'] === 'complete') {
			$res = true;
		} elseif ($response['body']['transcode']['status'] === 'in_progress') {
			$res = true;
		} else {
			$res = false;
		}
		return $res;
	}

}
?>
