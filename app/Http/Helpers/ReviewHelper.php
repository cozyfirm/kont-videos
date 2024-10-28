<?php

class ReviewHelper{
    /**
     * Get raw data
     *
     * @param $stars
     * @param $starsIndex
     * @param $index
     * @return void
     */
    public static function getRawData($stars, &$fulLStar, &$halfStar): void{
        $starsIndex = 1;

        for($i=1; $i<=$stars; $i++){
            if($i == (int)$stars) $starsIndex = $i;
        }
        if((int)$stars == 1) $starsIndex = 1;

        $index = ((int)$stars != $stars) ? 'left' : 'right';

        if($starsIndex != 1){
            if($index == 'left'){
                /* That means, we are going to need half star somewhere */
                $fulLStar = $starsIndex;
                $halfStar = $starsIndex + 1;
            }else{
                $fulLStar = $starsIndex;
                $halfStar = 0;
            }
        }else if($starsIndex == 1 and $index == 'left'){
            $halfStar = $starsIndex + 1;
        }
    }
}
