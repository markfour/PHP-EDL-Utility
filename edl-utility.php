<?php
	// TODO ソースのクラスを書く
	final class Source {
		public $number = '';
	}

	final class EDL {
	    // プロパティの宣言
	    public $title = '';
	    public $fcm = '';
	    public $sources = [];

	    // メソッドの宣言
	    public function displayVar() {
	        echo $this->title;
	    }
	}

	$edl = new EDL();
	$edl->$sources = []; // クラス内に配列配列に代入がうまくいかない?
	$sources = [];

	// ファイルを変数に格納
	$filename = 'test-edl.txt';

	// ファイルを配列に格納し、さらに変数に格納
	$lines = file($filename);

	// 配列を出力
	// print_r($lines);

	foreach($lines as $line){
		if (preg_match('/^TITLE:/',$line, $matches)) {
			$edl->$title = str_replace('TITLE: ', '', $line);

		} else if (preg_match('/^FCM:/',$line, $matches)) {
			$edl->$fcm = str_replace('FCM: ', '', $line);

		} else if (preg_match('/^\d{6} /',$line, $matches)) {
			// For example,
			// 000001  B002_C063_110594                 V     C        18:39:44:18 18:39:47:05 01:00:13:10 01:00:15:21
			$removeMultiScpace = preg_replace('/\s(?=\s)/', '', $line);
			$souceArray = preg_split('/\s/', $removeMultiScpace);
			print('$souceArray:'.count($souceArray));

			array_push($sources, $matches[0]);
		}
	}

	// TODO このIF文にファイル解析を作る
	print('Title:'.$edl->$title);
	print('FCM:'.$edl->$fcm);
	foreach ($sources as $v) {
		print('sources:'.$v);
	}

	printf(`\n`);
?>
