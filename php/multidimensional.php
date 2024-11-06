<?php
$company = [
    "departments" => [
    "HR" => [
        "manager" => "S Johnson",
        "employees" => ["A", "B"],
        "salary" => "500000"
    ],
    "IT" => [
        "manager" => "T Smith",
        "employees" => ["C","D","E"],
        "salary" => "700000"
    ]
    ],
    "location" => "New York",
    "founded" => 2005
];


// unset($company["departments"]["IT"]);
foreach($company["departments"]as $department => $info){
    echo "Department : $department"."\n";
    echo "Manager: ".$info["manager"]."\n";
    echo "Salary: ".$info["salary"]."\n";
    echo "Employees:".implode(",", $info["employees"])."\n\n";

}
echo "Company Location:".$company["location"]."\n";
echo "Founded In Year".$company["founded"]."\n";
?>