<?php

// selecciono los listaTodos del modelo instanciado en el controlador
$todos = $data['todos'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO MVC App</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
</head>

<body>
    <main>
        <h1>Todo MVC Application</h1>
        <form method="post" action="<?= ROOT ?>/home/index">
            <input name="description" class="main-input" type="text" placeholder="Add Todo">
            <button name="add" type="submit" class="btn btn-submit">Add</button>
        </form>

        <h1>Todo's</h1>
        <div class="todos">

            <?php
            foreach ($todos as $todo) {
                $id = $todo->id;
                $status = $todo->status;
                $description = $todo->description;

            ?>

                <form class="todo" method="post" action=" <?= ROOT ?>/home/index?id=<?php echo $id  ?>">
                    <input name="status" class="todo__checkbox" type="checkbox" <?php if ($status) {
                                                                                    echo 'checked';
                                                                                } ?>>
                    <input name="description" class="todo__description" type="text" value="<?php echo $description ?>">
                    <button name="edit" type="submit" class="btn btn-edit todo__btn">EDIT</button>
                    <button name="delete" type="submit" class="btn btn-delete todo__btn">DELETE</button>
                </form>

            <?php

            }

            ?>

        </div>
    </main>
</body>

</html>