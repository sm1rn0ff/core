<?php
    if ( ! defined('BASEPATH'))
        exit('No direct script access allowed');

    class Layout
    {
        private $CI;
        private $theme = 'default';
        private $var = array();

        public function __construct()
        {
            $this->CI =& get_instance();

            $this->var['output'] = '';
            $this->var['titre'] = ucfirst( $this->CI->router->fetch_method() . ' - ' . ucfirst($this->CI->router->fetch_class()) );
            $this->var['charset'] = $this->CI->config->item('charset');
            $this->var['css'] = array();
        }

        public function views($name, $data = array())
        {
            $this->var['output'] .= $this->CI->load->view($name, $data, true);

            return $this;
        }

        public function view($name, $data = array())
        {
            $this->var['output'] .= $this->CI->load->view($name, $data, true);

            $this->CI->load->view('../themes/' . $this->theme, $this->var);
        }

        public function set_theme($theme)
        {
            if(is_string($theme) && !empty($theme) && file_exists('./application/themes/' . $theme . '.php'))
            {
                $this->theme = $theme;
                return true;
            }

            return false;
        }

        public function set_titre($titre)
        {
            if( is_string($titre) && !empty($titre) )
            {
                $this->var['titre'] = $titre;

                return true;
            }

            return false;
        }

        public function set_charset($charset)
        {   
            if( is_string($charset) && !empty($charset) )
            {
                $this->var['charset'] = $charset;

                return true;
            }

            return false;
        }

        public function ajouter_css($css)
        {
            if( is_string($css) && !empty($css) && file_exists('./assets/css/' . $css . '.css') )
            {
                $this->var['css'][] = css_url($css);

                return true;
            }

            return false;
        }

        public function ajouter_js($js)
        {
            if( is_string($js) && !empty($js) && file_exists('./assets/js/' . $js . '.js'))
            {
                $this->var['js'][] = js_url($js);

                return true;
            }

            return false;
        }
    }

