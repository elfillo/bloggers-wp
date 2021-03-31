<?php
	function dd($var, $dumb = 0){
		echo '<pre>';
		if($dumb){
			var_dump($var);
		}else{
			print_r($var);
		}
		echo '</pre>';
	}

	function get_page_data($page){
		$pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $page.'.php'
		));

		return $pages[0];
	}

	function getIconClassForSocLinkByType($type)
	{
		switch ($type){
			case 'Instagram';
				return 'inst';
			case 'Facebook';
				return 'fb';
			case 'Вконтакте';
				return 'vk';
			case 'YouTube';
				return 'youtube';
			case 'Twitter';
				return 'twitter';
			default:
				return '';
		}
	}

?>