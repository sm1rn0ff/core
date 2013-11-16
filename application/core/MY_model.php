<?php
    if ( ! defined('BASEPATH'))
        exit('No direct script access allowed');

    class MY_Model extends CI_Model
    {
        public function create( $options_echapees = array(), $options_non_echapees = array() )
        {
            if( empty($options_echapees) && empty($options_non_echapees) )
            {
                return FALSE;
            }

            return (bool) $this->db->set($options_echapees)
                                   ->set($options_non_echapees, null, FALSE)
                                   ->insert($this->table);
        }

        public function read()
        {
            public function read($select = '*', $where = array(), $nb = null, $debut = null)
            {
                return $this->db->select($select)
                                    ->from($this->table)
                                    ->where($where)
                                    ->limit($nb, $debut)
                                    ->get()
                                    ->result();
            }
        }

        public function update()
        {
            public function update($where, $options_echappees = array(), $options_non_echappees = array())
            {       
                //  Vérification des données à mettre à jour
                if(empty($options_echappees) AND empty($options_non_echappees))
                {
                    return false;
                }
                
                //  Raccourci dans le cas où on sélectionne l'id
                if(is_integer($where))
                {
                    $where = array('id' => $where);
                }

                return (bool) $this->db->set($options_echappees)
                                           ->set($options_non_echappees, null, false)
                                           ->where($where)
                                           ->update($this->table);
            }
        }

        public function delete()
        {

        }

        public function count()
        {
            return $$this->db->where()
                             ->from($this->table)
                             ->count_all_result();
        }
    }