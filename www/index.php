<?php
$servername = "benengel.dotstermysql.com";
$username = "benjamin";
$password = "jello123";
$dbname = "benjaminengel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO nfc_table (tag_id, cost) 
    VALUES (:tag_id, :cost)");
    $stmt->bindParam(":tag_id", $tag_id);
    $stmt->bindParam(":cost", $cost);

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>

<?php
// define variables and set to empty values
$tag_idErr = $costErr = "";
$tag_id = $cost = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["tag_id"])) {
     $tag_idErr = "tag_id is required";
   } else {
     $tag_id = test_input($_POST["tag_id"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$tag_id)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["cost"])) {
     $costErr = "Email is required";
   } else {
     $cost = test_input($_POST["cost"]);
     // check if e-mail address is well-formed
     if (!filter_var($cost, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<!DOCTYPE HTML> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="./style.css">
<style>
    div {
        display: none;
    }
    .see_me{
        display: block !important;
    }
    button > img {
        width: 100%;
    }
    button{
        background-color: transparent;
        border: none;
    }
    #page_one_button, #page_two_button, #page_three_button{
        color: #000;
        background-color: #B8DC3C;
        font-weight: 700;
        padding: 10px;
        border-radius: 10px 0;
        min-width: 150px;
        transition: .3s all;
        clear: both;
        margin: auto;
    }
</style>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){
    $("#page_one_button").click(function(){
        $("#page_one").removeClass("see_me");
        $("#page_two").addClass("see_me");
    });
    $("#page_two_button").click(function(){
        $("#page_two").removeClass("see_me");
        $("#page_three").addClass("see_me");
    });
    $("#page_three_button").click(function(){
        $("#page_three").removeClass("see_me");
        $("#page_four").addClass("see_me");
    });
});
</script>
</head>
<body> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

    <div id="page_one" class="see_me">   
        <button type="button" class="button" id="two">
            <img src="./pics/baklava.jpg">
        </button>
        <button type="button" class="button" id="four">
            <img src="./pics/cheese_berger.png">
        </button>
        <button type="button" class="button" id="five">
            <img src="./pics/chocolate.jpg">
        </button>
        <button type="button" class="button" id="six">
            <img src="./pics/coke.jpg">
        </button>
        <button type="button" class="button" id="seven">
                <img src="./pics/cookie.jpg">
        </button>
        <button type="button" class="button" id="eight" >
            <img src="./pics/fanta.png">
        </button>
        <button type="button" class="button" id="nine" >
            <img src="./pics/fries.jpg">
        </button>
        <button type="button" class="button" id="ten" >
            <img src="./pics/tea.png">
        </button>
        <button type="button" class="button" id="eleven" >
            <img src="./pics/hamberger.png">
        </button>
        <button type="button" class="button" id="twelve" >
            <img src="./pics/hard_taco.jpg">
        </button>
        <button type="button" class="button" id="thirteen" >
            <img src="./pics/hotdog.png">
        </button>
        <button type="button" class="button" id="fourteen" >
            <img src="./pics/kebab.png">
        </button>
        <button type="button" class="button" id="fifteen" >
            <img src="./pics/nacho.jpg">
        </button>
        <button type="button" class="button" id="sixteen" >
            <img src="./pics/pancakes.png">
        </button>
        <button type="button" class="button" id="seventeen" >
            <img src="./pics/pizza.jpg">
        </button>
        <button type="button" class="button" id="eighteen" >
            <img src="./pics/rice.jpg">
        </button>
        <button type="button" id="page_one_button"><p id='total'>Total price: </p></button>
    </div>
    <div id="page_two">
        Please scan your band <input style="display:none" type="text" name="tag_id" readonly>
        <button type="button" id="page_two_button"> next 2 </button>
    </div>
    <div id="page_three">
        Total: <input type="text" id="cost" name="cost">
        <button type="button" id="page_three_button"> next 3 </button>
    </div>
</form>

<script>
$("#two").click(function(){
    $("#cost").val("3.23");
    $("#total").text("Product price:Â£3.23");
});
$("#four").click(function(){
    $("#cost").val("4.59");
    $("#total").text("Product price:Â£4.59");
});
$("#five").click(function(){
    $("#cost").val("7.12");
    $("#total").text("Product price:Â£7.12");
});
$("#six").click(function(){
    $("#cost").val("6.25");
    $("#total").text("Product price:Â£6.25");
});
$("#seven").click(function(){
    $("#cost").val("3.10");
    $("#total").text("Product price:Â£3.10");
});
$("#eight").click(function(){
    $("#cost").val("9.89");
    $("#total").text("Product price:Â£9.89");
});
$("#nine").click(function(){
    $("#cost").val("11.98");
    $("#total").text("Product price:Â£11.98");
});
$("#ten").click(function(){
    $("#cost").val("10.65");
    $("#total").text("Product price:Â£10.65");
});
$("#eleven").click(function(){
    $("#cost").val("7.98");
    $("#total").text("Product price:Â£7.98");
});
$("#twelve").click(function(){
    $("#cost").val("9.23");
    $("#total").text("Product price:Â£9.23");
});
$("#thirteen").click(function(){
    $("#cost").val("6.23");
    $("#total").text("Product price:Â£6.23");
});
$("#fourteen").click(function(){
    $("#cost").val("9.53");
    $("#total").text("Product price:Â£9.53");
});
$("#fifteen").click(function(){
    $("#cost").val("8.34");
    $("#total").text("Product price:Â£8.34");
});
$("#sixteen").click(function(){
    $("#cost").val("7.23");
    $("#total").text("Product price:Â£7.23");
});
$("#seventeen").click(function(){
    $("#cost").val("12.54");
    $("#total").text("Product price:Â£12.54");
});
$("#eighteen").click(function(){
    $("#cost").val("6.66");
    $("#total").text("Product price:Â£6.66");
});
</script>



<div id="page_four">
  <span class="error">* <?php echo $tag_idErr;?></span>
  <span class="error">* <?php echo $costErr;?></span>
<?php
echo "<h2>Your Input:</h2>";
echo $tag_id;
echo "<br>";
echo $cost;

$stmt->execute();
?>
</div>
</body>
</html>
