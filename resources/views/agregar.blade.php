<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
     <div class="container">
        <nav class="navbar">
            <label for="" class="brand">
                <a href="home.html"><img src="img/logo1.png" alt=""></a>
            </label>
            <a href="agregar.html"><button class="nav-item">AGREGAR</button></a>
            <a href="modificar.html"><button class="nav-item">MODIFICAR</button></a>
        </nav>
        <div class="pregunta">
            <h1>Crear Pregunta</h1>
            <form id="questionForm">
            <div class="form-group">
                <label for="question">Pregunta:</label>
                <input type="text" id="question" name="question" placeholder="Escribe la pregunta aquí">
            </div>
                <div id="answers">
                    <div class="form-group answer-group">
                        <label for="answer1">Respuesta 1:</label>
                        <input type="text" id="answer1" name="answer1" placeholder="Escribe la respuesta aquí">
                        <label for="score1">Puntuación:</label>
                        <select id="score1" name="score1">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="pregun">
                    <button type="button" id="addAnswer" class="preg">Agregar Respuesta</button>
                    <button type="submit" class="preg">Guardar Pregunta</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>