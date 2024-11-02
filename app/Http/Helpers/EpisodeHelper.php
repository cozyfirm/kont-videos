<?php

class EpisodeHelper{
    public static function getNumberOfChapters($chapters): string{
        try{
            if($chapters === 0) return "0 cjelina";
            else if($chapters === 1) return "1 cjelina";
            else if($chapters === 2) return "2 cjeline";
            else if($chapters === 3) return "3 cjeline";
            else if($chapters === 4) return "4 cjeline";
            else if($chapters === 5) return "5 cjelina";
            else if($chapters === 6) return "6 cjelina";
            else if($chapters === 7) return "7 cjelina";
            else if($chapters === 8) return "8 cjelina";
            else if($chapters === 9) return "9 cjelina";
            else if($chapters === 10) return "10 cjelina";
        }catch (\Exception $e){ return "O cjelina"; }
    }
}
