<?php

class viewHelper extends View {

    public function __construct() {
		
    }

    public function getAuthorDetails($authorDetails) {
		
		if($authorDetails['salutation'] == '')
		
			echo "&nbsp;&nbsp;<span class=\"authorspan\"><a href=\"" . BASE_URL . "describe/authorArticles/" . $authorDetails['authid'] . "\">" . $authorDetails['authorname'] . "</a></span>";
		else
		
			echo "&nbsp;&nbsp;<span class=\"authorspan\"><a href=\"" . BASE_URL . "describe/authorArticles/" . $authorDetails['authid'] . "\">" . $authorDetails['authorname'] . ", " . $authorDetails['salutation'] . "</a></span>";
	}

	public function getStartingPage($page){

		$var = explode('-', $page);
		return $var[0];
	}
}

?>
