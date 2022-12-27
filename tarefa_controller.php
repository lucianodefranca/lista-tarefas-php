<?php 

    // importa scripts
    require 'tarefa.model.php';
    require 'tarefa.service.php';
    require 'conexao.php';

    // instancia objeto tarefa e seta pelo metodo set a tarefa recuperada via post 
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    // instancia uma nova conexao
    $conexao = new Conexao();


    // instancia tarefaService e chama metodo inserir
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1')

?>