# Aluno / Aula

APIs para gerenciar as aulas de alunos

## Listar Horários

<small class="badge badge-darkred">requires authentication</small>

Retorna os horários de aula  do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/aluno/horarios',
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
    -G "http://api.modfiq.natus/api/aluno/horarios" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/horarios"
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


> Example response (400):

```json
{
    "vazio": true
}
```
> Example response (200):

```json
{
    "vazio": false,
    "data": [
        {
            "diasemana": 1,
            "horario": "19:00:00",
            "professor": "Professor de teste"
        }
    ]
}
```
<div id="execution-results-GETapi-aluno-horarios" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-aluno-horarios"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-aluno-horarios"></code></pre>
</div>
<div id="execution-error-GETapi-aluno-horarios" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-aluno-horarios"></code></pre>
</div>
<form id="form-GETapi-aluno-horarios" data-method="GET" data-path="api/aluno/horarios" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-aluno-horarios', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/aluno/horarios</code></b>
</p>
<p>
<label id="auth-GETapi-aluno-horarios" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-aluno-horarios" data-component="header"></label>
</p>
</form>


## Salvar Aula

<small class="badge badge-darkred">requires authentication</small>

Grava o horário de entrada e saída

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/aluno/aula',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'tipo' => 4,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/aluno/aula" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"tipo":4}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/aula"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "tipo": 4
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
<div id="execution-results-POSTapi-aluno-aula" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-aluno-aula"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-aluno-aula"></code></pre>
</div>
<div id="execution-error-POSTapi-aluno-aula" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-aluno-aula"></code></pre>
</div>
<form id="form-POSTapi-aluno-aula" data-method="POST" data-path="api/aluno/aula" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-aluno-aula', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/aluno/aula</code></b>
</p>
<p>
<label id="auth-POSTapi-aluno-aula" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-aluno-aula" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>tipo</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="tipo" data-endpoint="POSTapi-aluno-aula" data-component="body" required  hidden>
<br>
Tipo de registro (1-Entrada, 2-Saída)</p>

</form>



