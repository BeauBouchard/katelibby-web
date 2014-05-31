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
        $this->reminders= file('/opt/katelibby/katelibby-localhost.reminders.db');
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
/*
*    Reminder
*
*/

class Reminder
{
    private $remID;
    private $unixtime;
    private $stringtime;
    private $msg;
    private $channel;
    private $recipient;
    public function __construct($incmsgstring,$incID)
    {
        $this->remID = $incID;
        $this->digestString($incmsgstring);
    }
    //$stringtime
    public function digestString($incmsgstring)
    {
        $words =  preg_split('/\s+/', $incmsgstring);
        $dt = new DateTime('@'.$words[0]);
        $dt->setTimeZone(new DateTimeZone('America/New_York'));
        $this->stringtime=  $dt->format('F j, Y, g:i a');
        $this->unixtime = $words[0];
        $this->channel = $words[1];
        $this->recipient = $words[2];
        $words[0]="";
        $words[1]="";
        $words[2]="";
        $this->msg= implode(" ",$words);

    }

    public function toString()       {  return $this->stringtime." :: ".$this->msg; }
    public function getRemID()       {  return $this->remID; }
    public function getUnixtime()    {  return $this->unixtime; }
    public function getStringtime()  {  return $this->stringtime; }
    public function getMsg()         {  return $this->msg; }
    public function getChannel()     {  return $this->channel; }
    public function getRecipient()   {  return $this->recipient; }
}

    $kl = new KateLibby();
    if(isset($_GET["rem"]))
    {
        $kl->setMode($_GET["rem"]);
    }
    if(isset($_GET["output"])||isset($_GET["o"]))
    {
        $kl->setOutput($_GET["output"]); //output either xml / json
    }
    $kl->dumpToString();
?>
