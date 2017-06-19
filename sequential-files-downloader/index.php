<?php

/**
 * Sequential Files Downloader
 *
 * PHP CLI tool for download sequential files likes stream video partitions
 *
 * @author 	Nick Tsai <myintaer@gmail.com>
 * @version 1.0.0 <2017-02-24>
 * @example 
 *	https://video.wowza.com/hls-720p_1.ts ~
 *	https://video.wowza.com/hls-720p_100.ts
 * 	Download to 
 *	video1.ts ~ video100.ts
 */

# Saving file name
$fileName = "video";

# Extension name
$extension = "ts";

# The number using in URL pattern 
$partNum['start'] = 1;
$partNum['end'] = 100;

# Ordinal Fetch Process
for ($i=$partNum['start']; $i <= $partNum['end']; $i++) { 

	/**
	 * @example 
	 *	// started from 1 to 100:
	 *	https://video.wowza.com/hls-720p_1.ts
	 *  https://video.wowza.com/hls-720p_100.ts
	 */
	$url = "https://video.wowza.com/hls-720p{$i}.ts";

	try {
		
		$file = file_get_contents($url);

		file_put_contents("files/{$fileName}_{$i}.{$extension}", $file);

		echo "Donwload Success on part: {$i}\n";

	} catch (Exception $e) {
		
		echo "Error on part: {$i}\n";
	}
}

echo "--- Process End ---\n";

