<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="row">
        <div class=" col-md-7 col-sm-0 col-xs-0 attract">
           <div class="attract-child w-100">
            <img src="../icone/bg2.gif" class="img img-fluid">
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-xs-12 ">
        <div class="myform2">
            <form id="formSignUp" name="formSignUp" > 
                <div class="myform-content">
                    <h2 class="text-center lbl">Sign up</h2>
                    <label for="username" class="lbl">Username : </label>
                    <input type="text" class="form-control test" name="username" required />
                    <label for="email" class="lbl">Email : </label>
                    <input type="email" class="form-control test" name="email" required />
                    <label for="password" class="mt-2 lbl">Password : </label>
                    <input type="password" class="form-control test" name="password" required />
                    <div class="w-100 mt-4 text-center">
                        <button class="btn btn-primary pl-5 pr-5 btnGradient" type="submit">Sign Up</button>
                        <a href="../index.php" class="ml-4 link">Sign In</a> 
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../js/main.js"></script>
</html>