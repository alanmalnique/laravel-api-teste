# Geral / Contato

APIs para gerenciar os contatos realizados com o Exoss Card

## Fale Conosco


Método para enviar um email de contato

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/geral/faleconosco',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'nome' => 'Fulano de Tal',
            'celular' => '(99) 99999-9999',
            'email' => 'fulanodetal@outlook.com',
            'assunto' => 'Dúvidas',
            'mensagem' => 'Gostaria de saber como baixar o app.',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/geral/faleconosco" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"Fulano de Tal","celular":"(99) 99999-9999","email":"fulanodetal@outlook.com","assunto":"D\u00favidas","mensagem":"Gostaria de saber como baixar o app."}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/geral/faleconosco"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Fulano de Tal",
    "celular": "(99) 99999-9999",
    "email": "fulanodetal@outlook.com",
    "assunto": "D\u00favidas",
    "mensagem": "Gostaria de saber como baixar o app."
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
    "mensagem": "Não foi possível enviar o email"
}
```
> Example response (200):

```json
{
    "erro": false
}
```
<div id="execution-results-POSTapi-geral-faleconosco" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-geral-faleconosco"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-geral-faleconosco"></code></pre>
</div>
<div id="execution-error-POSTapi-geral-faleconosco" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-geral-faleconosco"></code></pre>
</div>
<form id="form-POSTapi-geral-faleconosco" data-method="POST" data-path="api/geral/faleconosco" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-geral-faleconosco', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/geral/faleconosco</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTapi-geral-faleconosco" data-component="body" required  hidden>
<br>
Nome do contato.</p>
<p>
<b><code>celular</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="celular" data-endpoint="POSTapi-geral-faleconosco" data-component="body" required  hidden>
<br>
Celular do contato.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-geral-faleconosco" data-component="body" required  hidden>
<br>
Email do contato.</p>
<p>
<b><code>assunto</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="assunto" data-endpoint="POSTapi-geral-faleconosco" data-component="body" required  hidden>
<br>
Assunto do contato.</p>
<p>
<b><code>mensagem</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="mensagem" data-endpoint="POSTapi-geral-faleconosco" data-component="body" required  hidden>
<br>
Mensagem do contato.</p>

</form>



