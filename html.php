<?php
    function printHead() {
        echo <<<_HEAD
        <!DOCTYPE html>
        <html>
            <head>
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Ecshool Notes</title>
            </head>
            <body>
_HEAD;
    }
    function printTable($notes, $subjects) {
        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo "<tr><th scope='col'>Subject</th><th scope='col'>Sum of notes</th><th scope='col'>Sum of coeffs</th><th scope='col'>Note<th scope='col'>Additional notes</th><th scope='col'>Functions</th>";
        echo "</thead><tbody>";
        
        foreach ($subjects as $subject) {
            $sumOfNotes = $notes[$subject]["sumNotesWithCoeff"];
            $sumOfCoeff = $notes[$subject]["sumCoeff"];
            $note = $notes[$subject]["overallNote"];

            echo "<tr><th scope='row'>$subject</th><td>$sumOfNotes</td><td>$sumOfCoeff</td><td>$note</td><td><div class='additionalNotes'></div></td>";
            echo "<td></td>"; //Cell for adding notes
            echo "</tr>";
        }
        
        echo "</tbody></table>";
    }

    function printEnd() {
        echo <<<_END
        
        <!-- Bootstrap's plugins -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
_END;
    }
?>