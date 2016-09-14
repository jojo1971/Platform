<?php

namespace OC\PlatformBundle\Antispam;
class OCAntispam
{
    private $mailer;
    private $locale;
    private $minLength;

    public function __construct(\Swift_Mailer $mailer, $locale, $minLength){

        $this->mailer = $mailer;
        $this->locacle = $locale;
        $this->minLength = (int) $minLength;
    }

    /**
     * Vérifie si le texte est un spam ou nou
     * 
     * @param string $text
     * @return bool
     */
    public function isSpam($text){
        
        return strlen($text) < $this->minLength;
    }
}