/*
*    Filename: katelibby.class
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
    private $mode;
    private $outputMode;
    private $running=false;
    private $reminders;
    private $remStack = array();
    public function __construct()
    {
        $this->readReminderFile();
        $this->digest();
        $this->checkStatus();
    }
    public function readReminderFile()
    {
        $this->reminders= file('/opt/katelibby/katelibby-localhost.reminders.db'                                                                                                                                                                                       );
    }
    public function digest()
    {
        $count = 0;
        foreach($this->reminders as $line)
        {
            $count++;
            $rem = new Reminder($line,$count);
            array_push($this->remStack,$rem);
        }
    }

    public function getReminders()
    {
        return $this->reminders;
    }
    public function dumpToString()
    {
        foreach($this->remStack as $rem)
        {
            echo "<p>".$rem->toString()."</p>";
        }
        $this->echoStatus();
    }
    public function checkStatus()
    {
        exec("pgrep -f phenny", $return);
        if (empty($return)) {
            $this->running = false;
        }else{
            $this->running = true;
        }
        return $return;
    }
    public function echoStatus()
    {
        if($this->running){ echo "Kate is up";}else{echo"Kate is down";}

    }
    public function saniInput($incDirty)
    {
        return $clean = htmlspecialchars($incDirty);
    }
    public function setMode($incDirtyRem)
    {
        $this->mode = $this->saniInput($incDirtyRem);
    }
    public function setOutput($incDirtyOutput)
    {
        $this->outputMode = $this->saniInput($incDirtyOutput);
    }

}
