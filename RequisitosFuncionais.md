## Autenticação e acesso

- **RF01 — Autenticar usuário:** o sistema deve permitir login por e-mail e senha.
- **RF02 — Validar credenciais:** o sistema deve exigir e-mail e senha e validar o formato do e-mail.
- **RF03 — Manter sessão:** o usuário deve poder selecionar a opção “Lembrar-me”.
- **RF04 — Encerrar sessão:** o sistema deve permitir que o usuário autenticado saia do sistema.
- **RF05 — Restringir o painel administrativo:** as funções administrativas devem ser acessíveis somente por usuários autenticados do tipo administrador.

## Produtos

- **RF06 — Cadastrar produto:** o sistema deve permitir o cadastro de produtos.
- **RF07 — Armazenar dados do produto:** cada produto deve possuir nome, valor, quantidade em estoque, quantidade mínima e data de validade.
- **RF08 — Listar produtos:** o sistema deve apresentar os produtos cadastrados.
- **RF09 — Pesquisar produtos:** o sistema deve permitir a pesquisa de produtos pelo nome.
- **RF10 — Sinalizar situação do estoque:** a listagem deve indicar se o produto está com estoque normal ou abaixo da quantidade mínima.
- **RF11 — Editar produto:** o sistema deve permitir a alteração dos dados de um produto.
- **RF12 — Excluir produto:** o sistema deve permitir a exclusão de um produto.

## Características dos produtos

- **RF13 — Cadastrar característica:** o sistema deve permitir adicionar características vinculadas a um produto existente.
- **RF14 — Armazenar característica:** uma característica pode conter cor, textura, peso, unidade de medida, marca e descrição.
- **RF15 — Listar características:** o sistema deve listar as características e identificar o produto relacionado.
- **RF16 — Pesquisar características:** o sistema deve pesquisar por produto, cor, marca, textura ou descrição.
- **RF17 — Paginar características:** a listagem deve exibir até 10 registros por página.
- **RF18 — Editar característica:** o sistema deve permitir alterar os dados e o produto associado a uma característica.
- **RF19 — Excluir característica:** o sistema deve permitir excluir uma característica mediante confirmação.
- **RF20 — Remover características dependentes:** ao excluir um produto, suas características devem ser excluídas automaticamente.

## Movimentações de estoque

- **RF21 — Registrar movimentação:** o sistema deve permitir o registro de uma movimentação de estoque.
- **RF22 — Informar dados da movimentação:** devem ser informados produto, tipo, quantidade e data.
- **RF23 — Classificar movimentação:** a movimentação deve ser do tipo entrada ou saída.
- **RF24 — Sugerir a data:** a data da movimentação deve ser inicialmente preenchida com a data atual.
- **RF25 — Atualizar entrada:** uma entrada deve aumentar automaticamente o estoque do produto.
- **RF26 — Atualizar saída:** uma saída deve diminuir automaticamente o estoque do produto.
- **RF27 — Impedir estoque negativo:** o sistema não deve aceitar saída superior ao estoque disponível.
- **RF28 — Associar produto e usuário:** cada movimentação deve identificar o produto e o usuário responsáveis.
- **RF29 — Alertar estoque baixo:** após uma movimentação, o sistema deve alertar quando a quantidade ficar abaixo da quantidade mínima.
- **RF30 — Exibir histórico:** o sistema deve listar as movimentações da mais recente para a mais antiga.
- **RF31 — Detalhar histórico:** o histórico deve mostrar produto, quantidade movimentada, data, tipo, estoque atual e usuário.
- **RF32 — Excluir movimentação:** o sistema deve permitir excluir um registro de movimentação.

## Dashboard

- **RF33 — Exibir indicadores:** o dashboard deve apresentar total de produtos, total de itens em estoque, produtos com estoque baixo e total de movimentações.
- **RF34 — Exibir movimentações recentes:** o dashboard deve apresentar as cinco movimentações mais recentes com produto, tipo, quantidade e data.

## Pontos parcialmente implementados ou inconsistentes

- **RF01/RF02:** quando as credenciais são inválidas, o componente grava uma mensagem de erro, mas continua o fluxo e redireciona para o dashboard.
- **RF04:** existe botão e rota de logout, porém não há lógica que execute `Auth::logout()`.
- **RF05:** existe `AdminMiddleware`, mas ele não está aplicado às rotas; as rotas do painel também não usam middleware de autenticação.
- **RF06/RF07/RF11:** cadastro e edição de produtos não validam os dados; a edição não permite alterar a data de validade.
- **RF12:** produtos relacionados a movimentações não podem ser excluídos pela chave estrangeira, e a interface não trata esse erro.
- **RF14:** a interface oferece as unidades `m2` e `m3`, ausentes na migration. O script SQL entregue inclui ambas para ficar coerente com o formulário.
- **RF22/RF27:** o registro de movimentação não valida produto inexistente, quantidade vazia, zero ou negativa.
- **RF28:** o usuário da movimentação está fixado como `user_id = 1`, em vez de usar o usuário autenticado.
- **RF32:** excluir uma movimentação não desfaz a alteração feita no estoque, o que pode gerar inconsistência histórica.
- O campo de pesquisa exibido na tela de movimentações não é usado na consulta.
