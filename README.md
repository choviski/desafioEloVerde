# Desafio Web Developer
Resolução do desafio da empresa EloVerde

## Problema
1. Login

1.1) O projeto deverá possuir uma tela de login onde será possível informar um usuário e senha;

1.2) O acesso a outras rotas diferentes de "login" deverá ser bloqueado enquanto não autenticado;

1.3) A autenticação poderá ser realizada de duas formas:
a) Armazenamento das credenciais do usuário no LocalStorage. Se existem, considera-se autenticado;
b) Geração de token JWT por meio do plugin jwt-auth (https://github.com/tymondesigns/jwt-auth) no Laravel Framework. Observar que, nesta opção, serão considerados pontos extras na sua avaliação;

1.4) Para considerar as credenciais válidas para o acesso, poderá ser feito de três formas:
a) Considerar válida qualquer credencial informada (login e senha) desde que não seja em branco;
b) Considerar válida somente uma credencial específica que estará definida a nível de código (hard coded);
c) Considerar válidas somente as credenciais cadastradas na tabela referente aos usuários no banco de dados. Nesta opção, será necessário a implementação de um formulário para cadastro dos usuários;

2. Cadastro de Clientes

2.1) Deverá possuir um cadastro de clientes contendo no mínimo os seguintes campos:
a) Nome;
b) CPF ou CNPJ;
c) Endereço;
d) Telefone;

2.2) Regras desse cadastro:
a) Não pode haver CPF ou CNPJ duplicado;
b) Deverá ser possível registrar quantos endereços forem necessários tendo que definir apenas 1 como principal;
c) Deve permitir registrar quantos telefones forem necessários;

##  Tecnologias ulitizadas
- HTML
- SQL
- PHP
- FrameWork Laravel
- CSS
- Bootstrap 4
- Javascript
- servidor Apache
- gitHub

## Funcionamento 
Ao acessar o sistema, será requisitado email e senha, se você ainda não possuir um cadastro no sistema, você pode criar um novo usuario.
Após fazer o login será mostrado uma lista de clientes do sistema, sendo possível editar e deletar os dados do cliente, ao clicar sobre o nome, é mostrado os dados demais dados
também é possivel cadastrar o cliente com uma imagem, e com os demais dados requisitados, sendo possivel inserir mais de um endereço e mais de um telefone.
Além disso também é possivel editar as informações do usuario. Vale ressaltar que como requisitado não é possivel acessar outras rotas do sistema sem ter logado primeiro
