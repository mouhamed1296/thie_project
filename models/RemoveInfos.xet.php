<?php
    class RemoveInfos extends Query {
        public function removeInfo(string $table, array $where)
        {
            $this->delete($table, $where);
        }
    }
