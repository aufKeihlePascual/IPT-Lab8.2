<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "Full Name: " . $profile->getFullName() . PHP_EOL;
        $output .= "Email: " . $profile->getContactDetails()['email'] . PHP_EOL;
        $output .= "Phone: " . $profile->getContactDetails()['phone_number'] . PHP_EOL;
        $output .= "Address: " . implode(", ", $profile->getContactDetails()['address']) . PHP_EOL;
        $output .= "Education: " . $profile->getEducation()['degree'] . " at " . $profile->getEducation()['university'] . PHP_EOL;
        $output .= "Skills: " . implode(", ", $profile->getSkills()) . PHP_EOL;

        // Experience
        $output .= PHP_EOL . "Experience:\n";
        foreach ($profile->getExperience() as $job) {
            $output .= "- " . $job['job_title'] . " at " . $job['company'] . " (" . $job['start_date'] . " to " . $job['end_date'] . ")\n";
        }

        // Certifications
        $output .= PHP_EOL . "Certifications:\n";
        foreach ($profile->getCertifications() as $certification) {
            if (is_array($certification)) {
                $output .= "- " . implode(", ", $certification) . PHP_EOL;
            } else {
                $output .= "- " . $certification . PHP_EOL;
            }
        }

        // Extra-Curricular Activities
        $output .= PHP_EOL . "Extra-Curricular Activities:\n";
        foreach ($profile->getExtracurricularActivities() as $activity) {
            if (is_array($activity)) {
                $output .= "- " . implode(", ", $activity) . PHP_EOL;
            } else {
                $output .= "- " . $activity . PHP_EOL;
            }
        }

        // Languages
        $output .= PHP_EOL . "Languages:\n";
        foreach ($profile->getLanguages() as $language) {
            if (is_array($language)) {
                $output .= "- " . implode(", ", $language) . PHP_EOL;
            } else {
                $output .= "- " . $language . PHP_EOL;
            }
        }

        // References
        $output .= PHP_EOL . "References:\n";
        foreach ($profile->getReferences() as $reference) {
            $output .= "- " . $reference['name'] . " (" . ($reference['contact'] ?? 'N/A') . ")\n";
        }

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/plain');
        return $this->response;
    }
}
