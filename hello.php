<?
if (isset($_POST["name"])) {
    echo "Hello world , ".$_POST["name"]." your number is ". $_POST['number'] . " !";
} else {
    echo "Who are u?";
}
?>