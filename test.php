<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo $_POST['agreee'];
}
?>
<form  method="post">
    <input type="checkbox" name="agreee" value="2">
    <button type="submit">ok</button>
</form>