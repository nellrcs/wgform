# WGFORM

---

> **Nota**: A classe necessita dos arquivos jquery e [jQuery-Mask-Plugin](github.com/igorescobar/jQuery-Mask-Plugin).

---

A intenção é desenvolver uma classe que crie altomaticamente os campos e as configuracoes de um formulario.

### Como que funciona?
Um array contendo os nomes dos campos do formulario recebe o o metodo [index] com as propriedades do campo,
Depois este array eh passado para a metodo formulario. 


### Configuracão.
Incluir o qrquivo wgform.class.php
```php
include "wgform.class.php";
```

Defina as propriedades.
Se existir nome os dados serão retornado dentro da tag form, se não existir algumas opções nao serão mais validas 
```php
	WGform::$nome = 'formulario1';
```
Caminho do action
```php
	WGform::$action = 'print_request.php';
```
Nome da classe css
```php
	WGform::$css_class = 'formulario_contato';
```
Personalisa o botao enviar dentro do form
```php
	WGform::$html_botao = null;
```	
Metodo POST ou GET
```php
	WGform::$method = "POST";
```	
Inclui automatico um ajax que faz o submit, Passar array com os nomes das funcoes js na ordem. success|error|beforeSend|complete 
```php
	WGform::$ajax = true;
```	
-----------------
### Propiedades dos campos
```php
array(
/*0: input, 1:textarea, 2:select , 3:radio, 4:checkbox, 5:oculto, 6:arquivo, default:input */
'tipo'=>0, 
/* Exibe tag label antes do nome. */
'label'=>true, 
/* Define o titulo do campo. */
'titulo'=>'Todos', 
/* Nome do campo igual o que sera usado na tabela ou campo que tera as opções. */
'campo'=>'todos',  
/* Se houver um value */
'valor'=>'12345', 
/* Id geralmente eh atribuido altomatico, mas se precisdar usar um id expecifico */
'id'=>'nome', 
/* O preenchimanto sera obrigatorio */
'obrigatorio'=>true, 
/* O placeholder usara o valor do titulo */
'placeholder'=>true, 
/* Usar jquery.mask.min.js  */
'mascara'=>'(00) 000-0000', 
/* Insere string html antes do input */
'html_antes'=>'<hr></hr>', 
/* Insere string html depois do input */
'html_depois'=>'</br>', 
/* classe css no input, classe default 'form-control' (Bootstrap) */
'css_class'=>'form-control', 
/* Opções do select, @ marca o campo selecionado */
'opcoes'=>array('1'=>'campo1','@2'=>'campo2','3'=>'campo3')
```	
------------------
### exemplo de criacao de varios inputs
As propiedades sao passadas para o metodo  ***WGform::index($propiedades = array())***,
que configura a estutura dentro de cada  campo do array ***$paramtros_obj[]***.
```php
$campos = array('nome','sobrenome','idade','estado','cidade','bairro','rua','numero','cep');
foreach ($campos as $campo) {
	$paramtros_obj[$campo] = WGform::index(array('tipo'=>0,'campo'=>$campo,'titulo'=>$campo,'label'=>true));
}
```
---
> E por fim eh chamado o metodo formulario  que printa o html gerado.
```php
print WGform::formulario($paramtros_obj);
```
---

------------------
### Ajax
Se o ajax estiver habilitado podem ser configurada funcoes detro dos eventos. 

```javascript
/* NOMES FUNCOES EVENTOS AJAX */

/* evento success */
function enviado(data)
{
	console.log(data);
}
/* evento error */
function erro(data)
{
	console.log(data);
}
/* evento beforeSend */
function antes_enviar(data)
{
	console.log(data);
} 
/* evento complete */
function completo(data)
{
	console.log(data);	
}
```

E na declaração do php devem ser passados os nomes das funcoes. 
```php
WGform::$ajax = array('enviado','erro','antes_enviar','completo');
```

