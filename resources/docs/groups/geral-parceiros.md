# Geral / Parceiros

APIs para gerenciar os dados de parceiros

## Listar Parceiros


Método para listar os parceiros

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/parceiros',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'query' => [
            'perPage'=> '15',
            'page'=> '6',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X GET \
    -G "http://api.modfiq.natus/api/geral/parceiros?perPage=15&page=6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/parceiros"
);

let params = {
    "perPage": "15",
    "page": "6",
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
            "nome": "Quem Somos",
            "descricao": "...",
            "link": "...",
            "arquivo": 1
        }
    ],
    "first_page_url": "http:\/\/domain\/api\/geral\/parceiros?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/api\/geral\/parceiros?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/api\/geral\/parceiros",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-geral-parceiros" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-parceiros"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-parceiros"></code></pre>
</div>
<div id="execution-error-GETapi-geral-parceiros" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-parceiros"></code></pre>
</div>
<form id="form-GETapi-geral-parceiros" data-method="GET" data-path="api/geral/parceiros" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-parceiros', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/parceiros</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>perPage</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="perPage" data-endpoint="GETapi-geral-parceiros" data-component="query"  hidden>
<br>
Registros por página</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="page" data-endpoint="GETapi-geral-parceiros" data-component="query"  hidden>
<br>
Página</p>
</form>



