<h1>APIS3 PRODUTOS API</h1>

<h3>Instalação</h3>
<p>
composer install<br>
composer require maatwebsite/excel<br>
php artisan migrate
</p>

<h3>Sinopse</h3>
<p>
A aplicação recebe requisições através de uma API POST que espera um arquivo Excel. Esse arquivo será recebido pelo Controller e enviado a um serviço, que o salvará dentro do projeto e vai iniciar um job chamado ImportProductsJob. Esse job vem gerido em modo de Queue e seu status se mantém atualizado com uma tabela assistente que temos chamada job_tracks. Os produtos serão inseridos dentro da tabela products em forma de Queue. Ao término do processamento do job a classe AppServiceProvider está já configurada para atualizar o status do job dentro da nossa tabela seja em caso de sucesso quanto em caso de erro. </p>
 
<p>Temos ainda API’s para cancelamento de um produto específico que espera receber um ID e ainda API’s GET para visualização da lista de produtos em formato JSON, visualização do produto individualmente (detalhe) e visualização do status da última requisição de importação dos produtos.</p>

<p>
<small>Laravel Framework versão 8, Banco de dados SQLite</small>
</p>

<h3>Documentação / API's</h3>

<p>
<b>Nome: </b> Importar produtos<br>
<b>API: </b>/api/products<br>
<b>Metodo: </b>POST<br>
<b>Payload: </b>Arquivo Excel com nome 'produtos'
</p>

<p>
<b>Nome: </b>Ver produtos<br>
<b>API: </b>/api/products<br>
<b>Metodo: </b>GET
</p>

<p>
<b>Nome: </b>Ver produto individual<br>
<b>API: </b>/api/products/{produto_id}<br>
<b>Metodo: </b>GET
</p>

<p>
<b>Nome: </b>Deletar produto<br>
<b>API: </b>/api/products/{produto_id}<br>
<b>Metodo: </b>DELETE
</p>

<p>
<b>Nome: </b>Ver status de importacao<br>
<b>API: </b>/api/products_status<br>
<b>Metodo: </b>GET
</p>

