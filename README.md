phpCSV
======

Export MYSQL data to CSV using PHP


<h3>Usage</h3>

<pre>
$export = new H_Mysql_Export();
$export->headerAry = array();
$export->dataAry = array();
$export->csv();
$export->download();
</pre>

<h3>Using PHP and mysql</h3>

<pre>
mysql_connect("localhost","root","");
mysql_select_db("cdcol");

$query = mysql_query("SELECT * FROM cds");
while($row = mysql_fetch_assoc($query)){
	$data[] = $row;
}

print_r($data);

include('classFile.php');

$export = new H_Mysql_Export();
$export->headerAry = array('Title','Interpret','jahr','ID');	// TABLE COLUMN NAMES
$export->dataAry = $data;					// TABLE DATA ARRAY FROM MYSQL
$export->filename = 'Sample';					// CUSTOM FILE NAME 
$export->directory = 'files/';					// DIRECTORY NAME
$export->csv();							// INITIALIZATION
$export->download();						// AUTOMATIC DOWNLOAD
$export->delete();						// AUTOMATIC DELETE DOWNLOADED FILE
</pre>