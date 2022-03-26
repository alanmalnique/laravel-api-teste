# Aluno / Registro Evolutivo

APIs para gerenciar as mensalidades das contas de alunos

## Listar Registro

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados do registro evolutivo do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/aluno/registroevolutivo',
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
    -G "http://api.modfiq.natus/api/aluno/registroevolutivo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/registroevolutivo"
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
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "arquivo": 1,
            "datahora": "9999-99-99 99:99:99",
            "descricao": "..."
        }
    ],
    "first_page_url": "http:\/\/domain\/aluno\/registroevolutivo?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/aluno\/registroevolutivo?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/aluno\/registroevolutivoo",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-aluno-registroevolutivo" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-aluno-registroevolutivo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-aluno-registroevolutivo"></code></pre>
</div>
<div id="execution-error-GETapi-aluno-registroevolutivo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-aluno-registroevolutivo"></code></pre>
</div>
<form id="form-GETapi-aluno-registroevolutivo" data-method="GET" data-path="api/aluno/registroevolutivo" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-aluno-registroevolutivo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/aluno/registroevolutivo</code></b>
</p>
<p>
<label id="auth-GETapi-aluno-registroevolutivo" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-aluno-registroevolutivo" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-aluno-registroevolutivo" data-component="url"  hidden>
<br>
Registros por página.</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-aluno-registroevolutivo" data-component="url"  hidden>
<br>
Página atual.</p>
</form>


## Enviar Registro

<small class="badge badge-darkred">requires authentication</small>

Envia um novo registro evolutivo do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/aluno/registroevolutivo',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'multipart' => [
            [
                'name' => 'descricao',
                'contents' => 'distinctio'
            ],
            [
                'name' => 'arquivo',
                'contents' => fopen('C:\Users\Natus Tecnologia\AppData\Local\Temp\php7EA8.tmp', 'r')
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/aluno/registroevolutivo" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: multipart/form-data" \
    -H "Accept: application/json" \
    -F "descricao=distinctio" \
    -F "arquivo=@C:\Users\Natus Tecnologia\AppData\Local\Temp\php7EA8.tmp" 
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/registroevolutivo"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('descricao', 'distinctio');
body.append('arquivo', document.querySelector('input[name="arquivo"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


> Example response (400):

```json
{
    "erro": true,
    "mensagem": "Não foi possível realizar o upload do documento"
}
```
> Example response (200):

```json
{
    "erro": false
}
```
<div id="execution-results-POSTapi-aluno-registroevolutivo" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-aluno-registroevolutivo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-aluno-registroevolutivo"></code></pre>
</div>
<div id="execution-error-POSTapi-aluno-registroevolutivo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-aluno-registroevolutivo"></code></pre>
</div>
<form id="form-POSTapi-aluno-registroevolutivo" data-method="POST" data-path="api/aluno/registroevolutivo" data-authed="1" data-hasfiles="1" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-aluno-registroevolutivo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/aluno/registroevolutivo</code></b>
</p>
<p>
<label id="auth-POSTapi-aluno-registroevolutivo" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-aluno-registroevolutivo" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>arquivo</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="arquivo" data-endpoint="POSTapi-aluno-registroevolutivo" data-component="body" required  hidden>
<br>
Arquivo do upload</p>
<p>
<b><code>descricao</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="descricao" data-endpoint="POSTapi-aluno-registroevolutivo" data-component="body"  hidden>
<br>
Descrição do registro</p>

</form>



