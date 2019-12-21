<?php include_once __DIR__."/../../src/lib/Models/User.php";


    //_____________TESTING CODE___________________
$user = new User();
$user->Create("CuteCat", "Cat'sPass");   

if ($user->Read("CuteCat")){     
    print "User exists\n";
} else {
    print "User does not exist\n";
}


if ($user->Update_password("CuteCat", "MyCutePass")){   
    print "Password changed\n";
} else {
    print "Password was not changed\n";
}

if ($user->Delete("CuteCat")){   
    print "User was deleted\n";
} else {
    print "User was not deleted\n";
}
