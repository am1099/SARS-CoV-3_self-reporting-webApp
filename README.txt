## README FILE TO ACCES THE WEBSITE


Step 1: Go to https://www.apachefriends.org/index.html and install 'XAMPP for Windows'
Step 2: Unpack the package into a directory of your choice. Please start the "setup_xampp.bat" and beginning the installation. 
Step 3: upon successful installation, open XAMPP and  navigate to the 'Actions' part in the middle and click on 'Start'for 'Apache' and 'MySQL'

Step 4: Place my folder (CO3012_CW2_am1099) in 'C:\xampp\htdocs\' (Unzip the file first)
Step 5: Open Xampp window and click on 'admin' where it refrences 'MySQL' (should be the second line, next to 'Start/Stop' button),
 which should take to a web page called phpmyadmin
Step 6: Click on the 'New' button to create a database,
Step 7: Call the database CO3102_CW2_2020 then click on 'create'

Step 8: Click on the database created and then click on the 'Import' button in the phpmyadmin page and import my the sql file inside my CO3012_CW2_am1099 folder named am1099.sql,
that should import the database and ypu will be able to acces it.
NOTE: Details of the database connection is in my MyCoVTest_Hub folder, a file called db_connection.php

---> Database host = "localhost";
---> Database user = "root";
---> Database pass = "";
---> Database name = "CO3102_CW2_2020";

Step 9: Go to your broswer and enter this URL: http://localhost/CO3012_CW2_am1099/MyCoVTest_Hub/login.php

---> Username: 1) admin  ,  2) tester
---> Password: 1) 12345  ,  2) abcde


