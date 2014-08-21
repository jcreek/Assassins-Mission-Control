   _____                                      .__               
  /  _  \   ______ ___________    ______ _____|__| ____   ______
 /  /_\  \ /  ___//  ___/\__  \  /  ___//  ___/  |/    \ /  ___/
/    |    \\___ \ \___ \  / __ \_\___ \ \___ \|  |   |  \\___ \ 
\____|__  /____  >____  >(____  /____  >____  >__|___|  /____  >
        \/     \/     \/      \/     \/     \/        \/     \/ 

    8b    d8 88 .dP"Y8 .dP"Y8 88  dP"Yb  88b 88      dP""b8  dP"Yb  88b 88 888888 88""Yb  dP"Yb  88     
    88b  d88 88 `Ybo." `Ybo." 88 dP   Yb 88Yb88     dP   `" dP   Yb 88Yb88   88   88__dP dP   Yb 88     
    88YbdP88 88 o.`Y8b o.`Y8b 88 Yb   dP 88 Y88     Yb      Yb   dP 88 Y88   88   88"Yb  Yb   dP 88  .o 
    88 YY 88 88 8bodP' 8bodP' 88  YbodP  88  Y8      YboodP  YbodP  88  Y8   88   88  Yb  YbodP  88ood8 


Assassins-Mission-Control
=========================

The web app for running a semi-automated game of Assassins. 


>>Install Instructions
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

1) Mission Control requires PHP and MySQL to run. Make sure you've got those installed on your web server. 
2) In base.php you need to set your own database details. 
3) Using the admin tools in admin.php, create the users table. 
4) Your users can now begin to register using register.php - I'd recommend sending out a direct link using a URL shortener, although on the main page there is a link to registering just above the login box. 

-------------------------------------
Once all your users have registered
-------------------------------------

5) At this point you do not want anyone else to register so, as I haven't thought of a way to prevent adding any more data to an SQL table, you're going to duplicate the users table to a table called usersfinal which won't get edited by the registration form, thereby preventing anyone else from signing up. To do this head over to the admin tools in admin.php and close the registration. 
6) Once you are ready to begin the game you need to go to admin.php and assign all players their targets by starting the game. 
