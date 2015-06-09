# singleton
Singleton - Senac

Objetivo Principal

O Singleton é um padrão de desenvolvimento de projeto, no qual seu principal objetivo é permitir a instanciação de determinada
classe, apenas uma vez ao longo do código. Ou seja, apenas a classe irá controlar a instanciação da classe, proibindo a criação
de objetos da classe no padrão singleton, por outras classes do projeto, provendo assim, um acesso global a esta instância.

Exemplo de Utilização

Um exemplo de Utilização do singleton, é na instanciação de uma conexão com banco de dados em uma aplicação web, pois em todo o projeto, para cada acesso ao banco de dados, necessitaremos realizar uma conexão com o banco, sobrecarrendo, com isso, o servidor, 
deixando-o lento devido aos diversos acessos de usuários que a aplicação poderia ter. No entanto, se conseguirmos instanciar uma única
vez essa classe, toda vez que invocarmos seus métodos, a conexão estará aberta e não precisaremos criar uma nova conexão com o banco.
