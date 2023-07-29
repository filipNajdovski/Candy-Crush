<?php

require_once 'src/CandyCrush.php';

// Test Case
$candyCrush = new CandyCrush();
echo $candyCrush->howLong([2,4,2,4,803,1,996,855,682,3,2,5,1,5,225,3,4,5,49,189,3,328,5,494,863,390,2,1,810,4,819,5,4,645,691,5,279,82,202,368,546,1,1,2,488,4,163,2,487,486], 12); // Output: 225
