# Aluno / Mensalidade

APIs para gerenciar as mensalidades das contas de alunos

## Mensalidade

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados da mensalidade do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/aluno/mensalidade',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/aluno/mensalidade" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/mensalidade"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
{
     "dtvencimento": "9999-99-99"
     "descricao": "Mensal",
     "valor": 150,
     "historico": [
         {
             "valor": 150,
             "dtpagto": "9999-99-99"
         }
     ]
}
```
<div id="execution-results-GETapi-aluno-mensalidade" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-aluno-mensalidade"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-aluno-mensalidade"></code></pre>
</div>
<div id="execution-error-GETapi-aluno-mensalidade" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-aluno-mensalidade"></code></pre>
</div>
<form id="form-GETapi-aluno-mensalidade" data-method="GET" data-path="api/aluno/mensalidade" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-aluno-mensalidade', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/aluno/mensalidade</code></b>
</p>
<p>
<label id="auth-GETapi-aluno-mensalidade" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-aluno-mensalidade" data-component="header"></label>
</p>
</form>


## Pagamento

<small class="badge badge-darkred">requires authentication</small>

Realiza o pagamento da mensalidade

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/aluno/pagamento',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'numero' => '9999 9999 9999 9999',
            'mes' => '01',
            'ano' => '2026',
            'cvv' => '123',
            'bandeira' => 2,
            'titular' => 'Nome de Teste',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/aluno/pagamento" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"numero":"9999 9999 9999 9999","mes":"01","ano":"2026","cvv":"123","bandeira":2,"titular":"Nome de Teste"}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/pagamento"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "numero": "9999 9999 9999 9999",
    "mes": "01",
    "ano": "2026",
    "cvv": "123",
    "bandeira": 2,
    "titular": "Nome de Teste"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
{
     "dtvencimento": "9999-99-99"
     "descricao": "Mensal",
     "valor": 150,
     "historico": [
         {
             "valor": 150,
             "dtpagto": "9999-99-99"
         }
     ]
}
```
<div id="execution-results-POSTapi-aluno-pagamento" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-aluno-pagamento"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-aluno-pagamento"></code></pre>
</div>
<div id="execution-error-POSTapi-aluno-pagamento" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-aluno-pagamento"></code></pre>
</div>
<form id="form-POSTapi-aluno-pagamento" data-method="POST" data-path="api/aluno/pagamento" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-aluno-pagamento', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/aluno/pagamento</code></b>
</p>
<p>
<label id="auth-POSTapi-aluno-pagamento" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-aluno-pagamento" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>numero</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="numero" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
Número do cartão.</p>
<p>
<b><code>mes</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mes" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
Mês de validade.</p>
<p>
<b><code>ano</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ano" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
Ano de validade.</p>
<p>
<b><code>cvv</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cvv" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
CVV do cartão.</p>
<p>
<b><code>bandeira</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bandeira" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
Bandeira do cartão.</p>
<p>
<b><code>titular</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="titular" data-endpoint="POSTapi-aluno-pagamento" data-component="body" required  hidden>
<br>
Titular do cartão.</p>

</form>



