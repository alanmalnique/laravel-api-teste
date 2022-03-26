<?php
namespace App\Http\Service\Payment\Adapter;

use Exception;
use Ixudra\Curl\Facades\Curl;
use App\Utils\ValueUtils;
use App\Utils\PaymentUtils;
use App\Utils\GeneralUtils;

use App\Http\Interfaces\PaymentInterface;

class ExossWalletAdapter implements PaymentInterface
{
    private $url, $usuario, $senha, $versao;

    protected $conta;

    public function __construct()
    {
        $this->usuario = \Config::get('exosswallet.usuario');
        $this->senha = \Config::get('exosswallet.senha');
    	$this->url = \Config::get('exosswallet.url');
    	$this->versao = \Config::get('exosswallet.versao');
    }

    private function login()
    {
        $urlsend = $this->url.'/user/login';

        $response = Curl::to($urlsend)
            ->withContentType('Application/json')
            ->withHeader('X-Api-Version: '.$this->versao)
            ->withData([
                'email' => $this->usuario,
                'password' => $this->senha
            ])
            ->asJson(true)
            ->returnResponseObject()
            ->post();

        $headerCode = $response->status;
        $response->content = json_decode(json_encode($response->content), true);
        if($headerCode != 200 || $response->content['error']){
            return false;
        }
        $this->token = $response->content['data']['token'];
        return true;
    }

    private function enviaDados($url, $data, $tipo = "post")
    {
        $login = $this->login();
        if(!$login){
            return [
                'data' => [
                    'error' => true,
                    'message' => 'Falha ao logar no parceiro'
                ]
            ];
        }

    	$urlsend = $this->url.$url;

        $response = Curl::to($urlsend)
        	->withContentType('Application/json')
            ->withHeader('X-Api-Version: '.$this->versao)
            ->withHeader('Authorization: Bearer '.$this->token)
            ->withHeader('Exoss-Account: '.$this->conta)
            ->withData($data)
			->asJson(true)
			->returnResponseObject();

        if($tipo == "post"){
			$response = $response->post();
        }else if($tipo == "get"){
            $response = $response->get();
        }else if($tipo == "put"){
            $response = $response->put();
        }else if($tipo == "delete"){
            $response = $response->delete();
        }

        $headerCode = $response->status;
        $arrReturn['data'] = json_decode(json_encode($response->content), true);
        $arrReturn['header'] = $headerCode;
        return $arrReturn;
    }

    public function setConta($conta){
        $this->conta = $conta;
    }

    /**
     * Criar Conta Digital
     *
     * @bodyparam name
     * @bodyparam person (0-Física, 1-Jurídica)
     * @bodyparam cpf_cnpj (Com máscara)
     * @bodyparam address.street
     * @bodyparam address.number
     * @bodyparam address.district
     * @bodyparam address.complement
     * @bodyparam address.postal_code
     * @bodyparam email
     * @bodyparam cellphone
     */
    public function criarcontadigital(array $dados)
    {
        $request = $this->enviaDados("/onboarding/account", $dados, 'post');
        return $request['data'];
    }

    /**
     * Enviar Documento
     *
     * @bodyparam type (1-Selfie, 2-Documento)
     * @bodyparam base64
     */
    public function enviardocumento(array $dados)
    {
        $request = $this->enviaDados("/onboarding/account/upload", $dados, 'put');
        return $request['data'];
    }

    /**
     * Consultar Conta Digital
     */
    public function consultarcontadigital()
    {
        $request = $this->enviaDados("/account", [], 'get');
        return $request['data'];
    }

    /**
     * Adicionar Conta Bancária
     *
     * @bodyparam bank
     * @bodyparam person (0-Física, 1-Jurídica)
     * @bodyparam cpf_cnpj (Com máscara)
     * @bodyparam name
     * @bodyparam number
     * @bodyparam agency
     * @bodyparam digit
     * @bodyparam type (0-Poupança, 1-Corrente)
     * @bodyparam default
     */
    public function novacontabancaria(array $dados)
    {
        $request = $this->enviaDados("/account/bank", $dados, 'post');
        return $request['data'];
    }

    /**
     * Consultar Contas Bancárias
     *
     */
    public function consultarcontabancaria(array $dados)
    {
        $request = $this->enviaDados("/account/bank", [], 'get');
        return $request['data'];
    }

    /**
     * Remover Conta Bancária
     *
     * @bodyparam account_reference
     */
    public function removercontabancaria(array $dados)
    {
        $request = $this->enviaDados("/account/bank/".$dados['account_reference'], [], 'delete');
        return $request['data'];
    }

    /**
     * Criar Cobrança
     *
     * @bodyparam value
     * @bodyparam installments
     * @bodyparam type (1-Débito, 2-Crédito, 3-Boleto)
     * @bodyparam capture
     * @bodyparam return_url
     * @bodyparam card.security_code
     * @bodyparam card.number
     * @bodyparam card.month
     * @bodyparam card.year
     * @bodyparam card.flag
     * @bodyparam card.holder
     * @bodyparam card.token
     * @bodyparam boleto.due_date
     * @bodyparam latitude
     * @bodyparam longitude
     * @bodyparam tax_table
     * @bodyparam split.*.account_number
     * @bodyparam split.*.value
     */
    public function criarcobranca(array $dados)
    {
        $request = $this->enviaDados("/transaction/create", $dados, 'post');
        return $request['data'];
    }

