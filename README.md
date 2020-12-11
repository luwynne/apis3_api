APIS3 PRODUTOS API

Instalação
composer install
composer require maatwebsite/excel

Sinopse
A aplicação recebe requisições através de uma API POST que espera um arquivo Excel. Esse arquivo será recebido pelo Controller e enviado a um serviço, que o salvará dentro do projeto e vai iniciar um job chamado ImportProductsJob. Esse job vem gerido em modo de Queue e seu status se mantém atualizado com uma tabela assistente que temos chamada job_tracks. Os produtos serão inseridos dentro da tabela products em forma de Queue. Ao término do processamento do job a classe AppServiceProvider está já configurada para atualizar o status do job dentro da nossa tabela seja em caso de sucesso quanto em caso de erro. 
 
Temos ainda API’s para cancelamento de um produto específico que espera receber um ID e ainda API’s GET para visualização da lista de produtos em formato JSON, visualização do produto individualmente (detalhe) e visualização do status da última requisição de importação dos produtos.



Documentação / API's

Nome: Importar produtos
API: /api/products
Metodo: POST
Payload: Arquivo Excel com nome 'produtos'

Nome: Ver produtos
API: /api/products
Metodo: GET

Nome: Ver produto individual
API: /api/products/{produto_id}
Metodo: GET

Nome: Deletar produto
API: /api/products/{produto_id}
Metodo: DELETE

Nome: Ver status de importacao
API: /api/products_status
Metodo: GET
