# Professor / Aluno

APIs para gerenciar os alunos de professores

## Listar Alunos

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados dos alunos do professor

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/professor/aluno',
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
    -G "http://api.modfiq.natus/api/professor/aluno" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/professor/aluno"
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
            "nome": "Aluno de teste",
            "whatsapp": "(99) 99999-9999"
        }
    ],
    "first_page_url": "http:\/\/domain\/professor\/aluno?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/aprofessor\/aluno?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/professor\/aluno",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-professor-aluno" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-professor-aluno"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-professor-aluno"></code></pre>
</div>
<div id="execution-error-GETapi-professor-aluno" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-professor-aluno"></code></pre>
</div>
<form id="form-GETapi-professor-aluno" data-method="GET" data-path="api/professor/aluno" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-professor-aluno', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/professor/aluno</code></b>
</p>
<p>
<label id="auth-GETapi-professor-aluno" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-professor-aluno" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="per_page" data-endpoint="GETapi-professor-aluno" data-component="url"  hidden>
<br>
Registros por página.</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-professor-aluno" data-component="url"  hidden>
<br>
Página atual.</p>
</form>


## Exibir Aluno

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados do perfil do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/professor/aluno/rerum',
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
    -G "http://api.modfiq.natus/api/professor/aluno/rerum" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/professor/aluno/rerum"
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
    "data": {
        "id": 1,
        "nome": "Aluno de Teste",
        "dtnascimento": "9999-99-99",
        "whatsapp": "(99) 99999-9999",
        "endereco": "Rua de Teste",
        "numero": "10",
        "complemento": "",
        "bairro": "Bairro Teste",
        "cep": "99.999-999",
        "email": "teste@teste.com",
        "anamnese": {
            "possui_hipertensao": 1,
            "pratica_atividade": 1,
            "quais_atividades": "Teste",
            "toma_medicamento": 1,
            "quais_medicamentos": "Teste",
            "fumante": 1,
            "fumante_tempo": "Teste",
            "possui_doenca": 1,
            "quais_doencas": "Teste",
            "apresenta_dor": 1,
            "quais_dores": "teste",
            "movimento_dores": "Teste",
            "realizou_cirurgia": 1,
            "quais_cirurgias": "Teste",
            "tempo_ultima_cirurgia": "Teste",
            "objetivo": "Teste"
        }
    }
}
```
<div id="execution-results-GETapi-professor-aluno--aluno-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-professor-aluno--aluno-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-professor-aluno--aluno-"></code></pre>
</div>
<div id="execution-error-GETapi-professor-aluno--aluno-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-professor-aluno--aluno-"></code></pre>
</div>
<form id="form-GETapi-professor-aluno--aluno-" data-method="GET" data-path="api/professor/aluno/{aluno}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-professor-aluno--aluno-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/professor/aluno/{aluno}</code></b>
</p>
<p>
<label id="auth-GETapi-professor-aluno--aluno-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-professor-aluno--aluno-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>aluno</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="aluno" data-endpoint="GETapi-professor-aluno--aluno-" data-component="url" required  hidden>
<br>
</p>
</form>



