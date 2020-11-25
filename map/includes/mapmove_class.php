<?
class TMapmove {	public	$cur_pos=array(0,0);
	function __construct() {
		}
	function __destruct() {
	}
	function move_to($x,$y) {		$this->cur_pos=array($this->cur_pos[0]+$x,$this->cur_pos[1]+$y);		}
	function paint() {		for ($i=$this->cur_pos[0]-5;$i<$this->cur_pos[0]+6;$i++) {
			for ($j=$this->cur_pos[1]-5;$j<$this->cur_pos[1]+6;$j++) {				if ($i==$this->cur_pos[0] && $j==$this->cur_pos[1]) echo "<u><b>";				if (!file_exists('./map/'.$j.'x'.$i)) {echo 0; }
				else { $l=file('./map/'.$j.'x'.$i); echo $l[0]; }
				if ($i==$this->cur_pos[0] && $j==$this->cur_pos[1]) echo "</b></u>";				}
			echo "<br>";
			}		}	}
?>