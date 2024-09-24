<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "<h1>Profile of " . $profile->getFullName() . "</h1>";
        $output .= "<p>Email: " . $profile->getContactDetails()['email'] . "</p>";
        $output .= "<p>Phone: " . $profile->getContactDetails()['phone_number'] . "</p>";
        
        // Education
        $output .= "<h2>Education</h2>";
        $output .= "<p>" . $profile->getEducation()['degree'] . " at " . $profile->getEducation()['university'] . "</p>";

        // Skills
        $output .= "<h2>Skills</h2>";
        $output .= "<p>" . implode(", ", $profile->getSkills()) . "</p>";

        // Experience
        $output .= "<h2>Experience</h2><ul>";
        foreach ($profile->getExperience() as $job) {
            $output .= "<li>" . $job['job_title'] . " at " . $job['company'] . " (" . $job['start_date'] . " to " . $job['end_date'] . ")</li>";
        }
        $output .= "</ul>";

        // Certifications
        $output .= "<h2>Certifications</h2><ul>";
        foreach ($profile->getCertifications() as $certification) {
            if (is_array($certification)) {
                $output .= "<li>" . implode(", ", $certification) . "</li>";
            } else {
                $output .= "<li>" . $certification . "</li>";
            }
        }
        $output .= "</ul>";

        // Extra-Curricular Activities
        $output .= "<h2>Extra-Curricular Activities</h2><ul>";
        foreach ($profile->getExtracurricularActivities() as $activity) {
            if (is_array($certification)) {
                $output .= "<li>" . implode(", ", $activity) . "</li>";
            } else {
                $output .= "<li>" . $activity . "</li>";
            }
        }
        $output .= "</ul>";

        // Languages
        $output .= "<h2>Languages</h2><ul>";
        foreach ($profile->getLanguages() as $language) {
            if (is_array($certification)) {
                $output .= "<li>" . implode(", ", $language) . "</li>";
            } else {
                $output .= "<li>" . $language . "</li>";
            }
            
        }
        $output .= "</ul>";

        // References
        $output .= "<h2>References</h2><ul>";
        foreach ($profile->getReferences() as $reference) {
            if (is_array($certification)) {
                $output .= "<li>" . implode(", ", $reference) . "</li>";
            } else {
                $output .= "<li>" . $reference['name'] . " (" . $reference['contact'] . ")</li>";
            }
            
        }
        $output .= "</ul>";

        $this->response = $output;
    }

    public function render()
    {
        return $this->response;
    }
}
