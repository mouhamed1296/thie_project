<?php
 
    class Import 
    {
        private static bool $_isImported = false;
        function __construct(){}
        public static function import (string $file_import, string $include_mode = "include_once", $env_vars = []):bool
        {
            extract($env_vars);
            foreach ($env_vars as $key => $value) :
                if (!isset($$key) && !empty($$key) && $value != "") :
                    unset($$key);
                endif;
            endforeach;
            if(is_dir(dirname(__FILE__))):
                if(is_file(dirname(__FILE__)."/$file_import") && file_exists(dirname(__FILE__) . "/$file_import")):
                    switch ($include_mode) :
                        case 'require_once':
                            require_once (dirname(__FILE__) . "/$file_import");
                            self::$_isImported = true;
                            break;
                        case 'include_once':
                            include_once (dirname(__FILE__) . "/$file_import");
                            self::$_isImported = true;
                            break;
                        case 'require':
                            require (dirname(__FILE__) . "/$file_import");
                            self::$_isImported = true;
                            break;
                        case 'include':
                            include (dirname(__FILE__) . "/$file_import");
                            self::$_isImported = true;
                            break;
                        default:
                            self::$_isImported = false;
                            break;
                    endswitch;
                else:
                    echo "No file found";
                endif;
            else:
                echo "No dir found!!!";
            endif;
            return self::$_isImported;
        }
        public static function importFromDir (string $dir,array $files_to_import,string $file_ext = "php",array $env_vars = []):bool
        {
            extract($env_vars);
            foreach ($env_vars as $key => $value) :
                if(!isset($$key) && !empty($$key) && $value != ""):
                    unset($$key);
                endif;
            endforeach;
            if(is_dir(dirname(__FILE__))):
                foreach ($files_to_import as $import_mode => $filename):
                    $i = 0;
                    if(is_array($filename)):
                        $n = count($filename);
                        while ($i < $n) :
                            if(is_file(dirname(__FILE__) . "/$dir/$filename[$i].$file_ext")&& file_exists(dirname(__FILE__) . "/$dir/$filename[$i].$file_ext")):
                                if ($import_mode === "require_once") :
                                    require_once (dirname(__FILE__) . "/$dir/$filename[$i].$file_ext");
                                elseif ($import_mode === "include_once"):
                                    include_once (dirname(__FILE__) . "/$dir/$filename[$i].$file_ext");
                                elseif ($import_mode === "require"):
                                    require (dirname(__FILE__) . "/$dir/$filename[$i].$file_ext");
                                elseif ($import_mode === "include"):
                                    include (dirname(__FILE__) . "/$dir/$filename[$i].$file_ext");
                                else:
                                    echo "bad inclusion mode";
                                    exit();
                                endif;
                            else:
                                echo "No file found";
                                exit();
                            endif;
                            $i++;
                        endwhile;
                    elseif(is_file(dirname(__FILE__)."/$dir/$filename") && file_exists(dirname(__FILE__) . "/$dir/$filename")):
                        switch ($import_mode) :
                            case 'require_once':
                                require_once (dirname(__FILE__) . "/$dir/$filename");
                                self::$_isImported = true;
                                break;
                            case 'require':
                                require (dirname(__FILE__) . "/$dir/$filename");
                                self::$_isImported = true;
                                break;
                            case 'include':
                                include (dirname(__FILE__) . "/$dir/$filename");
                                self::$_isImported = true;
                                break;
                            case 'include_once':
                                include_once (dirname(__FILE__) . "/$dir/$filename");
                                self::$_isImported = true;
                                break;
                            default:
                                self::$_isImported = false;
                                break;
                        endswitch;
                    else:
                        echo "No file Found";
                        exit();
                    endif;
                endforeach;
            else:
                echo "No dir found";
            endif;
            return self::$_isImported;
        }
    }
    