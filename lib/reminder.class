/*
*    Filename: reminder.class
*    Description:
*    Author: Beau Bouchard (@BeauBouchard)
*    Part of Repo: https://github.com/BeauBouchard/
*      License: GNU General Public License
*      License URI: https://www.gnu.org/licenses/gpl.html
*    Version: 1.0.0.1
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

    public function toString()       {  return $this->stringtime." :: ".$this->m                                                                                                                                                                                       sg; }
    public function getRemID()       {  return $this->remID; }
    public function getUnixtime()    {  return $this->unixtime; }
    public function getStringtime()  {  return $this->stringtime; }
    public function getMsg()         {  return $this->msg; }
    public function getChannel()     {  return $this->channel; }
    public function getRecipient()   {  return $this->recipient; }
}
