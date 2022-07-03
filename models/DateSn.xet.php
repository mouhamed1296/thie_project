<?php
    class DateSn extends DateTime
    {
        private DateTime $_datetime;
        private DateTimeZone $_timezone;
        public function snDateTime ():string
        {
            $this->_timezone = new DateTimeZone('Africa/Dakar');
            $this->_datetime = new DateSn("now", $this->_timezone);
            $date = $this->_datetime->format('Y-m-d H:i:s');
            return $date;
        }
    }
    