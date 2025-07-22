<form action="" method="post">
    <input 
        type="url" 
        name="url"
        style="width: 100%"
        value="<?php
            echo isset($_POST['url']) && !empty($_POST['url']) ? trim($_POST['url']) : ''; 
        ?>" 
    />
    <button type="submit" name="submit" > Analizar </button>
</form>