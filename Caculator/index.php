<?php 
$result = "";
class calculator
{
    var $a;
    var $b;

    function checkopration($oprator)
    {
        switch($oprator)
        {
            case '+':
            return $this->a + $this->b;
            break;

            case '-':
            return $this->a - $this->b;
            break;

            case 'x':
            return $this->a * $this->b;
            break;

            case '/':
            return $this->a / $this->b;
            break;

            default:
            return "Sorry No command found";
        }   
    }
    function getresult($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        return $this->checkopration($c);
    }
}

$cal = new calculator();
if(isset($_POST['submit']))
{   
    $result = $cal->getresult($_POST['first'],$_POST['second'],$_POST['submit']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <form method="POST" class="btn-container">
            <div class="row btn-group">
                <div class="col">
                    <label for="first">First Number</label>
                    <input type="text" name="first" id="first" value="<?php echo isset($_POST['first']) ? $_POST['first'] : '' ?>">
                </div>
            </div>
            <div class="row btn-group">
                <div class="col">
                    <label for="second">Second Number</label>
                    <input type="text" name="second" id="second" value="<?php echo isset($_POST['second']) ? $_POST['second'] : '' ?>">
                </div>
            </div>
            <div class="row btn-group">
                <div class="col">
                    <label for="result">Result</label>
                    <input type="text" name="result" id="result" value="<?php echo $result ?>">
                </div>
            </div>
            <div class="row btn-group">
                <div class="col">
                    <input type="submit" name="submit" id="mul" value="x">
                </div>
                <div class="col">
                    <input type="submit" name="submit" id="div" value="/">
                </div>
                <div class="col">
                    <input type="submit" name="submit" id="add" value="+">
                </div>
                <div class="col">
                    <input type="submit" name="submit" id="sub" value="-">
                </div>
            </div>
        </form>

        <?php echo $_POST['submit']; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>