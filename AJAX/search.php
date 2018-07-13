<?php
    // echo json_encode($_GET);
    if(isset($_GET['search'])){
        $a[] = "Anna";
        $a[] = "Brittany";
        $a[] = "Cinderella";
        $a[] = "Diana";
        $a[] = "Eva";
        $a[] = "Fiona";
        $a[] = "Gunda";
        $a[] = "Hege";
        $a[] = "Inga";
        $a[] = "Johanna";
        $a[] = "Kitty";
        $a[] = "Linda";
        $a[] = "Nina";
        $a[] = "Ophelia";
        $a[] = "Petunia";
        $a[] = "Amanda";
        $a[] = "Raquel";
        $a[] = "Cindy";
        $a[] = "Doris";
        $a[] = "Eve";
        $a[] = "Evita";
        $a[] = "Sunniva";
        $a[] = "Tove";
        $a[] = "Unni";
        $a[] = "Violet";
        $a[] = "Liza";
        $a[] = "Elizabeth";
        $a[] = "Ellen";
        $a[] = "Wenche";
        $a[] = "Vicky";

        $parameter = trim($_GET['search']);
        $result = array_filter($a, function($item) use ($parameter){
            $searh_result = preg_match("/$parameter/i", $item, $matched);
            if(count($matched)>0){
                return $item;
            }
        });
        echo json_encode($result);
    }else{
        print_r($_GET);
    }

    /* 
        Learnings : 

        1. To use external variable in array_filter() you need to do "use ($parameter)" for callback
        2. To pass parameter in the preg_match's pattern use "" instead of ''
        3. count() to get array size
        4. echo json_encode() to send result in json format

        
    */
   

?>