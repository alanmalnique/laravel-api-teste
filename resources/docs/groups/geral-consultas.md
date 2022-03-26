# Geral / Consultas

APIs para gerenciar as consultas aos bureaus.

## Consulta os dados de um CEP


Método para consultar os dados de um CEP

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/geral/consultacep',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'cep' => '18.682-050',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/geral/consultacep" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"cep":"18.682-050"}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/consultacep"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "cep": "18.682-050"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (400):

```json
{
    "erro": true,
    "mensagem": "CEP não encontrado"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "cep": "01001-000",
        "logradouro": "Praça da Sé",
        "complemento": "lado ímpar",
        "bairro": "Sé",
        "localidade": "São Paulo",
        "uf": "SP",
        "unidade": "",
        "ibge": "3550308",
        "gia": "1004"
    }
}
```
<div id="execution-results-POSTapi-geral-consultacep" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-geral-consultacep"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-geral-consultacep"></code></pre>
</div>
<div id="execution-error-POSTapi-geral-consultacep" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-geral-consultacep"></code></pre>
</div>
<form id="form-POSTapi-geral-consultacep" data-method="POST" data-path="api/geral/consultacep" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-geral-consultacep', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/geral/consultacep</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>cep</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cep" data-endpoint="POSTapi-geral-consultacep" data-component="body" required  hidden>
<br>
CEP para a consulta.</p>

</form>



