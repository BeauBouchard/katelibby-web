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

class KateLibby
{
    private $reminders;
    private $parts;
    public function __construct()
    {
        $this->reminders= file('katelibby-localhost.reminders.db');
    }
    public function getParts(int $incPartNum) {
        return $this->parts;
    }
    public function getReminders()
    {
        return $this->reminders;
    }

    public function addLocalTime()
    {
        foreach($this->reminders as &$line)
        {
            array_push($this->parts, $line);
            $words =  preg_split('/\s+/', $line);
            $dt = new DateTime('@'.$words[0]);
            $dt->setTimeZone(new DateTimeZone('America/New_York'));
            $words[0] =  $dt->format('F j, Y, g:i a');
            $line = $words[0] . "    " . $line;
        }
    }
}
    $kl = new KateLibby();
    $kl->addLocalTime();
    foreach($kl->getReminders() as $Parts => $line)
    {
        echo "<p>".$line."</p>";
    }
?>
