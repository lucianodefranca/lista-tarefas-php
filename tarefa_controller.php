<?php 

    // importa scripts
    require 'tarefa.model.php';
    require 'tarefa.service.php';
    require 'conexao.php';

    $acao = isset( $_GET['acao']) ? $_GET['acao'] : $acao;

    if ( $acao == 'inserir') {

        // instancia objeto tarefa e seta pelo metodo set a tarefa recuperada via post 
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);
    
        // instancia uma nova conexao
        $conexao = new Conexao();
    
    
        // instancia tarefaService e chama metodo inserir
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();
    
        header('Location: nova_tarefa.php?inclusao=1');

    } else if ($acao == 'recuperar') {

        echo 'cheguei ate aqui';
    }


?>