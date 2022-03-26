# Aluno / Onboarding

APIs para gerenciar o onboarding das contas de alunos

## Login


Realiza o login para utilizar o painel

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/aluno/login',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'email' => 'teste@teste.com',
            'senha' => 'teste123',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/aluno/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"teste@teste.com","senha":"teste123"}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "teste@teste.com",
    "senha": "teste123"
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
    "mensagem": "Usuário e\/ou senha inválido!"
}
```
> Example response (200):

```json

{
  "erro": false,
  "data": {
     "id": 1,
     "nome": "Aluno de Teste",
     "arquivo": 1,
     "aula_hoje": 1,
     "horario_aula": "19:00",
     "dtvencimento": "9999-99-99",
     "plano": {
         "descricao": "Mensal",
         "valor": 150,
     }
     "token": "..."
  }
}
```
<div id="execution-results-POSTapi-aluno-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-aluno-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-aluno-login"></code></pre>
</div>
<div id="execution-error-POSTapi-aluno-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-aluno-login"></code></pre>
</div>
<form id="form-POSTapi-aluno-login" data-method="POST" data-path="api/aluno/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-aluno-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/aluno/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-aluno-login" data-component="body" required  hidden>
<br>
Email do aluno.</p>
<p>
<b><code>senha</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="senha" data-endpoint="POSTapi-aluno-login" data-component="body" required  hidden>
<br>
Senha do aluno.</p>

</form>


## Cadastro


Realiza o cadastro do aluno para utilizar o painel

> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://api.modfiq.natus/api/aluno/cadastro',
    [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'json' => [
            'nome' => 'Fulano de Tal',
            'email' => 'teste@teste.com',
            'cpf' => '999.999.999-99',
            'senha' => 'teste123',
            'whatsapp' => '(99) 99999-9999',
            'endereco' => 'Rua de Teste',
            'numero' => '102',
            'complemento' => '',
            'bairro' => 'Centro',
            'cep' => '99.999-999',
            'cidade' => 'São Paulo',
            'uf' => 'SP',
            'pais' => 'Brasil',
            'plano' => 1,
            'professor' => 'SP',
            'dtnascimento' => '99/99/9999',
            'anamnese' => [
                'praticaatividade' => 1,
                'qualatividade' => 'teste',
                'tomamedicamento' => 1,
                'qualmedicamento' => 'teste',
                'fumante' => 1,
                'fumaquantotempo' => 'teste',
                'hipertensao' => 1,
                'doenca' => 1,
                'qualdoenca' => 'teste',
                'apresentador' => 1,
                'qualdor' => 'teste',
                'qualmovimentosentedor' => 'teste',
                'fezcirurgia' => 1,
                'qualcirurgia' => 'teste',
                'tempocirurgia' => 'teste',
                'objetivo' => 'teste',
            ],
            'aula' => [
                'dia' => '10',
                'horario' => '10:00',
                'mes' => '10',
            ],
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```bash
curl -X POST \
    "http://api.modfiq.natus/api/aluno/cadastro" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"nome":"Fulano de Tal","email":"teste@teste.com","cpf":"999.999.999-99","senha":"teste123","whatsapp":"(99) 99999-9999","endereco":"Rua de Teste","numero":"102","complemento":"","bairro":"Centro","cep":"99.999-999","cidade":"S\u00e3o Paulo","uf":"SP","pais":"Brasil","plano":1,"professor":"SP","dtnascimento":"99\/99\/9999","anamnese":{"praticaatividade":1,"qualatividade":"teste","tomamedicamento":1,"qualmedicamento":"teste","fumante":1,"fumaquantotempo":"teste","hipertensao":1,"doenca":1,"qualdoenca":"teste","apresentador":1,"qualdor":"teste","qualmovimentosentedor":"teste","fezcirurgia":1,"qualcirurgia":"teste","tempocirurgia":"teste","objetivo":"teste"},"aula":{"dia":"10","horario":"10:00","mes":"10"}}'

