<?php
function uniqIdWithEmail($str) {
	$stepOne = 1000;
	$stepTwo = hexdec(hash("crc32", $str));
	$stepThree = hexdec(hash("crc32b", $str));
	$stepFour = hexdec(hash("adler32", $str));
	$stepFive = time();
	$stepSix = mt_rand();
	$stepSeven = md5($str);
	$hid = preg_replace("/[a-zA-Z]/", "", ($stepTwo.$stepThree.$stepFour.$stepFive.$stepSix.$stepSeven));
	$hid = preg_replace("/(\d)\1+/", "$1", $hid);
	$hid = str_replace(['00', '11', '22', '33', '44', '55', '66', '77', '88', '99'], '', $hid);
	$hid = $stepOne.((strlen($hid)>16)?substr($hid, 0, 16):$hid);
	return $hid;
}
echo uniqIdWithEmail("info@oxcakmak.com");
// Result: 10002912867421010184 (Max 20 Character)
?>
