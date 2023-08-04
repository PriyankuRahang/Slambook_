<?php
session_start();
if(!isset($_SESSION['name']))
{
	echo "you are logged out";
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

</head>
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'Rubik', sans-serif;
}

header {
    width: 100;
    height: 100vh;
    background-image: linear-gradient(to left, #fff 85%, #c3f5ff 20%);
}

.navsection {
    width: 100%;
    height: 20vh;
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-image: linear-gradient(to top, #fff 80%, #c3f5ff 20%);
}

.logo {
    width: 40%;
    color: #fff;
    background-image: linear-gradient(#c3f5ff 40%, #c3f5ff 60%);
    padding-left: 100px;
    box-sizing: border-box;
}

.logo h1 {
    text-transform: uppercase;
    font-size: 1.6rem;
    animation: leftToRight 1s linear infinite;
    animation-direction: alternate;
}

@keyframes leftToRight {
    from {
        padding-left: 40px
    }

    tp {
        padding-right: 40px;
    }
}

nav {
    width: 60%;
    background-color: linear-gradient(c 40%, #c3f5ff 60%);
    display: flex;
    justify-content: space-around;

}

nav a {
    text-decoration: none;
    text-transform: uppercase;
    color: #000;
    font-weight: 900;
    font-size: 17px;
    position: relative;

}

nav a:first-child {
    color: #4458dc;

}

nav a:before {
    content: "";
    position: absolute;
    top: 110%;
    left: 0;
    width: 0;
    height: 2px;
    border-bottom: 2px solid #4458dc;
    transition: all 0.4s linear;
}

nav a:hover:before {
    width: 100%;

}

main {
    height: 80vh;
    display: flex;
    justify-content: space-around;
    align-items: center;

}

.rightside {
    border-radius: 81% 19% 88% 12% / 66% 77% 23% 34%;
    background-color: #e8fbff;
}

.rightside img {
    max-width: 500px;
    height: auto;

}

.leftside {
    color: #000;
    text-transform: uppercase;

}

.leftside h3 {
    font-size: 40px;
    margin-bottom: 20px;
    position: relative;

}

.leftside h1:after {
    content: "";
    width: 450px;
    height: 3px;
    position: absolute;
    top: 65%;
    left: 9.8%;
    background: #000;

}

.leftside h1 {
    margin-top: 20px;
    font-size: 70px;
    margin-bottom: 25px;
}

.btn {
    text-decoration: none;
    font-weight: 900;
    font-size: 14px;
    text-align: center;
    padding: 10px 25px;
    cursor: pointer;
    text-transform: uppercase;
    border-radius: 5px;
    display: inline-block;
    margin-right: none;
    margin-bottom: 5px;
    color: #000;
    letter-spacing: 0;
    background-image: linear-gradient(to left, #fff 100%, #7FFFD4 80%);
    border: double 2px transparent;
    box-shadow: 0 10px 30px rgba(118, 85, 225, .8);
}

.btn:hover {
    border: 2px solid #c3f5ff;
    color: #222;
    /* background-color: rgba(211, 211, 211, .2); */
    background-image: linear-gradient(to left, #fff 40%, #7FFFD4 80%);
    box-shadow: none;
    background-image: none;
}

.hobby {
    color: #4458dc;
}
</style>

<body>
    <!-- <h1>Hello this is </h1> -->

    <header>
        <section class="navsection">
            <div class="logo">
                <h1>
                    <?php echo $_SESSION['name']; ?></h1>
                <!-- <h1>Slambook</h1> -->
            </div>
            <nav>
                <a href="home.php">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="logout.php">Logout</a>

            </nav>
        </section>
        <main>
            <div class="leftside">
                <h3>Hello,</h3>
                <h4>Iam</h4>
                <h1><?php echo $_SESSION['name']; ?></h1><br>
                <h2 class="hobby">My Hobbies are</h2><br>
                <h2><?php echo $_SESSION['hobbies']; ?></h2>
                <?php
                if(isset($_REQUEST['check1'])){
                    echo $_REQUEST['check1']."<br>";
                }
                if(isset($_REQUEST['check2'])){
                    echo $_REQUEST['check2']."<br>";
                }
                if(isset($_REQUEST['check3'])){
                    echo $_REQUEST['check3']."<br>";
                }
                if(isset($_REQUEST['check4'])){
                    echo $_REQUEST['check4']."<br>";
                }
                if(isset($_REQUEST['check5'])){
                    echo $_REQUEST['check5']."<br>";
                }
                
                ?>


                <!-- <a href="#" class="btn">Hobbies</a> -->

            </div>
            <div class="rightside">
                <img src="logo.png" />
            </div>
        </main>

    </header>


</body>

</html>
