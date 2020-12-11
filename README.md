<h1>APIS3 PRODUTOS API</h1>

<h3>Instalação</h3>
<p>
composer install
composer require maatwebsite/excel</p>

<h3>Sinopse</h3>
<p>
A aplicação recebe requisições através de uma API POST que espera um arquivo Excel. Esse arquivo será recebido pelo Controller e enviado a um serviço, que o salvará dentro do projeto e vai iniciar um job chamado ImportProductsJob. Esse job vem gerido em modo de Queue e seu status se mantém atualizado com uma tabela assistente que temos chamada job_tracks. Os produtos serão inseridos dentro da tabela products em forma de Queue. Ao término do processamento do job a classe AppServiceProvider está já configurada para atualizar o status do job dentro da nossa tabela seja em caso de sucesso quanto em caso de erro. </p>
 
<p>Temos ainda API’s para cancelamento de um produto específico que espera receber um ID e ainda API’s GET para visualização da lista de produtos em formato JSON, visualização do produto individualmente (detalhe) e visualização do status da última requisição de importação dos produtos.</p>

<p>
Laravel Framework versao 8, Banco de dados SQLite
</p>

<h3>Documentação / API's</h3>

<p>
Nome: Importar produtos<br>
API: /api/products<br>
Metodo: POST<br>
Payload: Arquivo Excel com nome 'produtos'
</p>

<p>
Nome: Ver produtos<br>
API: /api/products<br>
Metodo: GET
</p>

<p>
Nome: Ver produto individual<br>
API: /api/products/{produto_id}<br>
Metodo: GET
</p>

<p>
Nome: Deletar produto<br>
API: /api/products/{produto_id}<br>
Metodo: DELETE
</p>

<p>
Nome: Ver status de importacao<br>
API: /api/products_status<br>
Metodo: GET
</p>

