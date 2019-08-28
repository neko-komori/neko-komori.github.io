<?php
class pagging{
	public $length_data = 0;
	public $partition = 0;
	public $page_all = 0;
	public $page_view = 0;
	public $view = array();
	public $page_on = 0;
	public $page_position = '';
	function __construct($length_data, $partition, $page_view = 5, $page_on = 1){
		$this->length_data = $length_data;
		$this->partition = $partition;
		$this->page_view = $page_view;
		$this->page_on = $page_on;
		if($length_data%$partition == 0){
			$this->page_all = $length_data/$partition;
		}
		else{
			$this->page_all = (($length_data-($length_data%$partition))/$partition)+1;
		}
		if ($this->page_view >= $this->page_all) {
			$this->page_position = 'atfrontonly';
			for ($i=0; $i <$this->page_all ; $i++) { 
				$this->view[$i] = $i+1;
			}
		}
		else{
			if ($this->page_on > ($this->page_all-$this->page_view+1) && $this->page_on <= $this->page_all) {
				$this->page_position = 'atend';
				for ($i=0; $i < $this->page_view ; $i++) { 
					$this->view[$i] = ($this->page_all-$this->page_view)+$i+1;
				}
			}
			elseif ($this->page_on < $this->page_view && $this->page_on >= 1) {
				$this->page_position = 'atfront';
				for ($i=0; $i < $this->page_view ; $i++) { 
					$this->view[$i] = $i+1;
				}
			}
			elseif($this->page_on >= $this->page_view && $this->page_on <= ($this->page_all-$this->page_view+1)){
				$this->page_position = 'atmedian';
				$median = $this->page_view/2;
				if($this->page_view%2 != 0){
					$median = $median+0.5;
				}
				for ($i=0; $i < $this->page_view ; $i++) { 
					$this->view[$i] = ($this->page_on-$median)+$i+1;
				}
			}
			else{
				$this->page_position = 'nopage';
			}
		}
	}
	function get_position(){
		return $this->page_position;
	}
	function get_view(){
		return $this->view;
	}
	function get_last(){
		return $this->page_all;
	}
}
?>
