<?php
    class UpdateInfos extends Query {
        public function changeInfo(string $table, array $set, array $where){
            $this->update($table, $set, $where);
        }
    }