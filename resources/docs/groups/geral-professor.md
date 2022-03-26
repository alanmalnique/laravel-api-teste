# Geral / Professor

APIs para gerenciar os dados de professores

## Listar Professores


Retorna os professores ativos na plataforma

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/professor',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/geral/professor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/professor"
);

let headers = {
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
            "id": 1,
            "arquivo": 1,
            "nome": "Fulano de Tal",
            "descricao": "..."
        }
    ]
}
```
<div id="execution-results-GETapi-geral-professor" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-professor"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-professor"></code></pre>
</div>
<div id="execution-error-GETapi-geral-professor" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-professor"></code></pre>
</div>
<form id="form-GETapi-geral-professor" data-method="GET" data-path="api/geral/professor" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-professor', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/professor</code></b>
</p>
</form>


## Listar Horários


Retorna os horários de um professor

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/professor/horarios/eligendi',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/geral/professor/horarios/eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/professor/horarios/eligendi"
);

let headers = {
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
     "1": ["19:00:00", "20:00:00"]
  ]
}
```
<div id="execution-results-GETapi-geral-professor-horarios--professor-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-professor-horarios--professor-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-professor-horarios--professor-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-professor-horarios--professor-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-professor-horarios--professor-"></code></pre>
</div>
<form id="form-GETapi-geral-professor-horarios--professor-" data-method="GET" data-path="api/geral/professor/horarios/{professor}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-professor-horarios--professor-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/professor/horarios/{professor}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>professor</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="professor" data-endpoint="GETapi-geral-professor-horarios--professor-" data-component="url" required  hidden>
<br>
</p>
</form>



