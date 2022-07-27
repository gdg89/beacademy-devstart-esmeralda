# Projeto EstanteDev - Squad Esmeralda

E-commerce de livros sobre programação, feito com Laravel 9, TailwindCSS e MySQL.

<img src=".github/capa.png" alt="EstanteDev - Capa" />

## Instalação

Dentro da pasta `Projeto-Empresarial`,crie um arquivo `.env` igual ao `.env.example`, ajustando as configurações conforme o seu ambiente, após isso instale as dependências com os seguintes comandos:

```bash
# Instale as dependências do composer e npm
composer install
npm install

# Crie um link simbolico para o storage/app/public
php artisan storage:link

# Instale os estilos para a paginação
php artisan vendor:publish --tag=laravel-pagination
```

## Execução

```bash
# Sirva o projeto na porta 8000
php artisan serve

# Execute o vite
npm run dev
# ou
yarn dev
```

## Tech

- [Laravel 9][laravel]
- [TailwindCSS][tailwind]
- [MySQL][mysql]

## Squad Members

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/gdg89">
        <img src="https://github.com/gdg89.png" width="100px;" alt="Giuliano García"/>
        <br>
        <sub>
          <b>Giuliano García</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/capelaum">
        <img src="https://github.com/capelaum.png" width="100px;" alt="Luís V. Capelletto"/>
        <br>
        <sub>
          <b>Luís V. Capelletto</br>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/figmateus">
        <img src="https://github.com/figmateus.png" width="100px;" alt="Mateus Figueredo"/>
        <br>
        <sub>
          <b>Mateus Figueredo</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/vinic-alves">
        <img src="https://github.com/vinic-alves.png" width="100px;" alt="Vinicius Alves"/>
        <br>
        <sub>
          <b>Vinicius Alves</b>
        </sub>
      </a>
    </td>
  </tr>
</table>

## Diagrama Entidade Relacionamento

<img src=".github/Devstart - Esmeralda - EstanteDev - DER.png" alt="Devstart - Esmeralda - EstanteDev - DER" />

## Especificações

Criar um **CHECKOUT** para uma **PLATAFORMA** de **VENDAS ONLINE**

Este checkout será criado em PHP, utilizando o Framework Laravel.

> _O contexto deste projeto é mínimo no que diz respeito a operações de e-commerce e foca na efetivação do pagamento, portanto questões como logística, descontos e afins não serão levados em consideração na descrição e execução do projeto._

# Requisitos

- Banco de dados Mysql
- Autenticação e Cadastro de Usuários
- Cadastro de Produtos
- Cadastro de Pedidos
- Checkout
- Api de **Paylivre** para efetivação dos pagamentos (anexar documentação)
- Criação de testes unitários para todas as regras de negócio

# Regras de negocio

## Cadastro de Usuários

Deverá possuir 2 tipos de cadastro.

Um “Administrador” que será responsável por

- Realizar o cadastro de produtos na plataforma,
- Visualizar e gerenciar os pedidos de todos os usuários.

Para o usuário “Padrão” este poderá apenas escolher os produtos desejados e realizar a compra na plataforma, em sua área restrita poderá ver os próprios pedidos.

Os dados básicos de cadastro de usuários são:

- Nome
- E-mail
- Telefone
- Endereço
- Data de nascimento
- CPF

## Cadastro de Produtos

Para o cadastro de produtos, deverá ser possível cadastrar as seguintes informações

- Nome do produto
- Descrição do produto
- Quantidade
- Preço de custo
- Preço de venda
- Foto principal

## Cadastro de Pedidos

O cadastro de pedidos ocorrerá durante o processo de checkout, uma vez que o cliente selecionar os produtos que deseja adquirir e realizar o pagamento.

Será importante registrar para o Cadastro de Pedidos os **produtos que foram adquiridos**, o **cliente que comprou** assim como o **status do pagamento**.

### Status do pedido

- Processando → `processing`
- Aprovado → `approved`
- Recusado → `refused`

## Checkout

Durante o checkout, o cliente deverá selecionar os produtos que deseja adquirir e definir a forma de pagamento - para efetivação de pagamento utilizaremos a solução da Paylivre. Após realizar o pagamento, o cliente deverá ser informado sobre o status do seu pagamento: sendo **Aprovado**, **Recusado** ou **Processando**.

### Atualização de status do pagamento

O sistema deverá possuir uma rotina para monitorar os pagamentos que estiverem sendo processados.

Utilizaremos o serviço de webhook da Paylivre.

**Notificações**

- O cliente recebe um e-mail toda vez que um novo pedido é realizado
- O cliente recebe um e-mail toda vez que algum pedido sofre alteração de status

[laravel]: https://laravel.com
[tailwind]: https://tailwindcss.com
[mysql]: https://www.mysql.com
