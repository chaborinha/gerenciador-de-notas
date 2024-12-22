# Gerenciador de Notas
Este é um sistema de gerenciamento de notas, desenvolvido com Laravel. Ele permite que os usuários criem, atualizem, excluam e visualizem suas próprias notas, com um controle de acesso baseado em autenticação.

# Funcionalidades
Autenticação: O sistema exige que o usuário esteja autenticado para realizar qualquer operação.
Criação de notas: Usuários autenticados podem criar notas com títulos e conteúdos personalizados.
Visualização de notas: Cada usuário pode visualizar suas próprias notas.
Atualização de notas: O usuário pode editar suas notas, mas apenas aquelas que ele criou.
Exclusão de notas: O usuário pode excluir suas próprias notas, garantindo que apenas o autor da nota tenha controle sobre ela.
Controle de Acesso: O sistema assegura que cada usuário só possa realizar operações nas suas próprias notas.


# Regras
Autenticação: Para criar, atualizar, excluir ou visualizar notas, o usuário deve estar autenticado.
Criação de notas: Apenas usuários autenticados podem criar novas notas.
Acesso às notas: Cada usuário pode visualizar e manipular apenas suas próprias notas. Não é possível acessar ou modificar notas de outros usuários.
Atualização e exclusão: O usuário pode editar ou excluir apenas as notas que ele mesmo criou.
Segurança: Todas as operações são realizadas de forma segura, com o controle de permissões apropriado.
