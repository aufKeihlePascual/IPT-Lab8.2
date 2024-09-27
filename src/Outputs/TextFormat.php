<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "Name: \n" . $profile->getName() . PHP_EOL;
        $output .= "\nStory: \n\n" . $profile->getStory() . PHP_EOL;
        
        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text');
        return $this->response;
    }
}
