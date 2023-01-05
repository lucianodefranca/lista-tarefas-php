<?php

// importa scripts
require 'tarefa.model.php';
require 'tarefa.service.php';
require 'conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


// verifica se acao é igual inserir
if ($acao == 'inserir') {

    // instancia objeto tarefa e seta pelo metodo set a tarefa recuperada via post 
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    // instancia uma nova conexao
    $conexao = new Conexao();


    // instancia tarefaService e chama metodo inserir
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();

    // redireciona para script nova_tarefa.php
    header('Location: nova_tarefa.php?inclusao=1');


    // verifica se acao é igual a recuperar
} else if ($acao == 'recuperar') {

    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();

    // verifica se acao é igual a atualizar
} else if ($acao == 'atualizar') {

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    if ($tarefaService->atualizar()) {

        header('Location: todas_tarefas.php');
    }

    // verifica se acao é igual a ezcluir
} else if ($acao == 'excluir') {

    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->excluir();

    header('Location: todas_tarefas.php');


    // verifica se acao é igual a marcarRealizada
} else if ($acao == 'marcarRealizada') {

    $tarefa = new tarefa();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->marcarRealizada();

    header('Location: todas_tarefas.php');

} else if ($acao == 'recuperarTarefasPendentes') {

    $tarefa = new Tarefa();
    $tarefa->__set('id_status', 1);
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperarTarefasPendentes();

}



?>