# Geral / Institucional

APIs para gerenciar os dados institucionais

## Listar Institucional


Método para listar os dados institucionais da categoria

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/institucional/listar/excepturi',
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
    -G "http://api.modfiq.natus/api/geral/institucional/listar/excepturi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/institucional/listar/excepturi"
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
            "titulo": "Termos de uso",
            "texto": "..."
        }
    ]
}
```
<div id="execution-results-GETapi-geral-institucional-listar--categoria-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-institucional-listar--categoria-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-institucional-listar--categoria-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-institucional-listar--categoria-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-institucional-listar--categoria-"></code></pre>
</div>
<form id="form-GETapi-geral-institucional-listar--categoria-" data-method="GET" data-path="api/geral/institucional/listar/{categoria}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-institucional-listar--categoria-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/institucional/listar/{categoria}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>categoria</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="categoria" data-endpoint="GETapi-geral-institucional-listar--categoria-" data-component="url" required  hidden>
<br>
ID da categoria institucional</p>
</form>


## Consultar Institucional


Método para consultar os dados de um registro institucional

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/institucional/detalhes/qui',
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
    -G "http://api.modfiq.natus/api/geral/institucional/detalhes/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/institucional/detalhes/qui"
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
    "mensagem": "Os dados institucionais não foram encontrados"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "id": 1,
        "titulo": "Termos de uso",
        "texto": "..."
    }
}
```
<div id="execution-results-GETapi-geral-institucional-detalhes--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-institucional-detalhes--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-institucional-detalhes--id-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-institucional-detalhes--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-institucional-detalhes--id-"></code></pre>
</div>
<form id="form-GETapi-geral-institucional-detalhes--id-" data-method="GET" data-path="api/geral/institucional/detalhes/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-institucional-detalhes--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/institucional/detalhes/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-geral-institucional-detalhes--id-" data-component="url" required  hidden>
<br>
ID do institucional</p>
</form>


## Listar Categorias


Método para listar as categorias de institucional

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/institucional/categorias',
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
    -G "http://api.modfiq.natus/api/geral/institucional/categorias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/institucional/categorias"
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
            "titulo": "Quem Somos",
            "resumo": "...",
            "arquivo": 1
        }
    ]
}
```
<div id="execution-results-GETapi-geral-institucional-categorias" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-institucional-categorias"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-institucional-categorias"></code></pre>
</div>
<div id="execution-error-GETapi-geral-institucional-categorias" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-institucional-categorias"></code></pre>
</div>
<form id="form-GETapi-geral-institucional-categorias" data-method="GET" data-path="api/geral/institucional/categorias" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-institucional-categorias', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/institucional/categorias</code></b>
</p>
</form>


## Consultar Categoria


Método para mostar os detalhes de uma categoria institucional

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/institucional/categorias/et',
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
    -G "http://api.modfiq.natus/api/geral/institucional/categorias/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/institucional/categorias/et"
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
    "data": {
        "id": 1,
        "titulo": "Quem Somos",
        "resumo": "...",
        "arquivo": 1
    }
}
```
<div id="execution-results-GETapi-geral-institucional-categorias--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-institucional-categorias--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-institucional-categorias--id-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-institucional-categorias--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-institucional-categorias--id-"></code></pre>
</div>
<form id="form-GETapi-geral-institucional-categorias--id-" data-method="GET" data-path="api/geral/institucional/categorias/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-institucional-categorias--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/institucional/categorias/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-geral-institucional-categorias--id-" data-component="url" required  hidden>
<br>
ID da categoria institucional</p>
</form>



