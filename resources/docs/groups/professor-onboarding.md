# Professor / Onboarding

APIs para gerenciar as contas de professores

## Login


Realiza o login para utilizar o painel

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/professor/login',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'teste@teste.com',
            'senha' => 'teste123',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/professor/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"teste@teste.com","senha":"teste123"}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/professor/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "teste@teste.com",
    "senha": "teste123"
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
    "mensagem": "Usuário e\/ou senha inválido!"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "id": 1,
        "nome": "Professor de teste",
        "arquivo": 1,
        "token": "..."
    }
}
```
<div id="execution-results-POSTapi-professor-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-professor-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-professor-login"></code></pre>
</div>
<div id="execution-error-POSTapi-professor-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-professor-login"></code></pre>
</div>
<form id="form-POSTapi-professor-login" data-method="POST" data-path="api/professor/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-professor-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/professor/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-professor-login" data-component="body" required  hidden>
<br>
Email do professor.</p>
<p>
<b><code>senha</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="senha" data-endpoint="POSTapi-professor-login" data-component="body" required  hidden>
<br>
Senha do professor.</p>

</form>



