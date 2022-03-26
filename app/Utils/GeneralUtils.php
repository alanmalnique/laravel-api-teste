<?php
namespace App\Utils;

class GeneralUtils {

	/**
	 * Retorna o caminho completo do arquivo (path)
	 */
	public static function filePath($arquivoModel)
	{
		return storage_path('app') . "/public/" . $arquivoModel->arq_pasta . "/" . $arquivoModel->arq_id . "." . $arquivoModel->arq_extensao;
	}
	
    /**
     * Retorna a data formatada
	 * @property integer 'data'
	 * @property string 'tipo' ('br', 'eua')
     */
    public static function dateFormat($data)
    {
		if ($data['tipo'] == 'br') {
			// Valida se possui barra na data
			if (strpos("/", $data['data']) !== false) {
				$data['data'] = str_replace("/", "-", $data['data']);
			}
			$dataRetorno = date("d/m/Y", strtotime($data['data']));
		} else {
			// Valida se possui barra na data
			if (strpos("/", $data['data']) !== false) {
				$data['data'] = str_replace("/", "-", $data['data']);
			}
			$dataRetorno = date("Y-m-d", strtotime($data['data']));
		}
		return $dataRetorno;
	}

	/**
	 * Trata um documento (CPF ou CNPJ)
	 * @param array $data {
	 * 	@property string 'documento'
	 * 	@property string 'tipo' ('limpo', 'formatado')
	 * }
	 */
	public static function documentFormat($data)
	{
		// Primeiro valida se é um cpf ou cnpj
		$strDocumento = str_replace(array("-",".","/"), "", $data['documento']);
		if($data['tipo'] == 'limpo')
			return $strDocumento;
		$strTipoDoc = strlen($strDocumento) < 14 ? 'cpf' : 'cnpj';
		// Se for um cpf
		if ($strTipoDoc == 'cpf') {
			return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $strDocumento);
		} else { // Se for um cnpj
			return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $strDocumento);
		}
	}
	
	/**
	 * Remove os acentos das palavras
	 * @param string 'string'
	 */
	public static function removeSpecialChars($string)
	{
		// matriz de entrada
	    $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
	
	    // matriz de saída
	    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','','','','','','','','','','','','','','','','','','','','','','','' );
	
	    // devolver a string
	    return str_replace($what, $by, $string);
	}

	/**
	 * Retorna Latitude / Longitude de acordo com dados informados
	 * @param array '$data' {
	 * 	@property string 'cep'
	 * 	@property string 'numero'
	 * 	@property string 'rua'
	 * }
	 */
	public static function getCoordinates($data)
	{
		// $mapsKey = env('GOOGLEMAPS_SERVERKEY');
		// $data['cep'] = str_replace(array(".", "-"), "", $data['cep']);
		// if(!isset($data['rua'])) {
		// 	$urlCep = "https://maps.googleapis.com/maps/api/geocode/json?address={$data['cep']}&key=".$mapsKey."&components=country:BR";
		// 	$contentCep = json_decode(file_get_contents($urlCep), true);
		// 	$adress = rawurlencode(utf8_encode($data['numero'].', '.$contentCep['results'][0]['formatted_address']));
		// }else{
		// 	$adress = rawurlencode(utf8_encode($data['numero'].', '.$data['rua']));
		// }
		// $urlLatLong = "https://maps.googleapis.com/maps/api/geocode/json?address={$adress}&key=".urlencode($mapsKey)."&components=country:BR";
		// $contentLatLong = json_decode(file_get_contents($urlLatLong), true);
		// if(strlen($contentLatLong['results'][0]['address_components'][4]['short_name']) > 2){ // Não retornou o UF com 2 caracteres
		// 	$sanitizeUF = $this::setRemoveAcentos($contentLatLong['results'][0]['address_components'][4]['short_name']);
		// 	// foreach($MAPS['UF']['LIST'] as $indice=>$linha){
		// 	// 	if(strpos($sanitizeUF, $this->setRemoveAcentos($indice)) !== false){
		// 	// 		$ufShortName = $linha;
		// 	// 		break;
		// 	// 	}
		// 	// }
		// } else {
		// 	$ufShortName = $contentLatLong['results'][0]['address_components'][4]['short_name'];
		// }

		// foreach ($contentLatLong['results'][0]['address_components'] as $result) {
		// 	if (in_array("administrative_area_level_1", $result['types'])) {
		// 		$state = $result['long_name'];
		// 		$uf = $result['short_name'];
		// 	}

		// 	if (in_array("administrative_area_level_2", $result['types'])) {
		// 		$city = $result['long_name'];
		// 	}

		// 	if (in_array("sublocality_level_1", $result['types'])) {
		// 		$neightboard = $result['long_name'];
		// 	}

		// 	if (in_array("postal_code", $result['types'])) {
		// 		//$postal_code = $result['long_name'];
		// 	}
		// } 
		
		$arrReturn = array(
			"latitude"=>'',
			"longitude"=>'',
			"endereco"=>'',
			"numero"=>'1730',
			"bairro"=>'Centro',
			"cidade"=>'Lençóis Paulista',
			"estado"=>'São Paulo',
			"uf"=>'SP'
		);
		return $arrReturn;
	}

	public static function geraCodigoAutenticacao($tipo, $transacao)
	{
		$diaSemana = date("w") + 1;
		$operacao = $tipo;
		$diaAno = date("z") + 231;
		$ano = substr(date("Y"), 1, 3);
		$segundos = ((date("H") * 60) * 60) + (date("i") * 60) + date("s");
		return $diaSemana.$operacao.$ano.'-'.$diaAno.$segundos.'-'.$transacao;
	}

	public static function float2Preco($preco)
	{
		$preco = str_replace(",", ".", $preco);
		return number_format((double)$preco, 2, ',', '.');
	}
}