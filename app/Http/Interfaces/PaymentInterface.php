<?php
namespace App\Http\Interfaces;

interface PaymentInterface
{
    function criarcontadigital(array $data);
    function enviardocumento(array $data);
    function consultarcontadigital();
    function novacontabancaria(array $data);
    function consultarcontabancaria(array $data);
    function removercontabancaria(array $data);
    function criarcobranca(array $data);
    function capturarcobranca(array $data);
    function cancelarcobranca(array $data);
    function consultarcobranca(array $data);
    function validarboleto(array $data);
    function consultarpagamento(array $data);
    function pagarboleto(array $data);
    function listaroperadoras(array $data);
    function listarvaloroperadoras(array $data);
    function consultarrecargacelular(array $data);
    function recarregarcelular(array $data);
    function listarprodutos(array $data);
    function exibirproduto(array $data);
    function consultarrecargaproduto(array $data);
    function recarregarproduto(array $data);
    function solicitarted(array $data);
    function consultarted(array $data);
    function solicitartransferencia(array $data);
    function consultartransferencia(array $data);
    function consultarextrato(array $data);
    function setConta($conta);
}