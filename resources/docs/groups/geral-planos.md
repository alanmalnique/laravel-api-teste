# Geral / Planos

APIs para gerenciar os dados de planos

## Listar Planos


Método para listar os planos

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/plano',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'query' => [
            'perPage'=> '19',
            'page'=> '7',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/geral/plano?perPage=19&page=7" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/plano"
);

let params = {
    "perPage": "19",
    "page": "7",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

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
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "titulo": "Quem Somos",
            "resumo": "...",
            "descricao": "...",
            "valor": 250,
            "arquivo": 1
        }
    ],
    "first_page_url": "http:\/\/domain\/api\/geral\/plano?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/api\/geral\/plano?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/api\/geral\/plano",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-geral-plano" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-plano"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-plano"></code></pre>
</div>
<div id="execution-error-GETapi-geral-plano" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-plano"></code></pre>
</div>
<form id="form-GETapi-geral-plano" data-method="GET" data-path="api/geral/plano" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-plano', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/plano</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-geral-plano" data-component="query"  hidden>
<br>
Registros por página</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-geral-plano" data-component="query"  hidden>
<br>
Página</p>
</form>


## Consultar Plano


Método para consultar os dados de um registro de plano

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/plano/sapiente',
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
    -G "http://api.modfiq.natus/api/geral/plano/sapiente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/plano/sapiente"
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
    "mensagem": "Os dados do plano não foram encontrados"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "id": 1,
        "titulo": "Biolivre",
        "valor": 250,
        "resumo": "...",
        "descricao": "...",
        "arquivo": 1
    }
}
```
<div id="execution-results-GETapi-geral-plano--plano-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-plano--plano-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-plano--plano-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-plano--plano-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-plano--plano-"></code></pre>
</div>
<form id="form-GETapi-geral-plano--plano-" data-method="GET" data-path="api/geral/plano/{plano}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-plano--plano-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/plano/{plano}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>plano</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="plano" data-endpoint="GETapi-geral-plano--plano-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-geral-plano--plano-" data-component="url" required  hidden>
<br>
ID do plano</p>
</form>



