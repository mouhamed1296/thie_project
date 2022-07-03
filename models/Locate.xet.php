<?php
    class Locate 
    {
        public static function To(string $location):void
        {
            header("location: $location");
            exit();
        }
    }