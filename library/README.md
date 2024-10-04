# Projeto de Gestão de Usuários com Laravel

Este projeto é uma aplicação em Laravel que permite a gestão de usuários, onde cada usuário pode ser classificado como **Aluno** ou **Professor**. A aplicação implementa funcionalidades de CRUD (Create, Read, Update, Delete) e autenticação.

## Funcionalidades

- Adicionar novos usuários com a escolha entre **Aluno** e **Professor**.
- Exibir uma tabela listando todos os usuários com informações como nome, email, tipo (aluno/professor) e ações (editar/excluir).
- Editar as informações dos usuários, incluindo a troca de status entre aluno e professor.
- Excluir usuários com confirmação.
- Autenticação de usuário.
- Interface clara e responsiva.

## Requisitos

- PHP >= 8.0
- Composer
- MySQL
- Node.js (para gerenciamento de assets)

## Instalação

### Passo 1: Clonar o repositório

Clone o repositório do projeto para o seu ambiente local:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio

Passo 2: Instalar o Laravel
Caso ainda não tenha o Laravel instalado globalmente, instale o Composer (se necessário) e depois o Laravel:

bash
Copiar código
composer global require laravel/installer
Passo 3: Instalar as dependências
Dentro do diretório do projeto, execute o comando para instalar as dependências do PHP e do Laravel:

bash
Copiar código
composer install
Passo 4: Configurar o arquivo .env
Duplique o arquivo .env.example e renomeie-o para .env:

bash
Copiar código
cp .env.example .env
Abra o arquivo .env e configure as seguintes variáveis de ambiente com os dados do seu banco de dados:

env
Copiar código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
Passo 5: Gerar a chave da aplicação
Depois de configurar o .env, gere a chave da aplicação:

bash
Copiar código
php artisan key:generate
Passo 6: Migrar as tabelas do banco de dados
Agora você pode rodar as migrações para criar as tabelas no banco de dados:

bash
Copiar código
php artisan migrate
Passo 7: Compilar os assets (opcional)
Se o projeto incluir arquivos CSS ou JS compilados com Laravel Mix, você precisará rodar o seguinte comando para compilar os assets:

bash
Copiar código
npm install
npm run dev
Passo 8: Rodar o servidor local
Por fim, inicie o servidor local do Laravel:

bash
Copiar código
php artisan serve
A aplicação estará acessível no navegador pelo endereço http://localhost:8000.

Uso
Cadastro de Usuário
Para adicionar um novo usuário, navegue até a página de cadastro de usuários. No formulário de cadastro, você poderá inserir os dados como nome, email e senha, além de selecionar se o usuário será Aluno ou Professor.

Listagem de Usuários
A aplicação possui uma tabela que lista todos os usuários cadastrados, mostrando informações como nome, email, tipo de usuário (Aluno ou Professor) e ações disponíveis (editar/excluir).

Edição de Usuário
Você pode editar as informações de um usuário, incluindo a mudança entre os tipos Aluno e Professor, clicando no botão de edição na tabela de listagem de usuários.

Exclusão de Usuário
Para excluir um usuário, basta clicar no botão de exclusão. Será solicitado uma confirmação antes de realizar a exclusão.

Estrutura do Projeto
Aqui está um resumo das principais partes do projeto:

Models/User.php: Este é o modelo principal do usuário. Ele utiliza as Traits de Laravel como HasApiTokens, HasFactory e Notifiable. O modelo também contém a lógica para relacionamentos, como a associação de múltiplos empréstimos (caso haja essa lógica de loan).

Views: As visualizações são responsáveis por exibir as telas para o usuário final. Elas incluem o formulário de cadastro, a listagem de usuários e outras páginas relacionadas.

Controllers: Os controladores, como o UserController, gerenciam as ações do usuário, como criação, edição, exclusão e visualização dos dados.

Routes/web.php: Define as rotas da aplicação. Aqui estão as rotas que mapeiam URLs específicas para métodos nos controladores.

Migrations: Arquivos de migração responsáveis por criar e modificar as tabelas do banco de dados. Isso inclui a tabela de usuários e quaisquer outras tabelas necessárias para funcionalidades adicionais, como empréstimos.

Contribuição
Se você deseja contribuir para este projeto, siga os seguintes passos:

Faça um fork do projeto.
Crie uma nova branch (git checkout -b feature-nova-funcionalidade).
Commite suas alterações (git commit -m 'Adiciona nova funcionalidade').
Faça o push para a branch (git push origin feature-nova-funcionalidade).
Abra um Pull Request.
Licença
Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

markdown
Copiar código

### Explicação:

- **Seções essenciais**: O `README.md` começa com uma descrição do projeto, lista as principais funcionalidades e requisitos.
- **Instruções de instalação**: Incluí detalhes sobre como instalar o Laravel e configurar o ambiente local.
- **Como usar**: Essa seção cobre as operações básicas como criar, listar, editar e excluir usuários, além de uma breve explicação sobre o funcionamento da aplicação.
- **Estrutura do projeto**: Dá uma visão geral das principais partes do projeto como Models, Controllers, Views, etc.
- **Contribuição e Licença**: Caso você queira aceitar contribuições externas, essas seções são importantes.