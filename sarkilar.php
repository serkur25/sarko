<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "serkur";
$password = "190525";
$dbname = "sarki_onerileri";

$conn = new mysqli($servername, $username, $password, $dbname);

// Hata kontrolü
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Pop şarkılarını veritabanından çekme
$sql = "SELECT * FROM sarkilar WHERE sarki_tur='pop'";
$result = $conn->query($sql);

// Çekilen şarkıların görsellerini ve metinlerini slider içine ekleme
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='slide'>";
        echo "<div class='song-item'>";
        echo "<div class='song-img-container'>";
        echo "<a href='" . $row["sarki_dinleme_linki"] . "' target='_blank'><img class='song-img' src='" . $row['sarki_resim_url'] . "' alt='" . $row['sarki_adi'] . "'></a>";
        echo "<div class='img-overlay'>";
        echo "<div class='play-button'></div>";
        echo "<div class='play-text'>Dinlemek için tıkla</div>";
        echo "</div>"; // img-overlay
        echo "</div>"; // song-img-container
        echo "<div class='song-details'>";
        echo "<h3 class='song-title'>" . $row['sarki_adi'] . "</h3>";
        echo "<p class='song-artist'>" . $row['sarki_sanatci'] . "</p>";
        echo "</div>"; // song-details
        echo "</div>"; // song-item
        echo "</div>"; // slide
    }
} else {
    echo "0 results";
}

$conn->close();
?>
