<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Style class is single tone 
class Style
{

    private $directory;//current theme directory
    private $path;
    private $cssDirectory;
    private $jsDirectory;
    private $imgDirectory;
    private $assetDirectory;
    private static $instance;
    
    private $CI = null;

    public function __get($property)
    {
        if (property_exists($this, $property))
        {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property))
        {
            $this->$property = $value;
        }
    }

    private function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->config->load('style');
        if($this->CI->config->item('theme_dir')==NULL || $this->CI->config->item('theme_dir')=="")
        {
            show_error("Theme Directory is not defined.");
        }
        else if(!is_dir(VIEWPATH.$this->CI->config->item('theme_dir')))
        {
            show_error("Theme directory not found");
        }
        //load setting
        if($this->CI->config->item('load_style_db') == FALSE)
        {
            $this->directory = $this->CI->config->item('style_dir');
            $this->path=$this->CI->config->item('theme_dir').'/'.$this->directory;
            $this->cssDirectory=$this->CI->config->item('style_css_dir');
            $this->jsDirectory=$this->CI->config->item('style_js_dir');
            $this->imgDirectory=$this->CI->config->item('style_img_dir');
            $this->assetDirectory=$this->CI->config->item('style_asset_dir');
        }
        else
        {
            show_error('Loading Style from Database not implemented yet');
        }
        /////////////////////
        if (!is_dir(VIEWPATH.$this->path))
        {
            show_error('Your style directory Not Found');
        }
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
    private $defaultThemeDirectory;
    private $masterPage;
            
    function __construct()
    {
        $this->CI =& get_instance();
        $this->style = Style::getInstance();
        $this->CI->config->load('style');
        
        
        if($this->CI->config->item('default_style')==NULL || $this->CI->config->item('default_style')=="")//Style support disabled
        {
            $this->style = NULL;
        }
        else if(!is_dir(VIEWPATH.$this->CI->config->item('theme_dir').'/'.$this->CI->config->item('default_style')))
        {
            show_error("Default Theme directory not found");
        }
        $this->defaultThemeDirectory=$this->CI->config->item('theme_dir').'/'.$this->CI->config->item('default_style');
    }
    
    function load($viewName , $data)
    {
        if($this->style == NULL)
        {
            $this->CI->load->view($viewName,$data);
            return;
        }
        $this->masterPage = null;
        $data['template']=  $this;
        
        $page = $this->CI->load->view($this->style->path.'/'.$viewName,$data,TRUE);
        
        if($this->masterPage != null && $this->masterPage != "")
        {
            $cont = array('content' => $page);
            $this->CI->load->view($this->style->path.'/'.$this->masterPage,$cont);
        }
        else
        {
            echo $page;
        }
        
        
    }
    function css($name='style.css',$fileOnly=false)
    {
        $this->CI->load->helper('url');
        $path = base_url('application/views/'.$this->style->path.'/'.$this->style->cssDirectory.'/'.$name) ;
        if ($fileOnly)
        {
            return $path;
        }
        else
        {
            return "<link rel=\"stylesheet\" href=\"$path\"/>";
        }
    }
    function js($name='script.js',$fileOnly=false)
    {
        $this->CI->load->helper('url');
        $path = base_url('application/views/'.$this->style->path.'/'.$this->style->jsDirectory.'/'.$name) ;
        if ($fileOnly)
        {
            return $path;
        }
        else
        {
            return "<script src=\"$path\"></script>";
        }
    }
    
    function img($name,$fileOnly=false,$w=null,$h=null)
    {
        $this->CI->load->helper('url');
        $path = base_url('application/views/'.$this->style->path.'/'.$this->style->imgDirectory.'/'.$name) ;
        if($fileOnly)
        {
            return $path;
        }
        if($w == null || $h== null)
        {
            return "<img src=\"$path\"/>";
        }
        else
        {
            return "<img src=\"$path\" width=\"$w\" height=\"$h\" />";
        }
    }
      
    function asset($name)
    {
        $this->CI->load->helper('url');
        $path = base_url('application/views/'.$this->style->path.'/'.$this->style->assetDirectory.'/'.$name) ;
        return $path;
        
    }
    
    function setMasterPage($name)
    {
        $this->masterPage = $name;
    }
}