    /**
     * Capturar Cobrança
     *
     * @bodyparam value
     * @bodyparam payment_id
     */
    public function capturarcobranca(array $dados)
    {
        $request = $this->enviaDados("/transaction/capture", $dados, 'put');
        return $request['data'];
    }

    /**
     * Cancelar Cobrança
     *
     * @bodyparam payment_id
     */
    public function cancelarcobranca(array $dados)
    {
        $request = $this->enviaDados("/transaction/cancel", $dados, 'delete');
        return $request['data'];
    }

    /**
     * Consultar Cobrança
     *
     * @bodyparam payment_id
     */
    public function consultarcobranca(array $dados)
    {
        $request = $this->enviaDados("/transaction/view/".$dados['payment_id'], [], 'get');
        return $request['data'];
    }

    /**
     * Valida um boleto
     *
     * @bodyparam barcode
     */
    public function validarboleto(array $dados)
    {
        $request = $this->enviaDados("/payment/validate/".$dados['barcode'], [], 'get');
        return $request['data'];
    }

    /**
     * Paga um boleto
     *
     * @bodyparam barcode
     * @bodyParam value
     */
    public function pagarboleto(array $dados)
    {
        $linha_digitavel = $dados['barcode'];
        unset($dados['barcode']);
        $request = $this->enviaDados("/payment/confirm/".$linha_digitavel, $dados, 'post');
        return $request['data'];
    }

    /**
     * Consulta um pagamento de boleto
     *
     * @bodyparam payment_reference
     */
    public function consultarpagamento(array $dados)
    {
        $request = $this->enviaDados("/payment/get/".$dados['payment_reference'], [], 'get');
        return $request['data'];
    }

    /**
     * Listar operadoras de celular
     *
     * @bodyparam page
     * @bodyparam per_page
     */
    public function listaroperadoras(array $dados)
    {
        $request = $this->enviaDados("/recharge/cellphone/operator", $dados, 'get');
        return $request['data'];
    }

    /**
     * Listar valor das operadoras de celular
     *
     * @bodyparam operator_code
     * @bodyparam cellphone
     */
    public function listarvaloroperadoras(array $dados)
    {
        $request = $this->enviaDados("/recharge/cellphone/value", $dados, 'get');
        return $request['data'];
    }

    /**
     * Consultar recarga de celular
     *
     * @bodyparam recharge_id
     */
    public function consultarrecargacelular(array $dados)
    {
        $request = $this->enviaDados("/recharge/cellphone/view".$dados['recharge_id'], [], 'get');
        return $request['data'];
    }

    /**
     * Confirmar recarga de celular
     *
     * @bodyparam value
     * @bodyparam operator_code
     * @bodyparam cellphone
     */
    public function recarregarcelular(array $dados)
    {
        $request = $this->enviaDados("/recharge/cellphone/confirm", $dados, 'post');
        return $request['data'];
    }

    /**
     * Listar produtos
     *
     * @bodyparam page
     * @bodyparam per_page
     */
    public function listarprodutos(array $dados)
    {
        $request = $this->enviaDados("/recharge/product/list", $dados, 'get');
        return $request['data'];
    }

    /**
     * Exibir produto
     *
     * @bodyparam product_code
     */
    public function exibirproduto(array $dados)
    {
        $request = $this->enviaDados("/recharge/product/show/".$dados['product_code'], [], 'get');
        return $request['data'];
    }

    /**
     * Consultar recarga de produto
     *
     * @bodyparam recharge_id
     */
    public function consultarrecargaproduto(array $dados)
    {
        $request = $this->enviaDados("/recharge/product/view".$dados['recharge_id'], [], 'get');
        return $request['data'];
    }

    /**
     * Confirmar recarga de produto
     *
     * @bodyparam value
     * @bodyparam product_code
     * @bodyparam coupon
     */
    public function recarregarproduto(array $dados)
    {
        $request = $this->enviaDados("/recharge/product/confirm", $dados, 'post');
        return $request['data'];
    }

    /**
     * Solicitar TED
     *
     * @bodyparam value
     * @bodyparam account_reference
     * @bodyparam return_url
     */
    public function solicitarted(array $dados)
    {
        $request = $this->enviaDados("/transfer/ted", $dados, 'post');
        return $request['data'];
    }

    /**
     * Consultar TED
     *
     * @bodyparam withdraw_reference
     * @bodyparam account_number
     */
    public function consultarted(array $dados)
    {
        $request = $this->enviaDados("/transfer/ted/".$dados['withdraw_reference'], [], 'get');
        return $request['data'];
    }

    /**
     * Solicitar Transferência
     *
     * @bodyparam account_number
     * @bodyparam value
     */
    public function solicitartransferencia(array $dados)
    {
        $request = $this->enviaDados("/transfer/account", $dados, 'post');
        return $request['data'];
    }

    /**
     * Consultar Transferência
     *
     * @bodyparam transfer_reference
     */
    public function consultartransferencia(array $dados)
    {
        $request = $this->enviaDados("/transfer/account/".$dados['transfer_reference'], [], 'get');
        return $request['data'];
    }

    /**
     * Consultar Extrato
     *
     * @bodyparam start_date
     * @bodyparam end_date
     * @bodyparam per_page
     * @bodyparam page
     */
    public function consultarextrato(array $dados)
    {
        $this->conta = $dados['account_number'];
        unset($dados['account_number']);
        $request = $this->enviaDados("/extract", $dados, 'get');
        return $request['data'];
    }
}
