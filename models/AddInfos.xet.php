<?php
    declare(strict_types = 1);
    class AddInfos extends Query
    {
        public function addInfo(string $table, array $values)
        {
            $this->insert($table, $values);
            return $this->lastInsertId;
        }

    }
    