```

```javascript
const url = new URL(
    "http://api.modfiq.natus/api/aluno/cadastro"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "nome": "Fulano de Tal",
    "email": "teste@teste.com",
    "cpf": "999.999.999-99",
    "senha": "teste123",
    "whatsapp": "(99) 99999-9999",
    "endereco": "Rua de Teste",
    "numero": "102",
    "complemento": "",
    "bairro": "Centro",
    "cep": "99.999-999",
    "cidade": "S\u00e3o Paulo",
    "uf": "SP",
    "pais": "Brasil",
    "plano": 1,
    "professor": "SP",
    "dtnascimento": "99\/99\/9999",
    "anamnese": {
        "praticaatividade": 1,
        "qualatividade": "teste",
        "tomamedicamento": 1,
        "qualmedicamento": "teste",
        "fumante": 1,
        "fumaquantotempo": "teste",
        "hipertensao": 1,
        "doenca": 1,
        "qualdoenca": "teste",
        "apresentador": 1,
        "qualdor": "teste",
        "qualmovimentosentedor": "teste",
        "fezcirurgia": 1,
        "qualcirurgia": "teste",
        "tempocirurgia": "teste",
        "objetivo": "teste"
    },
    "aula": {
        "dia": "10",
        "horario": "10:00",
        "mes": "10"
    }
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
    "mensagem": "Não foi possível realizar o cadastro"
}
```
> Example response (200):

```json
{
    "erro": false
}
```
<div id="execution-results-POSTapi-aluno-cadastro" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-aluno-cadastro"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-aluno-cadastro"></code></pre>
</div>
<div id="execution-error-POSTapi-aluno-cadastro" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-aluno-cadastro"></code></pre>
</div>
<form id="form-POSTapi-aluno-cadastro" data-method="POST" data-path="api/aluno/cadastro" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-aluno-cadastro', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/aluno/cadastro</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>nome</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="nome" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Nome do aluno.</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Email do aluno.</p>
<p>
<b><code>cpf</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cpf" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
CPF do aluno.</p>
<p>
<b><code>senha</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="senha" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Senha do aluno.</p>
<p>
<b><code>whatsapp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="whatsapp" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Whatsapp do aluno.</p>
<p>
<b><code>endereco</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="endereco" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Endereço do aluno.</p>
<p>
<b><code>numero</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="numero" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Número do endereço do aluno.</p>
<p>
<b><code>complemento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="complemento" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Complemento do endereço do aluno.</p>
<p>
<b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bairro" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Bairro do endereço do aluno.</p>
<p>
<b><code>cep</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cep" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
CEP do endereço do aluno.</p>
<p>
<b><code>cidade</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="cidade" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Cidade do aluno.</p>
<p>
<b><code>uf</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="uf" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
UF do endereço do aluno.</p>
<p>
<b><code>pais</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pais" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
País do endereço do aluno.</p>
<p>
<b><code>plano</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="plano" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
ID do plano do aluno.</p>
<p>
<b><code>professor</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="professor" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
ID do professor do aluno.</p>
<p>
<b><code>dtnascimento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="dtnascimento" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Dt. Nascimento do aluno.</p>
<p>
<details>
<summary>
<b><code>anamnese</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>anamnese.praticaatividade</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.praticaatividade" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Pratica Atividade.</p>
<p>
<b><code>anamnese.qualatividade</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualatividade" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Quais Atividades.</p>
<p>
<b><code>anamnese.tomamedicamento</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.tomamedicamento" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Toma Medicamento.</p>
<p>
<b><code>anamnese.qualmedicamento</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualmedicamento" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Quais Medicamentos.</p>
<p>
<b><code>anamnese.fumante</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.fumante" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Fumante.</p>
<p>
<b><code>anamnese.fumaquantotempo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.fumaquantotempo" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Fuma há quanto tempo.</p>
<p>
<b><code>anamnese.hipertensao</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.hipertensao" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Possui Hipertensão.</p>
<p>
<b><code>anamnese.doenca</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.doenca" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Possui doença.</p>
<p>
<b><code>anamnese.qualdoenca</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualdoenca" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Qual doença.</p>
<p>
<b><code>anamnese.apresentador</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.apresentador" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Apresenta Dor.</p>
<p>
<b><code>anamnese.qualdor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualdor" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Quais dores.</p>
<p>
<b><code>anamnese.qualmovimentosentedor</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualmovimentosentedor" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Qual movimento sente dor.</p>
<p>
<b><code>anamnese.fezcirurgia</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.fezcirurgia" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Fez cirurgia.</p>
<p>
<b><code>anamnese.qualcirurgia</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.qualcirurgia" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Qual cirurgia.</p>
<p>
<b><code>anamnese.tempocirurgia</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="anamnese.tempocirurgia" data-endpoint="POSTapi-aluno-cadastro" data-component="body"  hidden>
<br>
Tempo da última cirurgia.</p>
<p>
<b><code>anamnese.objetivo</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anamnese.objetivo" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Qual Objetivo.</p>
</details>
</p>
<p>
<details>
<summary>
<b><code>aula</code></b>&nbsp;&nbsp;<small>object</small>     <i>optional</i> &nbsp;
<br>
</summary>
<br>
<p>
<b><code>aula.dia</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="aula.dia" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Dia aula experimental.</p>
<p>
<b><code>aula.horario</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="aula.horario" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Horário aula experimental.</p>
<p>
<b><code>aula.mes</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="aula.mes" data-endpoint="POSTapi-aluno-cadastro" data-component="body" required  hidden>
<br>
Mês aula experimental.</p>
</details>
</p>

</form>



