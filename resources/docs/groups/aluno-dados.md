# Aluno / Dados

APIs para gerenciar os dados das contas de alunos

## Exibir Perfil

<small class="badge badge-darkred">requires authentication</small>

Retorna os dados do perfil do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://api.modfiq.natus/api/aluno/perfil',
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
    -G "http://api.modfiq.natus/api/aluno/perfil" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/perfil"
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
<div id="execution-results-GETapi-aluno-perfil" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-aluno-perfil"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-aluno-perfil"></code></pre>
</div>
<div id="execution-error-GETapi-aluno-perfil" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-aluno-perfil"></code></pre>
</div>
<form id="form-GETapi-aluno-perfil" data-method="GET" data-path="api/aluno/perfil" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-aluno-perfil', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/aluno/perfil</code></b>
</p>
<p>
<label id="auth-GETapi-aluno-perfil" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-aluno-perfil" data-component="header"></label>
</p>
</form>


## Atualizar Perfil

<small class="badge badge-darkred">requires authentication</small>

Atualiza os dados do perfil do aluno

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->put(
    'http://api.modfiq.natus/api/aluno/perfil',
    [
        'headers' => [
            'Authorization' => 'Bearer {YOUR_AUTH_KEY}',
            'Accept' => 'application/json',
        ],
        'json' => [
            'nome' => 'Fulano de Tal',
            'dtnascimento' => '99/99/9999',
            'whatsapp' => '(99) 99999-9999',
            'endereco' => 'Rua de Teste',
            'numero' => '12345',
            'complemento' => '',
            'bairro' => 'Bairro Teste',
            'cep' => '99.999-99',
            'email' => 'teste@teste.com',
            'senha' => 'teste123',
            'anamnese' => [
                'possui_hipertensao' => 1,
                'pratica_atividade' => 1,
                'quais_atividades' => 'Basquete, Futebol',
                'toma_medicamento' => 0,
                'quais_medicamentos' => '',
                'fumante' => 1,
                'fumante_tempo' => '1 ano',
                'possui_doenca' => 1,
                'quais_doencas' => 'Diabetes',
                'apresenta_dor' => 0,
                'quais_dores' => '',
                'movimento_dor' => '',
                'realizou_cirurgia' => 1,
                'quais_cirurgias' => 'Clavicula',
                'tempo_ultima_cirurgia' => '1 ano',
                'objetivo' => 'Hipertrofia',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X PUT \
    "http://api.modfiq.natus/api/aluno/perfil" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"Fulano de Tal","dtnascimento":"99\/99\/9999","whatsapp":"(99) 99999-9999","endereco":"Rua de Teste","numero":"12345","complemento":"","bairro":"Bairro Teste","cep":"99.999-99","email":"teste@teste.com","senha":"teste123","anamnese":{"possui_hipertensao":1,"pratica_atividade":1,"quais_atividades":"Basquete, Futebol","toma_medicamento":0,"quais_medicamentos":"","fumante":1,"fumante_tempo":"1 ano","possui_doenca":1,"quais_doencas":"Diabetes","apresenta_dor":0,"quais_dores":"","movimento_dor":"","realizou_cirurgia":1,"quais_cirurgias":"Clavicula","tempo_ultima_cirurgia":"1 ano","objetivo":"Hipertrofia"}}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/perfil"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Fulano de Tal",
    "dtnascimento": "99\/99\/9999",
    "whatsapp": "(99) 99999-9999",
    "endereco": "Rua de Teste",
    "numero": "12345",
    "complemento": "",
    "bairro": "Bairro Teste",
    "cep": "99.999-99",
    "email": "teste@teste.com",
    "senha": "teste123",
    "anamnese": {
        "possui_hipertensao": 1,
        "pratica_atividade": 1,
        "quais_atividades": "Basquete, Futebol",
        "toma_medicamento": 0,
        "quais_medicamentos": "",
        "fumante": 1,
        "fumante_tempo": "1 ano",
        "possui_doenca": 1,
        "quais_doencas": "Diabetes",
        "apresenta_dor": 0,
        "quais_dores": "",
        "movimento_dor": "",
        "realizou_cirurgia": 1,
        "quais_cirurgias": "Clavicula",
        "tempo_ultima_cirurgia": "1 ano",
        "objetivo": "Hipertrofia"
    }
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (400):

```json
{
    "erro": true,
    "mensagem": "Não foi possível alterar os dados do aluno"
}
```
> Example response (200):

```json
{
    "erro": false
}
```
<div id="execution-results-PUTapi-aluno-perfil" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-aluno-perfil"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-aluno-perfil"></code></pre>
</div>
<div id="execution-error-PUTapi-aluno-perfil" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-aluno-perfil"></code></pre>
</div>
<form id="form-PUTapi-aluno-perfil" data-method="PUT" data-path="api/aluno/perfil" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-aluno-perfil', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/aluno/perfil</code></b>
</p>
<p>
<label id="auth-PUTapi-aluno-perfil" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-aluno-perfil" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Nome do aluno.</p>
<p>
<b><code>dtnascimento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dtnascimento" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Data de nascimento do aluno.</p>
<p>
<b><code>whatsapp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="whatsapp" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Whatsapp do aluno.</p>
<p>
<b><code>endereco</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="endereco" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Endereço do aluno.</p>
<p>
<b><code>numero</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="numero" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Número do endereço do aluno.</p>
<p>
<b><code>complemento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="complemento" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Complemento do endereço do aluno.</p>
<p>
<b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bairro" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Bairro do endereço do aluno.</p>
<p>
<b><code>cep</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cep" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
CEP do endereço do aluno.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Email do aluno.</p>
<p>
<b><code>senha</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="senha" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Senha do aluno.</p>
<p>
<details>
<summary>
<b><code>anamnese</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>anamnese.possui_hipertensao</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.possui_hipertensao" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno possui hipertensão.</p>
<p>
<b><code>anamnese.pratica_atividade</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.pratica_atividade" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno pratica atividade física.</p>
<p>
<b><code>anamnese.quais_atividades</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.quais_atividades" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais atividades.</p>
<p>
<b><code>anamnese.toma_medicamento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.toma_medicamento" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno toma algum medicamento.</p>
<p>
<b><code>anamnese.quais_medicamentos</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.quais_medicamentos" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais medicamentos.</p>
<p>
<b><code>anamnese.fumante</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.fumante" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno fumante.</p>
<p>
<b><code>anamnese.fumante_tempo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.fumante_tempo" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Fuma há quanto tempo.</p>
<p>
<b><code>anamnese.possui_doenca</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.possui_doenca" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno possui doença.</p>
<p>
<b><code>anamnese.quais_doencas</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.quais_doencas" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais doenças.</p>
<p>
<b><code>anamnese.apresenta_dor</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.apresenta_dor" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno apresenta dor.</p>
<p>
<b><code>anamnese.quais_dores</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.quais_dores" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais dores.</p>
<p>
<b><code>anamnese.movimento_dor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.movimento_dor" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais movimentos sente dores.</p>
<p>
<b><code>anamnese.realizou_cirurgia</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.realizou_cirurgia" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Aluno realizou cirurgia.</p>
<p>
<b><code>anamnese.quais_cirurgias</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.quais_cirurgias" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Quais cirurgias.</p>
<p>
<b><code>anamnese.tempo_ultima_cirurgia</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.tempo_ultima_cirurgia" data-endpoint="PUTapi-aluno-perfil" data-component="body"  hidden>
<br>
Tempo última cirurgia.</p>
<p>
<b><code>anamnese.objetivo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.objetivo" data-endpoint="PUTapi-aluno-perfil" data-component="body" required  hidden>
<br>
Objetivo do aluno.</p>
</details>
</p>

</form>



