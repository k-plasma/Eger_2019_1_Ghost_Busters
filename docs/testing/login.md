==================================================
TEST ID:        1
TEST SCENARIO:  Try to register with valid data
TEST STEPS:     Go to the idex.php page => click on Register button => enter test data => click Sign Up
TEST DATA:      NEPTUN: XXXXXX
                PASSWORD: 123456
EXPECTED RESULT:Popup window notifies user that they were successfully registered  
ACTUAL RESULT:  Popup window notified tester that they were successfully registered
PASS/FAIL:      Pass 
==================================================
TEST ID:        2
TEST SCENARIO:  Login to the user homepage
TEST STEPS:     Go to index.php => enter valid data => click Login button
TEST DATA:      NEPTUN: XXXXXX
                PASSWORD: 123456 
EXPECTED RESULT:User should be redirected to user homepage  
ACTUAL RESULT:  Tester was redirected to user homepage 
PASS/FAIL:      Pass
==================================================
TEST ID:        3
TEST SCENARIO:  Try to register a duplicate user
TEST STEPS:     Go to index.php => click Register => enter invalid data
TEST DATA:      NEPTUN: XXXXXX
                PASSWORD: 123456 
EXPECTED RESULT:Popup window notifies user that user with this name already exists  
ACTUAL RESULT:  Popup window notified tester that user with this name already exists 
PASS/FAIL:      Pass
==================================================
TEST ID:        4
TEST SCENARIO:  Enter invalid data to Confirm password field in residtration form
TEST STEPS:     Go to index.php => click Register => enter invalid data
TEST DATA:      NEPTUN: YYYYYY
                PASSWORD: 123456
                CONFIRM PASSWORD: 654321
EXPECTED RESULT:Popup window notifies user that the passwords do not match  
ACTUAL RESULT:  Popup window notified tester that the passwords do not match  
PASS/FAIL:      Pass
==================================================
TEST ID:        5
TEST SCENARIO:  Try to login with invalid username
TEST STEPS:     Go to index.php => enter invalid data
TEST DATA:      NEPTUN: XXXXXZ
                PASSWORD: 123456
EXPECTED RESULT:Popup window with the message "Invalid credentials"  
ACTUAL RESULT:  Popup window with the message "Invalid credentials" 
PASS/FAIL:      Pass
==================================================
TEST ID:        6
TEST SCENARIO:  Try to login with invalid password
TEST STEPS:     Go to index.php => enter invalid data
TEST DATA:      NEPTUN: XXXXXX
                PASSWORD: 12345
EXPECTED RESULT:Popup window with the message "Invalid credentials"  
ACTUAL RESULT:  Popup window with the message "Invalid credentials" 
PASS/FAIL:      Pass
==================================================
TEST ID:        7
TEST SCENARIO:  Do not include password while logging in
TEST STEPS:     Go to index.php => enter NEPTUN => click Login
TEST DATA:      NEPTUN: XXXXXX 
EXPECTED RESULT:The password field is highlighted with red and 
                the page does not allow to continue.
ACTUAL RESULT:  The password field was highlighted with red and 
                the page did not allow to continue.
PASS/FAIL:      Pass
==================================================
TEST ID:        8
TEST SCENARIO:  Do not include NEPTUN while logging in
TEST STEPS:     Go to index.php => enter password => click Login
TEST DATA:      PASSWORD: 123456 
EXPECTED RESULT:The NEPTUN field is highlighted with red and 
                the page does not allow to continue.
ACTUAL RESULT:  The NEPTUN field was highlighted with red and 
                the page did not allow to continue.
PASS/FAIL:      Pass
==================================================
==================================================
TEST ID:        9
TEST SCENARIO:  Do not include password while registration
TEST STEPS:     Go to index.php => enter NEPTUN => click Sigh up
TEST DATA:      NEPTUN: XXXXXX 
EXPECTED RESULT:The password field is highlighted with red and 
                the page does not allow to continue.
ACTUAL RESULT:  The password field was highlighted with red and 
                the page did not allow to continue.
PASS/FAIL:      Pass
==================================================
TEST ID:        10
TEST SCENARIO:  Do not include NEPTUN while resistration
TEST STEPS:     Go to index.php => enter Password => click Sigh up 
TEST DATA:      PASSWORD: 123456 
EXPECTED RESULT:The NEPTUN field is highlighted with red and 
                the page does not allow to continue.
ACTUAL RESULT:  The NEPTUN field was highlighted with red and 
                the page did not allow to continue.
PASS/FAIL:      Pass
==================================================