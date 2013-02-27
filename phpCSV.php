<?php
class H_Mysql_Export {
	public $headerAry = array();
	public $dataAry = array();
	public $directory = './';
	public $filename = 'h_export_';
	public $filepath = '';
	
	public function init(){
		$this->filepath = $this->directory.$this->filename.time();	
	}
	
	public function csv(){
		$this->init();
		$this->filepath = $this->filepath.".csv";
		$handle = fopen($this->filepath, 'w+');
		fputcsv($handle, $this->headerAry);
		foreach($this->dataAry as $csvdata){
			fputcsv($handle, $csvdata);	
		}		
		fclose($handle);
	}
	
	public function download(){		
		if (file_exists($this->filepath)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($this->filepath));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($this->filepath));
			ob_clean();
			flush();
			readfile($this->filepath);
		}
		else {
			echo $this->filepath.' Doesnt Exist!';	
		}
	}
	
	public function delete(){
		unlink($this->filepath);	
	}
}
?>