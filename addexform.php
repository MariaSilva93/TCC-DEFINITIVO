<?php 
require_once '../sql_connection/init.php';
$PDO = db_connect();
$sql = "SELECT nome, email, senha "
        . "FROM user where email = '{$_SESSION['email']}'";
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "Você precisa logar primeiro";
    header('location: index.php?=Precisa logar');
}
?>

<?php if (!$_SESSION):?>
<?php echo "Você não está logado"; ?>
<?php else: ?>
    <?php
    $sql = "SELECT exercTipo, exercNome, exercDesc"
    . "FROM exercicio order by exercTipo asc";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoaForma | Cadastro exercício - Escolha de Exercício</title>
    <link rel="stylesheet" href="../Style/style-addexform.css">

</head>
<body>
<center class="title">Escolha de exercício:</center>
    
    <section class="radio-section">

    <form>


<div class="radio-lit">


        <label for="tipo"></label>



        <div class="radio-item">
            <input type='radio' name='radio' value='^radio1^' data-href='Abdômen.php' id="radio1">

            <label for="radio1">Abdômen</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio2^' data-href='Antebraço.php' id="radio2">

            <label for="radio2">Antebraço</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio3^' data-href='Bíceps.php' id="radio3">

            <label for="radio3">Bíceps</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio4^' data-href='Costas.php'  id="radio4"> 

            <label for="radio4">Costas</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio5^' data-href='Glúteo.php'  id="radio5"> 

            <label for="radio5">Glúteo</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio6^' data-href='Ombro.php' id="radio6">

            <label for="radio6">Ombro</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio7^' data-href='Panturrilha.php' id="radio7">
        
            <label for="radio7">Panturrilha</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio8^' data-href='Peito.php' id="radio8">
        
            <label for="radio8">Peito</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio9^' data-href='Posterior.php' id="radio9">
        
            <label for="radio9">Posterior</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio10^' data-href='Quadríceps.php' id="radio10">
        
            <label for="radio10">Quadríceps</label>
        </div>


        <div class="radio-item">
            <input type='radio' name='radio' value='^radio11^' data-href='Trapézio.php' id="radio11">
        
            <label for="radio11">Trapézio</label>
        </div>

        <div class="radio-item">
            <input type='radio' name='radio' value='^radio12^' data-href='Tríceps.php' id="radio12">
        
            <label for="radio12">Tríceps</label>
        </div>  


        <input type="submit" value='Continue' id="btnFormSubmit">

        
    
    </div>
    </form>
</section>
</body>

<script>
var submit = document.getElementById('btnFormSubmit');
submit.addEventListener('click', submitForm);

function submitForm(event){
event.preventDefault();
event.stopPropagation();

var href = '',
inputs = this.parentNode.getElementsByTagName('input')
    for(var i=0;i<inputs.length;i++){
         if(inputs[i].getAttribute('name') == 'radio' && inputs[i].checked){
             href = inputs[i].getAttribute('data-href');
             window.location = href;
         }
    }
}</script>
</html>
<?php endif; ?>