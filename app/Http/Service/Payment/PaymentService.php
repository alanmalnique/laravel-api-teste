<?php
namespace App\Http\Service\Payment;

use App\Http\Interfaces\PaymentInterface;

class PaymentService
{
    protected $service;

    public function __construct(PaymentInterface $service)
    {
        $this->service = $service;
    }

    public function criarcontadigital($request)
    {       
        return $this->service->criarcontadigital($request);
    }

    public function enviardocumento($request)
    {       
        return $this->service->enviardocumento($request);
    }

    public function consultarcontadigital()
    {       
        return $this->service->consultarcontadigital();
    }

    public function novacontabancaria($request)
    {       
        return $this->service->novacontabancaria($request);
    }

    public function consultarcontabancaria($request)
    {
        return $this->service->consultarcontabancaria($request);
    }

    public function removercontabancaria($request)
    {
        return $this->service->removercontabancaria($request);
    }

    public function criarcobranca($request)
    {
        return $this->service->criarcobranca($request);
    }

    public function capturarcobranca($request)
    {
        return $this->service->capturarcobranca($request);
    }

    public function cancelarcobranca($request)
    {
        return $this->service->cancelarcobranca($request);
    }

    public function consultarcobranca($request)
    {
        return $this->service->consultarcobranca($request);
    }

    public function validarboleto($request)
    {
        return $this->service->validarboleto($request);
    }

    public function consultarpagamento($request)
    {
        return $this->service->consultarpagamento($request);
    }

    public function pagarboleto($request)
    {
        return $this->service->pagarboleto($request);
    }

    public function listaroperadoras($request)
    {
        return $this->service->listaroperadoras($request);
    }

    public function listarvaloroperadoras($request)
    {
        return $this->service->listarvaloroperadoras($request);
    }

    public function consultarrecargacelular($request)
    {
        return $this->service->consultarrecarga($request);
    }

    public function recarregarcelular($request)
    {
        return $this->service->recarregarcelular($request);
    }

    public function listarprodutos($request)
    {
        return $this->service->listarprodutos($request);
    }

    public function exibirproduto($request)
    {
        return $this->service->exibirproduto($request);
    }

    public function consultarrecargaproduto($request)
    {
        return $this->service->consultarrecargaproduto($request);
    }

    public function recarregarproduto($request)
    {
        return $this->service->recarregarproduto($request);
    }

    public function solicitarted($request)
    {
        return $this->service->solicitarted($request);
    }

    public function consultarted($request)
    {
        return $this->service->consultarted($request);
    }

    public function solicitartransferencia($request)
    {
        return $this->service->solicitartransferencia($request);
    }

    public function consultartransferencia($request)
    {
        return $this->service->consultartransferencia($request);
    }

    public function consultarextrato($request)
    {
        return $this->service->consultarextrato($request);
    }

    public function setConta($conta)
    {
        return $this->service->setConta($conta);
    }
}
