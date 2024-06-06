# Sistema de gerenciamento de emprestimos

Esse é um sistema de gerenciamento de empréstimos de itens (com data de saida, data de devolução, status de devolução (amarelo = pendente, verde = entregue), quem pegou, departamento, etc...). Sistema bem simples, onde coloco em pratica 2 CRUD, um para usuarios ( onde ha autenicação e criptografia da senha) e outro para o sistema de emprestimos.O Uso dele esta especialmente focado para que não haja perca de itens entre pessoas e empresas. 

# Banco de dados:
    Eu utilizei o XAMPP como banco de dados (mysql) por eu estar usando a tecnologia PHP, o xampp fornece um melhor suporte para ela, mas caso vocês tenham interesse de iusar minha aplicação para testes, deem uma olahda no XAMPP (https://www.apachefriends.org/pt_br/index.html), um programa bem interativo e facil manuseio, contudo, ainda é possivel usar outro banco de dados (mysql).
    Caso que você use o XAMPP, dê uma pesquisada rapida como fazer a importação do banco de dados (vou deixar o meu banco dispominilizado aqui), mas você tem que ter o banco na sua maquina para funcionamento completo.

# Uso:
    Como dito anteriormente, ele tem dois CRUD:
    - Usuario: onde possa fazer o cadastro de forma simples e interativa, basta appertar no botão Usuarios la em cima na navbar (ele te levara para outra pagina) e depois no botão NOVO USUARIO, onde ira abrir uma modal, basta fornecer seu nme, email, senha (onde sera criptografada com hash 512 para maior segurança), sua função (testador, vendedor, etc) e nivel (no qual no momento só tem ADM), feito isso, aperte no botão salvar, você sera redirecionado para uma lista de todos os usuarios cadastrados, contendo 2 opcções na parte AÇÕES, editar perfil e excluir. Há um mecanismo para evitar duplicidade no email

    - Empresimos: onde possa fazer o emprestimo de forma simples e interativa, basta appertar no botão Emprestimos la em cima na navbar (ele te levara para outra pagina) e depois no botão NOVO EMPRESTIMO, onde ira abrir uma modal, basta fornecer alguns dados, como responsavel ( quem pegou o item), o item, telefone para contato, secretaria ( que o responsavel faz parte), departamento e saida do item. Logo após clicar em salvar, você ira ver uma lista de todos os itens emprestados, na parte ações (como anteriormente) teremos apenaas 2 ações, uma para devolver o item ( pedindo 2 dados, data da devolução e quem recebeu o item) e o outro para exclusão.

## Tecnologias utilizadas:
- `` HTML ``
- `` PHP ``
- `` Banco de dados (XAMPP)``
- `` CSS ``
- ``Bootstrap ``