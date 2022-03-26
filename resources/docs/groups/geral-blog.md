# Geral / Blog

APIs para gerenciar os dados de blog

## Listar Notícias


Método para listar as notícias

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/blog',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'query' => [
            'perPage'=> '18',
            'page'=> '12',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/geral/blog?perPage=18&page=12" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/blog"
);

let params = {
    "perPage": "18",
    "page": "12",
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
            "data": "9999-99-99",
            "arquivo": 1,
            "parceiro": {
                "id": 1,
                "nome": "Testes",
                "arquivo": 1
            }
        }
    ],
    "first_page_url": "http:\/\/domain\/api\/geral\/blog?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/api\/geral\/blog?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/api\/geral\/blog",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-geral-blog" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-blog"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-blog"></code></pre>
</div>
<div id="execution-error-GETapi-geral-blog" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-blog"></code></pre>
</div>
<form id="form-GETapi-geral-blog" data-method="GET" data-path="api/geral/blog" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-blog', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/blog</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-geral-blog" data-component="query"  hidden>
<br>
Registros por página</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-geral-blog" data-component="query"  hidden>
<br>
Página</p>
</form>


## Consultar Notícia


Método para consultar os dados de um registro de notícia

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/blog/quis',
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
    -G "http://api.modfiq.natus/api/geral/blog/quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/blog/quis"
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
    "mensagem": "Os dados da notícia não foram encontrados"
}
```
> Example response (200):

```json
{
    "erro": false,
    "data": {
        "id": 1,
        "titulo": "Quem Somos",
        "resumo": "...",
        "texto": "...",
        "datahora": "9999-99-99 99:99:99",
        "arquivo": 1,
        "parceiro": {
            "id": 1,
            "nome": "Testes",
            "url": "...",
            "arquivo": 1
        }
    }
}
```
<div id="execution-results-GETapi-geral-blog--blog-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-blog--blog-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-blog--blog-"></code></pre>
</div>
<div id="execution-error-GETapi-geral-blog--blog-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-blog--blog-"></code></pre>
</div>
<form id="form-GETapi-geral-blog--blog-" data-method="GET" data-path="api/geral/blog/{blog}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-blog--blog-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/blog/{blog}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>blog</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="blog" data-endpoint="GETapi-geral-blog--blog-" data-component="url" required  hidden>
<br>
</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-geral-blog--blog-" data-component="url" required  hidden>
<br>
ID da notícia</p>
</form>



