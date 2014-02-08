<?php

/**
 * Utlis class. Used to be in globals.php and is now wrapped in a class as static functions
 * @author: Olaroche
 */
class Utils {
	
    
    public static function normaliseEmail($email){
        
        //adding that because sometimes its a list of addresses
        if(strpos($email, ';')){
            $email = explode(';', $email);
            $email = $email[0];
            return $email;
        }
        
        return $email;
        
    }
        
    
    /**
     * 
     * @param type $url
     * @return string
     */
	static function ensureHttp($url){
		
		if(strlen($url)<=0){
			return $url;
		}
		
		if(strpos($url, "http://")!=0){
			return "http://".$url;
		}
		return $url;
	}

	//Traduction
	static function _r($category, $message, $params = array()) {
		return Yii::t($category, $message, $params);
	}

	static function _e($category, $message, $params = array()) {
		echo Yii::t($category, $message, $params);
	}

	static function lang() {
		return Yii::app() -> getLanguage();
	}

	//display
	static function format($format, $value, $options = array()) {
		$local = Yii::app() -> getLocale();
		switch($format) {
			case 'currency' :
				$currency = isset($options['currency']) ? $options['currency'] : 'CAD';
				return $local -> getNumberFormatter() -> formatCurrency($value, $currency);
			case 'percentage' :
				return $local -> getNumberFormatter() -> formatPercentage($value);
			default :
				return $local -> getNumberFormatter() -> format($format, $value);
		}
	}

	//Html
	static function h($text) {
		return htmlspecialchars($text, ENT_QUOTES, Yii::app() -> charset);
	}

	static function l($text, $url = '#', $htmlOptions = array()) {
		return Html::link($text, $url, $htmlOptions);
	}

	static function url($url) {
		echo Html::normalizeUrl($url);
	}

	static function img($url, $width, $height, $alt = '', $htmlOptions = array()) {
		$htmlOptions['width'] = $width;
		$htmlOptions['height'] = $height;
		echo Html::image($url, $alt, $htmlOptions);
	}

	static function css($css, $media = '') {
		static $cssId = 0;
		Yii::app() -> getClientScript() -> registerCss('css' . $cssId++, $css, $media);
	}

	static function cssFile($file, $media = '') {
		Yii::app() -> getClientScript() -> registerCssFile('/css/' . $file, $media);
	}

	static function registerPackage($name) {
		Yii::app() -> getClientScript() -> registerPackage($name);
	}

	static function script($js, $position = 4) {
		static $jsId = 0;
		Yii::app() -> getClientScript() -> registerScript('js' . $jsId++, $js, $position);
	}

	static function jsLink($id, $label, $htmlOptions = array()) {
		$htmlOptions['id'] = $id;
		if (!isset($htmlOptions['onclick']))
			$htmlOptions['onclick'] = 'javascript:return false;';
		return CHtml::link($label, '#', $htmlOptions);
	}

	//shortcuts
	static function app() {
		return Yii::app();
	}

	static function cs() {
		return Yii::app() -> getClientScript();
	}

	static function user() {
		return Yii::app() -> getUser();
	}

	//remplace le html_entity_decode()
	static function d($string) {

		$trans_tbl = get_html_translation_table(HTML_ENTITIES);
		$trans_tbl = array_flip($trans_tbl);
		return utf8_encode(strtr($string, $trans_tbl));
	}

	//Database
	static function sql($sql, $params = array()) {
		return Yii::app() -> db -> createCommand($sql) -> query($params);
	}

	static function sqlAll($sql, $params = array()) {
		return Yii::app() -> db -> createCommand($sql) -> queryAll(true, $params);
	}

	static function sqlColumn($sql, $params = array()) {
		return Yii::app() -> db -> createCommand($sql) -> queryColumn($params);
	}

	static function sqlRow($sql, $params = array()) {
		return Yii::app() -> db -> createCommand($sql) -> queryRow($params);
	}

	static function sqlScalar($sql, $params = array()) {
		return Yii::app() -> db -> createCommand($sql) -> queryScalar($params);
	}

	//debug
	static function echoDollar($var, $exit = false, $depth = 10, $highlight = false) {
		Yii::trace(CVarDumper::dumpAsString($var, $depth, $highlight));
		if ($exit)
			Yii::app() -> end();
	}
    
    static function convertArrayToObject($array){
        $object = new stdClass();
        foreach($array as $key => $value){
            $object->{$key} = $value;
        }
        
        return $object;
    }
}
