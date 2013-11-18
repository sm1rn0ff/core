<?php
    if ( ! defined('BASEPATH'))
        exit('No direct script access allowed');

    class MY_Model extends CI_Model
    {
        public function create($options_echapees = array(), $options_non_echapees = array())
        {
            if( empty($options_echapees) && empty($options_non_echapees) )
            {
                return FALSE;
            }

            return (bool) $this->db->set($options_echapees)
                                   ->set($options_non_echapees, null, FALSE)
                                   ->insert($this->table);
        }

        
        public function read($select = '*', $where = array(), $nb = null, $debut = null)
        {
            return $this->db->select($select)
                                ->from($this->table)
                                ->where($where)
                                ->limit($nb, $debut)
                                ->get()
                                ->result();
        }
        
        public function update($where, $options_echappees = array(), $options_non_echappees = array())
        {       
            if(empty($options_echappees) AND empty($options_non_echappees))
            {
                return false;
            }

            if(is_integer($where))
            {
                $where = array('id' => $where);
            }

            return (bool) $this->db->set($options_echappees)
                                       ->set($options_non_echappees, null, false)
                                       ->where($where)
                                       ->update($this->table);
        }
        

        public function delete($where)
        {   
            if(is_integer($where))
            {
                $where = array('id' => $where);
            }
            
            return (bool) $this->db
                               ->where($where)
                               ->delete($this->table);
        }

        public function count($champ = array(), $valeur = null)
        {
            return $$this->db->where($champ, $valeur)
                             ->from($this->table)
                             ->count_all_result();
        }
    }

    