<?php
include '../includes/db_connection.php'; // Include your database connection script

$sql = "SELECT id, question, answer FROM faqs"; // Add id to uniquely identify each FAQ
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="faq-section">
        <h1>Frequently Asked Questions</h1>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='faq-item' data-id='" . $row["id"] . "'>";
                echo "<h3 class='faq-question'>" . htmlspecialchars($row["question"]) . "</h3>";
                echo "<p class='faq-answer'>" . nl2br(htmlspecialchars($row["answer"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No FAQs available.</p>";
        }
        $conn->close();
        ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(function(item) {
                var question = item.querySelector('.faq-question');
                var answer = item.querySelector('.faq-answer');
                
                question.addEventListener('click', function() {
                    // Check if the answer is currently visible
                    if (answer.classList.contains('show')) {
                        answer.classList.remove('show'); // Hide answer
                    } else {
                        // Hide any other open answers
                        document.querySelectorAll('.faq-answer.show').forEach(function(otherAnswer) {
                            otherAnswer.classList.remove('show');
                        });
                        
                        answer.classList.add('show'); // Show this answer
                    }
                });
            });
        });
    </script>
</body>
</html>
