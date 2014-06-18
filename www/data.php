<?php
/*
*    Filename: data.php
*    Description:
*    Author: Beau Bouchard (@BeauBouchard)
*    Part of Repo: https://github.com/BeauBouchard/
*      License: GNU General Public License
*      License URI: https://www.gnu.org/licenses/gpl.html
*    Version: 1.0.0.1
*
*/


    $kl = new KateLibby();
    if(isset($_GET["rem"]))
    {
        $kl->setMode($_GET["rem"]);
    }
    if(isset($_GET["output"])||isset($_GET["o"]))
    {
        $kl->setOutput($_GET["output"]); //output either xml / json
    }
   
