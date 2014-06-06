
<?php
/*
 * *    Filename: index.php
 * *    Description:
 * *    Author: Beau Bouchard (@BeauBouchard)
 * *    Part of Repo: https://github.com/BeauBouchard/
 * *      License: GNU General Public License
 * *      License URI: https://www.gnu.org/licenses/gpl.html
 * *    Version: 1.0.0.1
 * *
 * */


    function headers()
    {
        return "   <div id='header'>\n"."
            <h1>white rabbit</h1>
                <div id='nav'>
                <ul>
                    <li>
                    </li>
                </ul>
                </div>
            </div>\n";
    }

    function head()
    {
        return "   <head>
        <title>wh.iterabb.it </title>
        <meta name='robots' content='noindex, nofollow' >
        <link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
        <link rel='icon' href='favicon.ico' type='image/x-icon'>
        <link rel='stylesheet' type='text/css' href='css/main.css'>
        <style media='screen'>
        body {
           overflow: hidden;
           height: 100%;
           margin: 0;
           padding: 0;
         }
        </style>
        <script type='text/javascript' src='js/rainyday.min.js' ></script>
        <script type='text/javascript' src='js/hp.js' ></script>
    </head>\n";
    }

    function body()
    {
        echo "<body onload='run();'>\n";
        echo "<img id='background' alt='background' src='' />";
        // echo "<div id='wrapper'><canvas id='canvas' ></canvas></div>
        echo "<div id='header'><h1>whiterabbit</h1></div><a href='https://wh.iterabb.it:9090/' ><img id='rabbit' src='media/rabbit.png' alt='rabbit' /></a>";
        echo    "</body>\n";
    }




    function footer()
    {
        return "<div id='footer'> </div>\n";
    }

    echo "<html>\n";
    echo head();
    body();
    echo "</html>";
?>
