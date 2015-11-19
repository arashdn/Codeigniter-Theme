<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Style class is single tone 
class Style
{

    private $name;
    private $directory;
    private $cssDirectory;
    private $jsDirectory;
    private $imgDirectory;
    private static $instance;

    function getName()
    {
        return $this->name;
    }

    function getDirectory()
    {
        return $this->directory;
    }

    function getCssDirectory()
    {
        return $this->cssDirectory;
    }

    function getJsDirectory()
    {
        return $this->jsDirectory;
    }

    function getImgDirectory()
    {
        return $this->imgDirectory;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    function setCssDirectory($cssDirectory)
    {
        $this->cssDirectory = $cssDirectory;
    }

    function setJsDirectory($jsDirectory)
    {
        $this->jsDirectory = $jsDirectory;
    }

    function setImgDirectory($imgDirectory)
    {
        $this->imgDirectory = $imgDirectory;
    }

    private function __construct()
    {
        $this->setName("Test Style");
        $this->setDirectory('test');
        $this->setCssDirectory('css');
    }

    static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Style();
        }
        return self::$instance;
    }

    private function __clone()
    {
        // Stopping Clonning of Object
    }

    private function __wakeup()
    {
        // Stopping unserialize of object
    }

}

class View
{
    private $CI = null;
    private $style;
            
    function __construct()
    {
        $this->CI =& get_instance();
        $this->style = Style::getInstance();
    }

}
