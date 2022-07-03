<?php
    declare(strict_types = 1);
    class ShowInfos extends Query
    {
        private array $_rows;
        public function getInfo(string $table, array $where = [], string $op = 'AND', string $champ_order='', string $order='', int $limit = 0, int $offset = 0):array
        {
            $this->_rows = $this->selectAll($table, $where, $op, $champ_order, $order, $limit, $offset);
            return $this->_rows;

        }
        public function getFieldInfo(string $table, string $fields, array $where = [], string $op = '', string $field_order ='', string $order ='', int $limit = 0, int $offset = 0): array
        {
            $this->_rows = $this->selectField($table, $fields, $where, $op, $field_order, $order, $limit, $offset);
            return $this->_rows;
        }
        public function getSearchInfo(string $table, string $fields, array $where, string $op, string $field_order ='', string $order ='', int $limit = 0, int $offset = 0): array
        {
            $this->_rows = $this->research($table, $fields, $where, $op, $field_order, $order, $limit, $offset);
            return $this->_rows;
        }
    }
    