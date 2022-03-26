# Geral / Arquivo

APIs para baixar arquivo

## Baixar arquivo


Método para baixar arquivo

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/arquivo/est/baixar',
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
    -G "http://api.modfiq.natus/api/geral/arquivo/est/baixar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/arquivo/est/baixar"
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
    "erro": true,
    "mensagem": "Arquivo não encontrado"
}
```
> Example response (400):

```json
{
    "erro": true,
    "mensagem": "Arquivo não encontrado"
}
```
<div id="execution-results-GETapi-geral-arquivo--arq_id--baixar" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-arquivo--arq_id--baixar"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-arquivo--arq_id--baixar"></code></pre>
</div>
<div id="execution-error-GETapi-geral-arquivo--arq_id--baixar" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-arquivo--arq_id--baixar"></code></pre>
</div>
<form id="form-GETapi-geral-arquivo--arq_id--baixar" data-method="GET" data-path="api/geral/arquivo/{arq_id}/baixar" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-arquivo--arq_id--baixar', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/arquivo/{arq_id}/baixar</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>arq_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="arq_id" data-endpoint="GETapi-geral-arquivo--arq_id--baixar" data-component="url" required  hidden>
<br>
ID do arquivo</p>
</form>


## Ver arquivo


Método para baixar arquivo

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/arquivo/non/ver',
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
    -G "http://api.modfiq.natus/api/geral/arquivo/non/ver" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/arquivo/non/ver"
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
    "erro": true,
    "mensagem": "Arquivo não encontrado"
}
```
> Example response (400):

```json
{
    "erro": true,
    "mensagem": "Arquivo não encontrado"
}
```
<div id="execution-results-GETapi-geral-arquivo--arq_id--ver" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-arquivo--arq_id--ver"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-arquivo--arq_id--ver"></code></pre>
</div>
<div id="execution-error-GETapi-geral-arquivo--arq_id--ver" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-arquivo--arq_id--ver"></code></pre>
</div>
<form id="form-GETapi-geral-arquivo--arq_id--ver" data-method="GET" data-path="api/geral/arquivo/{arq_id}/ver" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-arquivo--arq_id--ver', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/arquivo/{arq_id}/ver</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>arq_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="arq_id" data-endpoint="GETapi-geral-arquivo--arq_id--ver" data-component="url" required  hidden>
<br>
ID do arquivo</p>
</form>


## Dados do arquivo


Método para ver dados do arquivo

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/arquivo/et/dados',
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
    -G "http://api.modfiq.natus/api/geral/arquivo/et/dados" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/arquivo/et/dados"
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


> Example response (200):

```json
{
    "arq_id": 1,
    "arq_data": "2020-06-09",
    "arq_pasta": "teste",
    "arq_extensao": "png",
    "arq_nome": "logo.png",
    "filepath": "\/path\/to\/storage\/5.png"
}
```
> Example response (400):

```json
{
    "erro": true,
    "mensagem": "Arquivo não encontrado"
}
```
<div id="execution-results-GETapi-geral-arquivo--arq_id--dados" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-arquivo--arq_id--dados"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-arquivo--arq_id--dados"></code></pre>
</div>
<div id="execution-error-GETapi-geral-arquivo--arq_id--dados" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-arquivo--arq_id--dados"></code></pre>
</div>
<form id="form-GETapi-geral-arquivo--arq_id--dados" data-method="GET" data-path="api/geral/arquivo/{arq_id}/dados" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-arquivo--arq_id--dados', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/arquivo/{arq_id}/dados</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>arq_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="arq_id" data-endpoint="GETapi-geral-arquivo--arq_id--dados" data-component="url" required  hidden>
<br>
ID do arquivo</p>
</form>



