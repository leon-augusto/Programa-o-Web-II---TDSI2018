<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <?php
        //lista_tarefas será um array
        if(isset($_SESSION['lista_tarefas'])){// verifica se a lista_tarefas está na sessão
            if(isset($_GET['nome'])){// verifica se foi enviado algo via GET
                array_push($_SESSION['lista_tarefas'], $_GET['nome']);//adiciona um novo elemento na lista_tarefas
            }
        }else{// se não existir lista_tarefas  na sessão
            $_SESSION['lista_tarefas'] = array();// cria a lista_tarefas na sessão
            if(isset($_GET['nome'])){// verifica se foi enviado algo via GET
                array_push($_SESSION['lista_tarefas'], $_GET['nome']);//adiciona um novo elemento na lista_tarefas
            }
        }

        $lista_tarefas = array();
        $lista_tarefas = $_SESSION['lista_tarefas'];

        foreach ($lista_tarefas as $tarefa) {
            echo $tarefa.'<br>';
        }


       
        ?>
    </table>
</body>
</html>









