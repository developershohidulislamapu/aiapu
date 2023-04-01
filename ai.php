<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai_key = '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';
$open_ai = new OpenAi($open_ai_key);

$prompt = $_POST['prompt'];

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => 'wirte article about "' .$prompt. '"it',
    'temperature' => 0.10,
    'max_tokens' => 256,
    'frequency_penalty' => 10,
    'presence_penalty' => 0.10,
]);

$response = json_decode($complete, true);
$response = $response["choices"][0]["text"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output</title>
    <style>
        .output-text{
            white-space: break-spaces;
        }
    </style>
</head>
<body>
    <h1>Out Put <?= $prompt?></h1>
    <div class="output-text">
        <?= $response?>
    </div>
</body>
</html>