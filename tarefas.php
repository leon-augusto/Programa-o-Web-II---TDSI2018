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
        if(isset($_GET['nome'])){
            echo ':)';
            $nome = $_GET['nome'];
        }

        $tarefas = [
            "nome" => "Comprar cebolas",
            "frutas" => "pitomba",
            "prioridade" => "urgente"
        ];
    ?>

    <table border="1">
        <th>Tarefas</th>
        <?php
            foreach ($tarefas as $t):
                ?>
                <tr>
                    <td><?php echo $t; ?></td>
                </tr>
                <?php
            endforeach;
        ?>
    </table>
</body>
</html>









