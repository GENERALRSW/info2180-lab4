<?php
header('Content-Type: text/html; charset=UTF-8');

$superheroes = [
    [
        "id" => 1,
        "name" => "Steve Rogers",
        "alias" => "Captain America",
        "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world's mightiest heroes and the leader of the Avengers.",
    ],
    [
        "id" => 2,
        "name" => "Tony Stark",
        "alias" => "Ironman",
        "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
    ],
    [
        "id" => 3,
        "name" => "Peter Parker",
        "alias" => "Spiderman",
        "biography" => "Bitten by a radioactive spider, Peter Parker's arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
    ],
    [
        "id" => 4,
        "name" => "Carol Danvers",
        "alias" => "Captain Marvel",
        "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
    ],
    [
        "id" => 5,
        "name" => "Natasha Romanov",
        "alias" => "Black Widow",
        "biography" => "Despite super spy Natasha Romanoff's checkered past, she's become one of S.H.I.E.L.D.'s most deadly assassins and a frequent member of the Avengers.",
    ],
    [
        "id" => 6,
        "name" => "Bruce Banner",
        "alias" => "Hulk",
        "biography" => "Dr. Bruce Banner lives a life caught between the soft-spoken scientist he's always been and the uncontrollable green monster powered by his rage.",
    ],
    [
        "id" => 7,
        "name" => "Clint Barton",
        "alias" => "Hawkeye",
        "biography" => "A master marksman and longtime friend of Black Widow, Clint Barton serves as the Avengers' amazing archer.",
    ],
    [
        "id" => 8,
        "name" => "T'challa",
        "alias" => "Black Panther",
        "biography" => "T'Challa is the king of the secretive and highly advanced African nation of Wakanda - as well as the powerful warrior known as the Black Panther.",
    ],
    [
        "id" => 9,
        "name" => "Thor Odinson",
        "alias" => "Thor",
        "biography" => "The son of Odin uses his mighty abilities as the God of Thunder to protect his home Asgard and planet Earth alike.",
    ],
    [
        "id" => 10,
        "name" => "Wanda Maximoff",
        "alias" => "Scarlett Witch",
        "biography" => "Notably powerful, Wanda Maximoff has fought both against and with the Avengers, attempting to hone her abilities and do what she believes is right to help the world.",
    ],
];

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Get and sanitize search query if it exists
$query = isset($_GET['query']) ? sanitizeInput($_GET['query']) : '';

// Function to search for a superhero (case-insensitive)
function searchSuperhero($superheroes, $query) {
    $query = strtolower($query);
    foreach ($superheroes as $hero) {
        if (strtolower($hero['name']) === $query || 
            strtolower($hero['alias']) === $query) {
            return $hero;
        }
    }
    return null;
}

// If there's a search query
if ($query !== '') {
    $hero = searchSuperhero($superheroes, $query);
    if ($hero) {
        echo "<div class='superhero-details'>";
        echo "<h3>" . htmlspecialchars($hero['alias'], ENT_QUOTES, 'UTF-8') . "</h3>";
        echo "<h4>A.K.A " . htmlspecialchars($hero['name'], ENT_QUOTES, 'UTF-8') . "</h4>";
        echo "<p>" . htmlspecialchars($hero['biography'], ENT_QUOTES, 'UTF-8') . "</p>";
        echo "</div>";
    } else {
        echo "<div class='not-found'>SUPERHERO NOT FOUND</div>";
    }
} else {
    // Return all superheroes in a list
    echo "<ul class='superhero-list'>";
    foreach ($superheroes as $hero) {
        echo "<li>" . $hero['alias'] . "</li>";
    }
    echo "</ul>";
}
?>