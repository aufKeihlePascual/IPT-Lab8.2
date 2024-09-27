<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = <<<HTML

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Profile of {$profile->getName()}</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .justify-text {
                    text-align: justify;
                    padding-left: 20px;
                    padding-right: 20px; 
                }
            </style>
        </head>
        <body>
            <div class="container mt-5">
                <h1 class="text-center">Profile of {$profile->getName()}</h1>
                <div class="text-center">
                    <img src="https://www.auf.edu.ph/home/images/articles/bya.jpg" alt="Founder Image" class="img-fluid rounded-circle mb-4" style="max-width: 200px;">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Story</h5>
                        <p class="card-text justify-text">{$profile->getStory()}</p>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
        HTML;

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/html');
        return $this->response;
    }
}
