# Geral / Banner

APIs para gerenciar os dados de banners

## Listar Banners


Método para listar os banners

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/geral/banner',
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
    -G "http://api.modfiq.natus/api/geral/banner" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/banner"
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
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "titulo": "Banner 01",
            "descricao": "...",
            "link": "...",
            "arquivo": 1
        }
    ],
    "first_page_url": "http:\/\/domain\/api\/geral\/banner?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/domain\/api\/geral\/banner?page=1",
    "next_page_url": null,
    "path": "http:\/\/domain\/api\/geral\/banner",
    "per_page": 20,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```
<div id="execution-results-GETapi-geral-banner" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-geral-banner"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-geral-banner"></code></pre>
</div>
<div id="execution-error-GETapi-geral-banner" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-geral-banner"></code></pre>
</div>
<form id="form-GETapi-geral-banner" data-method="GET" data-path="api/geral/banner" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-geral-banner', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/geral/banner</code></b>
</p>
</form>



