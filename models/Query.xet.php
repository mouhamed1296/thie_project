<?php 
  require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');
    abstract class Query
    {
        private PDO $_connect;
        protected int $lastInsertId;
        public function __construct()
        {
            $ini_path = (dirname(__FILE__) . '/../includes/db.ini');
            $conn = parse_ini_file("$ini_path");
            $this->_connect = Db::connect($conn["host"], $conn["user"], $conn["password"], $conn["db"]);
        }
        private function order_limit_offset($query, string $champ_order, string $order, int $limit, int $offset)
        {
            if($order === 'ASC' || $order === 'DESC'):
                switch ($order) :
                    case 'ASC':
                        if($limit > 0):
                            if($offset > 0):
                                $query .= ' ORDER BY '.$champ_order.' ASC LIMIT '.$limit.' OFFSET '.$offset;
                            else:
                                $query .= ' ORDER BY '.$champ_order.' ASC LIMIT '.$limit;
                            endif;
                        else:
                            $query .= ' ORDER BY '.$champ_order.' ASC';
                        endif;
                        break;
                    case 'DESC':
                        if($limit > 0):
                            if($offset > 0):
                                $query .= ' ORDER BY '.$champ_order.' DESC LIMIT '.$limit.' OFFSET '.$offset;
                            else:
                                $query .= ' ORDER BY '.$champ_order.' DESC LIMIT '.$limit;
                            endif;
                        else:
                            $query .= ' ORDER BY '.$champ_order.' DESC';
                        endif;
                        break;
                    
                    default:
                        $query = $query.'';
                        break;
                endswitch;
                return $query;
            else:
                return $query;
            endif;
        }
        private function and_or(string $op, array $where)
        {
            $i = 0;
            $query = '';
            if($op === 'AND' || $op === 'and'):
                foreach ($where as $field => $value):
                    $query .= ($i == 0) ? $field.' = :'.$field : ' AND '.$field.' = :'.$field;
                    $i++;
                endforeach;
            elseif($op == 'OR' || $op == 'or'):
                foreach ($where as $field => $value):
                    $query .= ($i == 0) ? $field.' = :'.$field : ' OR '.$field.' = :'.$field;
                    $i++;
                endforeach;
            else:
                echo 'Invalid operator';
            endif;
           return $query;
        }

        /**
         * Effectue la requête de selection des données c'est a dire
         * qu'elle recoit en paramètre une requête et retourne une réponse
         * soit false en cas d'echec et un tableau associatif en cas de réussite
         *
         * @param string $table le nom de la table
         * @param array $where la ou les condition(s) de selection des donnees
         * @param string $op l'opérateur de liaison des conditions de sélection AND par défaut
         * @param string $champ_order le champ qui determine l'ordre d'affichage ex: ORDER BY champ_order DESC
         * @param string $order l'ordre de selection ascendant ou descendant suivant la valeur d'un champ
         * @param integer $limit la limite de la selection un entier ou un intervalle d'entier
         * @param integer $offset le nmbre d'element a selectionner à partir d'un indice définit par $limit
         * @return array|bool le resultat de la requête les données en tableau ou false en cas d'echec
         */
        protected function selectAll(string $table, array $where, $op, string $champ_order, string $order, int $limit, int $offset)
        {
            $query = '';
            if(count($where) > 0):
                $query = $this->and_or($op, $where);
                $query = $table.' WHERE '.$query;
                $query = $this->order_limit_offset($query, $champ_order, $order, $limit, $offset);
                $results = $this->_connect->prepare('SELECT * FROM '.$query);
                foreach ($where as $field => &$value):
                    $results->bindParam(":$field", $value);
                endforeach;
            else:
                $query = $this->order_limit_offset($query, $champ_order, $order, $limit, $offset);
                $results = $this->_connect->prepare('SELECT * FROM '.$table.$query);
            endif;
            $results->execute();
            if (!$results) :
                $rows = false;
            else :
                $rows = [];
                while ($row = $results->fetchAll()) :
                    $rows = $row;
                endwhile;
            endif;
            $results->closeCursor();
            return $rows;
        }
        /**
         * Insertion de donnée
         *
         * @param string $table le nom de la table d'insertion
         * @param array $values les champs et valeurs key=>value
         */
        protected function insert(string $table, array $values)
        {
            $strField = '';
            $strValue = '';
            $repValue = '';
            $i = 0;
            foreach ($values as $field => $value):
                $strField .= ($i > 0) ? ', ' . $field : $field . '';
                $strValue .= ($i > 0) ? ', ' . $value . '' : '' . $value . '';
                $repValue .= ($i > 0) ? ', :'.$field : ':'.$field;
                $i++;
            endforeach;
            $stmt = $this->_connect->prepare('INSERT INTO '.$table.'('.$strField.') VALUES ('.$repValue.')');
            $stmt->execute($values);
            $this->lastInsertId = $this->_connect->lastInsertId();
            $stmt->closeCursor();
        }
        /**
         * Cette fonction permet de modifier les champs d'une table donnée
         *
         * @param string $table le nom de la table à modifier
         * @param array $set les champs à modifier associés à leurs nouvelles valeurs
         * @param array $where les conditions de la selection
         */
        protected function update(string $table, array $set, array $where)
        {
            $strSet = "";
            $i = 0;
            foreach ($set as $field => $newvalue):
                $strSet .= ($i == 0) ? $field.' = :'.$field : ', '.$field.' = :'.$field;
                $i++;
            endforeach;
            $j = 0;
            $strWhere = "";
            foreach ($where as $field => $value):
                $strWhere .= ($j == 0) ? $field.' = :'.$field : ' AND '.$field.' = :'.$field;
                $j++;
            endforeach;
            $stmt = $this->_connect->prepare('UPDATE '.$table.' SET '.$strSet.' WHERE '.$strWhere);
            foreach ($set as $field => &$newvalue):
                $stmt->bindParam(":$field", $newvalue);
            endforeach;
            foreach ($where as $field => &$value):
                $stmt->bindParam(":$field", $value);
            endforeach;
            $stmt->execute();
            $stmt->closeCursor();
        }
        /**
         * Cette fonction permet de supprimer les données d'une table suivant 
         * les conditions définies
         *
         * @param string $table
         * @param array $where
         */
        protected function delete(string $table, array $where)
        {
            $query='';
            $i = 0;
            if(count($where) > 0):
                foreach ($where as $field => $value):
                    $query .= ($i == 0) ? $field.' = :'.$field : ' AND '.$field.' = :'.$field;
                    $i++;
                endforeach;
                $query = $table.' WHERE '.$query;
                $stmt= $this->_connect->prepare('DELETE FROM '.$query);
                foreach ($where as $field => &$value):
                    $stmt->bindParam(":$field", $value);
                endforeach;
                $stmt->execute();
                $stmt->closeCursor();
            endif;
        }

        /** Effectue la requête de selection de queleques champs d'une table
         * @param string $table le nom de la table ou se trouve les champs a selectionné
         * @param string $fields les champs a selectionnés au niveau de la table
         * @param array $where les conditions de la sélection des tables
         * @param string $op l'operateur de la condition where
         * @param string $field_order le champ de tri de la table
         * @param string $order l'odre de tri de la table
         * @param int $limit la limite de la selection
         * @param int $offset si renseigné le ligne a selectionné
         * @return array|bool le resultat de la requête les données en tableau ou false en cas d'echec
         */
        protected function selectField(string $table, string $fields, array $where, string $op, string $field_order, string $order, int $limit, int $offset)
        {
            $query ='';
            $w = count($where);
            if ($w > 0):
                $query = $this->and_or($op, $where);
                $query = $fields.' FROM '.$table.' WHERE '.$query;
            else:
                $query = $fields.' FROM '.$table;
            endif;
            $query = $this->order_limit_offset($query, $field_order, $order, $limit, $offset);
            $stmt = $this->_connect->prepare('SELECT '.$query);
            if ($w > 0):
                foreach ($where as $field => &$value):
                    $stmt->bindParam(":$field", $value);
                endforeach;
            endif;
            $stmt->execute();
            if (!$stmt) :
                $rows = false;
            else :
                $rows = [];
                while ($row = $stmt->fetchAll()) :
                    $rows = $row;
                endwhile;
            endif;
            $stmt->closeCursor();
            return $rows;
        }

        /** Effectue la requête de selection de queleques champs d'une table
         * @param string $table le nom de la table ou se trouve les champs a selectionné
         * @param string $fields les champs a selectionnés au niveau de la table
         * @param array $where les conditions de la sélection des tables
         * @param string $op l'operateur de comparaison LIKE, =, <, > etc..
         * @param string $field_order le champ de tri de la table
         * @param string $order l'odre de tri de la table
         * @param int $limit la limite de la selection
         * @param int $offset si renseigné le ligne a selectionné
         * @return array|bool le resultat de la requête les données en tableau ou false en cas d'echec
         */

        protected function research (string $table, string $fields, array $where, string $op, string $field_order, string $order, int $limit, int $offset)
        {
            $query ='';
            $i=0;
            foreach ($where as $field => $value):
                $query .= ($i == 0) ? $field.' '.$op.' :'.$field : ' OR '.$field.' '.$op.' :'.$field;
                $i++;
            endforeach;
            $query = $fields.' FROM '.$table.' WHERE '.$query;
            $query = $this->order_limit_offset($query, $field_order, $order, $limit, $offset);
            $stmt = $this->_connect->prepare('SELECT '.$query);
            if($op == "LIKE" or $op == "like"):
                foreach ($where as $field => &$value):
                    $val = "%$value%";
                    $stmt->bindParam(":$field", $val);
                endforeach;
            else:
                foreach ($where as $field => &$value):
                    $stmt->bindParam(":$field", $value);
                endforeach;
            endif;
            $stmt->execute();
            if (!$stmt) :
                $rows = false;
            else :
                $rows = [];
                while ($row = $stmt->fetchAll()) :
                    $rows = $row;
                endwhile;
            endif;
            $stmt->closeCursor();
            return $rows;
        }
    }
