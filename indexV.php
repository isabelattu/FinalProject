	<?php

	include_once "translation_api_initializer.php";


	$bing_language_codes = array('da' => 'Danish','de' => 'German',	'en'=> 'English','fi'=> 'Finnish',
	                            'fr'=> 'French', 'nl'=> 'Dutch','ja'=> 'Japanese','pl'=> 'Polish',
	                            'es'=> 'Spanish','ru'=> 'Russian',);

	if($_POST){

		$bing = new TranslationApiInitializer();

		$from_lang 	= isset($_POST['from_lang']) ? $_POST['from_lang'] : 'en';
		$to_lang 	= isset($_POST['to_lang']) ? $_POST['to_lang'] : 'fr';
		$text 		= isset($_POST['text']) ? $_POST['text'] : '';
	    
		$result = $bing->textTranslate($text, $from_lang, $to_lang);

		$bing->textToSpeech($result['msg'],$to_lang);

	}

	?>


<div style='margin:100px auto;width:600px;background:#efefef;padding:10px;'>
<h2>Text to Speech</h2>

	<form action='' method='POST' >
		<table>
			<tr><td>Select From Language</td>
				<td><select name='from_lang' >
						<?php foreach($bing_language_codes as $code=>$lang){ ?>
							<option value='<?php echo $code; ?>'><?php echo $lang; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr><td>Select To Language</td>
				<td><select name='to_lang' >
						<?php foreach($bing_language_codes as $code=>$lang){ ?>
							<option value='<?php echo $code; ?>'><?php echo $lang; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr><td>Text</td>
				<td><textarea cols='50' name='text' ></textarea>
				</td>
			</tr>
			<tr><td></td>
				<td><input type='submit' value='Submit' />
				</td>
			</tr>
		</table>
	</form>
</div>
