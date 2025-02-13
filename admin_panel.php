<?php
include_once "dbconnect.php"; // подключение базы данных
ob_start();
session_start(); // создаем новую сессию или восстанавливаем текущую
if (!$_SESSION['user_login']) {
    // проверяем правильность авторизации
    Header("Location: index.php"); // если ошибка, то перенаправляем на страницу авторизации
    ob_end_flush();
} else {

    include "header.php";
    ob_end_flush();
    ?>



    <h3>Добавить сообщение</h3>
    <!-- форма отправки сообщения -->
    <form name="myForm" action="action.php" method="post" id="myForm" onSubmit="return overify_message(this);">
    <input type=hidden name="action" value="add">


    <div class="form-group"> 
    <label for="article-content">Вміст статті:</label> 
    <textarea class="form-control" id="article-content" name="message"></textarea> 
    <script> 
    ClassicEditor 
        .create(document.querySelector('#article-content')) 
        .then(editor => { 
            window.editorInstance = editor; 
        }) 
        .catch(error => { 
            console.error(error); 
        }); 
 
    document.getElementById('myForm').addEventListener('submit', function(event) { 
        const editorData = window.editorInstance.getData(); 
        if (!editorData) { 
            alert('Вміст статті не може бути порожнім!'); 
            event.preventDefault(); 
        } else { 
            document.querySelector('h-page.php').value = editorData; 
        } 
    }); 
</script> 
</div>
                          
                 
                 
          
        <div>
            <input type="submit" id="submit-btn" name="submitAdd" value="Отправить сообщение">
        </div>
    </form>
</div>

<?php
}

if (isset($_SESSION['add']) && $_SESSION['add'] == true) {
    echo "Запись была добавлена успешно";
    $_SESSION['add'] = false;
}
include "footer.php";