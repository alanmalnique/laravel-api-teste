# Geral / Aula

APIs para gerenciar as aulas

## Salvar Aula

<small class="badge badge-darkred">requires authentication</small>

Grava o horário de entrada e saída

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/geral/aula',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'tipo' => 3,
            'tipo_aula' => 4,
            'id' => 16,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/geral/aula" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"tipo":3,"tipo_aula":4,"id":16}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/aula"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "tipo": 3,
    "tipo_aula": 4,
    "id": 16
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
    "mensagem": "Não foi possível salvar o horário"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "url": "..."
    }
}
```
<div id="execution-results-POSTapi-geral-aula" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-geral-aula"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-geral-aula"></code></pre>
</div>
<div id="execution-error-POSTapi-geral-aula" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-geral-aula"></code></pre>
</div>
<form id="form-POSTapi-geral-aula" data-method="POST" data-path="api/geral/aula" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-geral-aula', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/geral/aula</code></b>
</p>
<p>
<label id="auth-POSTapi-geral-aula" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-geral-aula" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>tipo</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="tipo" data-endpoint="POSTapi-geral-aula" data-component="body" required  hidden>
<br>
Tipo de registro (1-Entrada, 2-Saída)</p>
<p>
<b><code>tipo_aula</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="tipo_aula" data-endpoint="POSTapi-geral-aula" data-component="body" required  hidden>
<br>
Tipo de registro (1-Professor, 2-Aluno)</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-geral-aula" data-component="body" required  hidden>
<br>
ID do aluno ou professor</p>

</form>



